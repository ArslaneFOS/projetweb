<?php
//sfx16,20,25
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx16') || has_representative_access_level('sfx20') || has_representative_access_level('sfx25'))) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');
if(!isset($_GET['login'])) {
    echo "Deletion Failed: No Login provided";
    die();
}

$login = $_GET['login'];

$binds = array(
    ':login' => array($login, PDO::PARAM_STR)
);

$bdd = new DB();

$exists = $bdd->select("SELECT 1 FROM login where login = :login;", $binds);

if(!$exists) {
    echo "Deletion Failed: User doesn't exist.";
    die();
}

$success = $bdd->delete("DELETE FROM `login` WHERE `login`.`login` = :login ;", $binds);

if ($success) {
    echo "Deletion Succesful";
    die();
} else {
    echo "Deletion Failed: SQL Error.";
}
