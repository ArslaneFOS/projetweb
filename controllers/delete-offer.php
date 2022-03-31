<?php
//sfx11
// checks access requirements
require 'check-session.php';
// admins, pilots and authorized reps
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx11'))) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');

if(!isset($_GET['id'])) {
    echo "Deletion Failed: No ID provided";
    die();
}

$id_offer = $_GET['id'];

$binds = array(
    ':id_offer' => array($id_offer, PDO::PARAM_INT)
);

$bdd = new DB();

$exists = $bdd->select("SELECT 1 FROM offer where id_offer = :id_offer;", $binds);

if(!$exists) {
    echo "Deletion Failed: Offer doesn't exist.";
    die();
}

$success = $bdd->delete("DELETE FROM `offer` WHERE `offer`.`id_offer` = :id_offer ;", $binds);

if ($success) {
    echo "Deletion Succesful";
    die();
} else {
    echo "Deletion Failed: SQL Error.";
}
