<?php
require 'check-session.php';

if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}

// connection a la database
require '../models/model.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$offset = ($page - 1) * $limit;
$binds = array(
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':search' => array($search, PDO::PARAM_STR)
);

$bdd = new DB();

$results = $bdd->select("SELECT * from offer WHERE INSTR(name_offer, :search) > 0 order by id_offer LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from offer WHERE INSTR(name_offer, :search);", array(':search' => array($search, PDO::PARAM_STR)));
$total = (int)$total[0]['total'];

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'search' => $search,
    'total' => $total,
    'data' => $results
);

header('Content-type: application/json');
echo json_encode($echo);
