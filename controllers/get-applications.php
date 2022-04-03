<?php

require 'check-session.php';

// admin, pilots, students and authorized reps
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx32') || has_representative_access_level('sfx33'))) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');

if (isset($_GET['id_student']) && $_SESSION['user-type'] != 'student') {
    $id_student = $_GET['id_student'];
} elseif (isset($_SESSION['id_user']) && $_SESSION['user-type'] == 'student' && !isset($_GET['id_student'])) {
    $id_student = $_SESSION['id_user'];
} else {
    echo "Access Denied.";
    die();
}
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = ($page - 1) * $limit;
$binds = array(
    ':id_student' => array($id_student, PDO::PARAM_STR),
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
);

$bdd = new DB();

$results = $bdd->select("SELECT applications.id_student, offer.id_offer, applications.status, applications.app_date, offer.name_offer, offer.description_offer, company.id_com, company.name_com, company.email_com from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer WHERE applications.id_student = :id_student ORDER BY app_date DESC LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer WHERE applications.id_student = :id_student", array(':id_student' => array($id_student, PDO::PARAM_STR)));
$total = (int)$total[0]['total'];


$echo = array(
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'data' => $results
);

header('Content-type: application/json');
echo json_encode($echo);
