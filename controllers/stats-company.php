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

$id_com = isset($_GET['id_com']) ? (int)$_GET['id_com'] : 1;

$binds = array(
    ':id_com' => array($id_com, PDO::PARAM_INT)
);

$bdd = new DB();



$total_offers = (int)$bdd->select("SELECT COUNT(*) as `total_offers` FROM offer WHERE id_com = :id_com;", $binds)[0]['total_offers'];
$last_ten_offers = $bdd->select("SELECT offer.name_offer as `last_ten_offers` FROM offer WHERE id_com = :id_com ORDER BY offer.date_offer DESC LIMIT 10;", $binds);
$total_locations = (int)$bdd->select("SELECT COUNT(*) as `total_locations` FROM companies_locations WHERE id_com = :id_com;", $binds)[0]['total_locations'];
$average_student_rating = $bdd->select("SELECT AVG(students_evals.student_eval) as `average_student_rating` FROM students_evals WHERE id_com = :id_com GROUP BY id_com;", $binds);
$average_pilot_rating = $bdd->select("SELECT AVG(pilots_evals.pilot_eval) as `average_pilot_rating` FROM pilots_evals WHERE id_com = :id_com GROUP BY id_com;", $binds);

foreach ($last_ten_offers as $key => $value) {
    $last_ten_offers[$key] = $value['last_ten_offers'];
}

$echo = array(
    'total_offers' => $total_offers,
    'last_ten_offers' => $last_ten_offers,
    'total_locations' => $total_locations,
    'average_student_rating' => $average_student_rating ? (float)$average_student_rating[0]['average_student_rating'] : 0,
    'average_pilot_rating' => $average_pilot_rating ? (float)$average_pilot_rating[0]['average_pilot_rating'] : 0
);

header('Content-type: application/json');
echo json_encode($echo);
