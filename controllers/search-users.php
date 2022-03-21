<?php
// connection a la database
require '../models/model.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
$offset = ($page - 1) * $limit;
$binds = array(
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':firstname' => array($firstname, PDO::PARAM_STR),
    ':lastname' => array($lastname, PDO::PARAM_STR)
);

$bdd = new DB();

$results = $bdd->select("SELECT * from user WHERE INSTR(firstname, :firstname) > 0 AND INSTR(lastname, :lastname) > 0 order by id_user LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from user WHERE INSTR(firstname, :firstname) > 0 AND INSTR(lastname, :lastname) > 0;", array(':firstname' => array($firstname, PDO::PARAM_STR), ':lastname' => array($lastname, PDO::PARAM_STR)));
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
