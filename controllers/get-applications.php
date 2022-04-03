<?php

require 'check-session.php';

// admin, pilots, students and authorized reps
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx32') || has_representative_access_level('sfx33'))) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = (int)($page - 1) * $limit;
if (isset($_SESSION['id_user']) && $_SESSION['user-type'] == 'student') {
    $id_student = (int)$_SESSION['id_user'];
    $binds = array(
        ':id_student' => array($id_student, PDO::PARAM_INT),
        ':limit' => array($limit, PDO::PARAM_INT),
        ':offset' => array($offset, PDO::PARAM_INT)
    );
    $sql = "SELECT applications.*, offer.name_offer, offer.description_offer, company.id_com, company.name_com, company.email_com, student.id_user, student.firstname, student.lastname from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer where applications.id_student = :id_student ORDER BY status DESC LIMIT :offset, :limit;";
    $sqltot = "SELECT COUNT(*) as total from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer where applications.id_student = :id_student;";
    $bindtot = array(':id_student' => array($id_student, PDO::PARAM_INT));
} else {
    $binds = array(
        ':limit' => array($limit, PDO::PARAM_INT),
        ':offset' => array($offset, PDO::PARAM_INT)
    );
    $sql = "SELECT applications.*, offer.name_offer, offer.description_offer, company.id_com, company.name_com, company.email_com, student.id_user, student.firstname, student.lastname from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer ORDER BY status DESC LIMIT :offset, :limit;";
    $sqltot = "SELECT COUNT(*) as total from (student INNER JOIN applications ON student.id_user = applications.id_student) INNER JOIN (offer INNER JOIN company on company.id_com = offer.id_com) ON offer.id_offer = applications.id_offer;";
    $bindtot = null;
}


$bdd = new DB();

$results = $bdd->select($sql, $binds);
$total = $bdd->select($sqltot, $bindtot);
$total = (int)$total[0]['total'];

$resultEncode = array();
foreach ($results as $key => $value) {
    # code...
    $resultEncode[$key] = $results[$key];
    $resultEncode[$key]['resume'] = base64_encode($results[$key]['resume']);
    $resultEncode[$key]['motivation_letter'] = base64_encode($results[$key]['motivation_letter']);
    $resultEncode[$key]['validation_form'] = $results[$key]['validation_form'] ? base64_encode($results[$key]['validation_form']) : null;
    $resultEncode[$key]['internship_agreement'] = $results[$key]['internship_agreement'] ? base64_encode($results[$key]['internship_agreement']) : null;
}

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'total' => $total,
    'data' => $resultEncode
);

header('Content-type: application/json');
echo json_encode($echo);
