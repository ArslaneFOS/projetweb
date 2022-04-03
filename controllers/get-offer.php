<?php
//sfx8
// connection a la database
require_once('../models/model.php');

$id_offer = isset($_GET['id_offer']) ? (int)$_GET['id_offer'] : 1;

$binds = array(
    ':id_offer' => array($id_offer, PDO::PARAM_INT)
);

$bdd = new DB();

$results = $bdd->select("SELECT offer.*, company.name_com, company.email_com from offer inner join company on offer.id_com = company.id_com WHERE id_offer = :id_offer", $binds);

if ($results) {
    $echo = $results[0];
}

header('Content-type: application/json');
echo json_encode($results ? $echo : null);
