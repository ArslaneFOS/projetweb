<?php
//sfx8
// connection a la database
require_once('../models/model.php');

$id_user = isset($_GET['id_user']) ? (int)$_GET['id_user'] : 1;
$user_type = isset($_GET['user_type']) ? (in_array($_GET['user_type'], ['student', 'pilot', 'representative']) ? $_GET['user_type'] : 'user')  : 'user';


$binds = array(
    ':id_user' => array($id_user, PDO::PARAM_INT)
);

$bdd = new DB();

$results = $bdd->select("SELECT * from {$user_type} WHERE id_user = :id_user", $binds);

if ($results) {
    $echo = $results[0];
}

header('Content-type: application/json');
echo json_encode($results ? $echo : null);
