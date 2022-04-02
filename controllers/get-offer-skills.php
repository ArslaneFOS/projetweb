<?php

// connection a la database
require_once('../models/model.php');

if(!isset($_GET['id_offer'])) {
    echo "Error: No ID provided.";
    die();
}

$bdd = new DB();


$id_offer = (int)$_GET['id_offer'];
$offexists = $bdd->select("SELECT 1 from offer where id_offer = :id_offer;", array(':id_offer' => array($id_offer, PDO::PARAM_INT)));

if(!$offexists) {
    echo "Error: Offer doesn't exist.";
    die();
}

$skills = $bdd->select("SELECT * from skill;");

$skills_bool = array();

foreach ($skills as $key => $skill) {
    # code...
    $skills_bool[$skill['name_skill']] = false;
}

//echo var_dump($locals);


foreach ($skills_bool as $skill => $value) {
    $binds = array(
        ':id_offer' => array($id_offer, PDO::PARAM_INT),
        ':name_skill' => array($skill, PDO::PARAM_STR)
    );
    $hasskill = $bdd->select("SELECT 1 from offers_skills where id_offer = :id_offer AND id_skill = (SELECT id_skill from skill where name_skill = :name_skill);", $binds);
    $skills_bool[$skill] = $hasskill ? true : false;
}

header('Content-type: application/json');
echo json_encode($skills_bool);