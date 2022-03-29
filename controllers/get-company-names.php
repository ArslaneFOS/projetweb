<?php
// connection a la database
require_once('../models/model.php');

$bdd = new DB();

$results = $bdd->select("SELECT id_com, name_com from company");

header('Content-type: application/json');
echo json_encode($results ? $results : null);
