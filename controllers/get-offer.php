<?php
// connection a la database
require '../models/model.php';

$id_offer = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$binds = array(
    ':id_offer' => array($id_offer, PDO::PARAM_INT)
);

$bdd = new DB();

$results = $bdd->select("SELECT * from offer WHERE id_offer = :id_offer", $binds);

if ($results) {
    $echo = $results[0];
}

header('Content-type: application/json');
echo json_encode($results ? $echo : null);
