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

$id_student = isset($_GET['id_student']) ? (int)$_GET['id_student'] : 1;

$binds = array(
    ':id_student' => array($id_student, PDO::PARAM_INT)
);

$bdd = new DB();


$total_student_applications = (int)$bdd->select("SELECT COUNT(*) as `total_student_applications` from applications WHERE applications.id_student = :id_student;", $binds)[0]['total_student_applications'];
$total_accepted_applications = (int)$bdd->select("SELECT COUNT(*) as `total_accepted_applications` from applications WHERE applications.id_student = :id_student AND applications.status = 'step 6';", $binds)[0]['total_accepted_applications'];
$total_refused_applications = (int)$bdd->select("SELECT COUNT(*) as `total_refused_applications` from applications WHERE applications.id_student = :id_student AND applications.status = 'step 2-no-response';", $binds)[0]['total_refused_applications'];
$total_student_evals = (int)$bdd->select("SELECT COUNT(*) as `total_student_evals` from students_evals WHERE students_evals.id_student = :id_student;", $binds)[0]['total_student_evals'];
$total_student_wishlist = (int)$bdd->select("SELECT COUNT(*) as `total_student_wishlist` from students_wishlists WHERE students_wishlists.id_student = :id_student;", $binds)[0]['total_student_wishlist'];
$last_ten_applications = $bdd->select("SELECT offer.name_offer as `last_ten_applications`FROM applications INNER JOIN offer ON offer.id_offer = applications.id_offer WHERE applications.id_student = :id_student ORDER BY applications.app_date LIMIT 10;", $binds);

foreach ($last_ten_applications as $key => $value) {
    $last_ten_applications[$key] = $value['last_ten_applications'];
}

$echo = array(
    'total_student_applications' => $total_student_applications,
    'total_accepted_applications' => $total_accepted_applications,
    'total_refused_applications' => $total_refused_applications,
    'total_student_evals' => $total_student_evals,
    'total_student_wishlist' => $total_student_wishlist,
    'last_ten_applications' => $last_ten_applications,
);

header('Content-type: application/json');
echo json_encode($echo);
