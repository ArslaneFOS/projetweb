<?php

// connection a la database
require_once('../models/model.php');

if(!isset($_GET['id_com'])) {
    echo "Error: No ID provided.";
    die();
}

$bdd = new DB();


$id_com = (int)$_GET['id_com'];
$comexists = $bdd->select("SELECT 1 from company where id_com = :id_com;", array(':id_com' => array($id_com, PDO::PARAM_INT)));

if(!$comexists) {
    echo "Error: Company doesn't exist.";
    die();
}

$localities = $bdd->select("SELECT * from locality;");

$locals = array();

foreach ($localities as $key => $locality) {
    # code...
    $locals[$locality['city_local']] = false;
}

//echo var_dump($locals);


foreach ($locals as $local => $value) {
    $binds = array(
        ':id_com' => array($id_com, PDO::PARAM_INT),
        ':city_local' => array($local, PDO::PARAM_STR)
    );
    $haslocation = $bdd->select("SELECT 1 from companies_locations where id_com = :id_com AND id_local = (SELECT id_local from locality where city_local = :city_local);", $binds);
    $locals[$local] = $haslocation ? true : false;
}

header('Content-type: application/json');
echo json_encode($locals);