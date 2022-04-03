<?php
//sfx7
require 'check-session.php';

// admins, pilots, students and authorized reps
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx7'))) {
    echo "Access Denied";
    die();
}
// connection a la database
require_once('../models/model.php');

$id_offer = isset($_GET['id_offer']) ? (int)$_GET['id_offer'] : 1;

$binds = array(
    ':id_offer' => array($id_offer, PDO::PARAM_INT)
);

$bdd = new DB();


$total_applications = (int)$bdd->select("SELECT COUNT(*) as `total_applications` FROM applications WHERE applications.id_offer=:id_offer;", $binds)[0]['total_applications'];
$total_active_applications = (int)$bdd->select("SELECT COUNT(*) as `total_active_applications` FROM applications WHERE applications.status != 'step 2-no-response' AND applications.status != 'step 6' AND applications.id_offer=:id_offer;", $binds)[0]['total_active_applications'];
$total_required_skills = (int)$bdd->select("SELECT COUNT(*) as `total_required_skills` FROM offers_skills WHERE offers_skills.id_offer = :id_offer;", $binds)[0]['total_required_skills'];
$total_accepted_applications = (int)$bdd->select("SELECT COUNT(*) as `total_accepted_applications` FROM applications WHERE applications.status = 'step 6' AND applications.id_offer=:id_offer;", $binds)[0]['total_accepted_applications'];
$total_refused_applications = (int)$bdd->select("SELECT COUNT(*) as `total_refused_applications` FROM applications WHERE applications.status = 'step 2-no-response' AND applications.id_offer=:id_offer;", $binds) [0]['total_refused_applications'];

$echo = array(
    'total_applications' => $total_applications,
    'total_active_applications' => $total_active_applications,
    'total_required_skills' => $total_required_skills,
    'total_accepted_applications' => $total_accepted_applications,
    'total_refused_applications' => $total_refused_applications
);

header('Content-type: application/json');
echo json_encode($echo);
