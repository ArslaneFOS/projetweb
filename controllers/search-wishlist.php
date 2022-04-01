<?php
require 'check-session.php';

// admins and students
if (!(has_student_access_level() || has_admin_access_level())) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? ($_GET['search']) : '';
$id_student = $_SESSION['id_user'];
$offset = ($page - 1) * $limit;
$binds = array(
    ':id_student' => array($id_student, PDO::PARAM_INT),
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':search' => array($search, PDO::PARAM_STR)
);

$bdd = new DB();

$results = $bdd->select("SELECT students_wishlists.id_student,offer.*, company.name_com, company.sector_com, company.logo_com from (offer INNER JOIN students_wishlists ON offer.id_offer = students_wishlists.id_offer) INNER JOIN company ON company.id_com = offer.id_com WHERE INSTR(name_offer, :search) > 0 AND students_wishlists.id_student = :id_student order by id_offer LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from (offer INNER JOIN students_wishlists ON offer.id_offer = students_wishlists.id_offer) INNER JOIN company ON company.id_com = offer.id_com WHERE INSTR(name_offer, :search) > 0 AND students_wishlists.id_student = :id_student;", array(':id_student' => array($id_student, PDO::PARAM_INT), ':search' => array($search, PDO::PARAM_STR)));
$total = (int)$total[0]['total'];

$resultEncode = array();
foreach ($results as $key => $value) {
    # code...
    $resultEncode[$key] = $results[$key];
    $resultEncode[$key]['logo_com'] = base64_encode($results[$key]['logo_com']);
}

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'search' => $search,
    'total' => $total,
    'data' => $resultEncode
);

header('Content-type: application/json');
echo json_encode($echo);
