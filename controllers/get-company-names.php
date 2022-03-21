<?php
// connection a la database
require '../models/model.php';

/*$params = array(
    ':id_com' => array($id_com, PDO::PARAM_INT)
);*/

$bdd = new DB();

$results = $bdd->select("SELECT id_com, name_com from company");

header('Content-type: application/json');
echo json_encode($results ? $results : null);
