<?php
//sfx13,17,22
// checks access requirements
require 'check-session.php';

// admins, pilots and authorized reps
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx13') || has_representative_access_level('sfx17') || has_representative_access_level('sfx22'))) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$firstname = isset($_GET['firstname']) ? ($_GET['firstname']) : '';
$lastname = isset($_GET['lastname']) ? ($_GET['lastname']) : '';
$user_type = isset($_GET['user_type']) ? (in_array($_GET['user_type'], ['student', 'pilot', 'representative']) ? $_GET['user_type'] : 'user')  : 'user';
$offset = ($page - 1) * $limit;
$binds = array(
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':firstname' => array($firstname, PDO::PARAM_STR),
    ':lastname' => array($lastname, PDO::PARAM_STR)
);

$bdd = new DB();

$results = $bdd->select("SELECT {$user_type}.*, login.login, login.password, center.name_center from ({$user_type} inner join login on {$user_type}.id_login = login.id_login) inner join center on {$user_type}.id_center = center.id_center WHERE INSTR(firstname, :firstname) > 0 AND INSTR(lastname, :lastname) > 0 order by id_user LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from {$user_type} WHERE INSTR(firstname, :firstname) > 0 AND INSTR(lastname, :lastname) > 0;", array(':firstname' => array($firstname, PDO::PARAM_STR), ':lastname' => array($lastname, PDO::PARAM_STR)));
$total = (int)$total[0]['total'];

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'total' => $total,
    'data' => $results
);

header('Content-type: application/json');
echo json_encode($echo);
