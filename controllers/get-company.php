<?php
// connection a la database
require '../models/model.php';

$id_com = isset($_GET['id']) ? (int)$_GET['id'] : 1;

/*$params = array(
    ':id_com' => array($id_com, PDO::PARAM_INT)
);*/

$bdd = new DB();

$results = $bdd->select("SELECT * from company WHERE id_com = {$id_com}");

if ($results) {
    $echo = $results[0];
    $echo['logo_com'] = base64_encode($results[0]['logo_com']);
}


header('Content-type: application/json');
echo json_encode($results ? $echo : null);
