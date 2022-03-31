<?php

// connection a la database
require_once('../models/model.php');

if(!isset($_GET['id_user'])) {
    echo "Error: No ID provided.";
    die();
}

$bdd = new DB();


$id_rep = (int)$_GET['id_user'];
$isrep = $bdd->select("SELECT 1 from representative where id_user = :id_rep;", array(':id_rep' => array($id_rep, PDO::PARAM_INT)));

if(!$isrep) {
    echo "Error: Not a representative.";
    die();
}

$auths = array(
    'sfx2' => false,
    'sfx3' => false,
    'sfx4' => false,
    'sfx5' => false,
    'sfx6' => false,
    'sfx7' => false,
    'sfx8' => false,
    'sfx9' => false,
    'sfx10' => false,
    'sfx11' => false,
    'sfx12' => false,
    'sfx13' => false,
    'sfx14' => false,
    'sfx15' => false,
    'sfx16' => false,
    'sfx17' => false,
    'sfx18' => false,
    'sfx19' => false,
    'sfx20' => false,
    'sfx22' => false,
    'sfx22' => false,
    'sfx24' => false,
    'sfx25' => false,
    'sfx26' => false,
    'sfx32' => false,
    'sfx33' => false
);


foreach ($auths as $auth => $value) {
    $binds = array(
        ':id_rep' => array($id_rep, PDO::PARAM_INT),
        ':auth' => array($auth, PDO::PARAM_STR)
    );
    $hasauth = $bdd->select("SELECT 1 from rep_auth where id_rep = :id_rep AND id_auth = (SELECT id_auth from authorization where auth = :auth);", $binds);
    $auths[$auth] = $hasauth ? true : false;
}

header('Content-type: application/json');
echo json_encode($auths);
