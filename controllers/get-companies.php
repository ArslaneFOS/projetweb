<?php
// connection a la database
require '../models/model.php';
$bdd = new DB();

$results = $bdd->select('select id_com, name_com, sector_com, nb_interns_com, description_com, email_com from company;');

header('Content-type:application/json;');
echo json_encode(count($results)==0? null : $results);
?>