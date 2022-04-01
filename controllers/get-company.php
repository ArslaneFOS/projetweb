<?php
//sfx2
// connection a la database
require_once('../models/model.php');

$id_com = isset($_GET['id_com']) ? (int)$_GET['id_com'] : 1;

$binds = array(
    ':id_com' => array($id_com, PDO::PARAM_INT)
);

$bdd = new DB();

$results = $bdd->select("SELECT * from company WHERE id_com = :id_com", $binds);

if ($results) {
    $echo = $results[0];
    $echo['logo_com'] = base64_encode($results[0]['logo_com']);
}


header('Content-type: application/json');
echo json_encode($results ? $echo : null);
