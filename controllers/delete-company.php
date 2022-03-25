<?php
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}
// connection a la database
require '../models/model.php';

if(!isset($_GET['id'])) {
    echo "Deletion Failed: No ID provided";
    die();
}

$id_com = $_GET['id'];

$binds = array(
    ':id_com' => array($id_com, PDO::PARAM_INT)
);

$bdd = new DB();

$exists = $bdd->select("SELECT 1 FROM company where id_com = :id_com;", $binds);

if(!$exists) {
    echo "Deletion Failed: Company doesn't exist.";
    die();
}

$success = $bdd->delete("DELETE FROM `company` WHERE `company`.`id_com` = :id_com ;", $binds);

if ($success) {
    echo "Deletion Succesful";
    die();
} else {
    echo "Deletion Failed: SQL Error.";
}
