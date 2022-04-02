<?php
//sfx21
require_once('../models/model.php');
require 'check-session.php';

// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx4'))) {
    echo "Access Denied";
    die();
}

if (isset($_POST['id_offer'])) {
    $bdd = new DB();

    $id_offer = $_POST['id_offer'];

    $offerexists = $bdd->select("SELECT 1 from offer where id_offer = :id_offer", array(':id_offer' => array($id_offer, PDO::PARAM_INT)));

    if (!$offerexists) {
        echo "Offer doesn't exist.";
        die();
    }

    $delete = $bdd->delete("DELETE FROM offers_skills WHERE id_offer = :id_offer", array(':id_offer' => array($id_offer, PDO::PARAM_INT)));
    
    if (!$delete) {
        echo "Delete Failed: SQL error";
        die();
    }

    foreach ($_POST['skill'] as $key => $skill) {
        $binds = array(
            ':id_offer' => array($id_offer, PDO::PARAM_INT),
            ':skill' => array($skill, PDO::PARAM_STR)
        );
        $success = $bdd->create("INSERT INTO offers_skills(id_offer, id_skill) VALUES (:id_offer, (SELECT id_skill from skill where name_skill = :skill));", $binds);
        if(!$success) {
            echo "Error";
            die();
        }
    }

} else {
    echo "No ID provided";
    die();
}


header('location: /admin/offers');