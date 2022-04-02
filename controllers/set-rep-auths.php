<?php
//sfx21
require_once('../models/model.php');
require 'check-session.php';

// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}

if (isset($_POST['id_user'])) {
    $bdd = new DB();

    $id_rep = $_POST['id_user'];

    $repexists = $bdd->select("SELECT 1 from representative where id_user = :id_rep", array(':id_rep' => array($id_rep, PDO::PARAM_INT)));

    if (!$repexists) {
        echo "Representative doesn't exist.";
        die();
    }

    $delete = $bdd->delete("DELETE FROM rep_auth WHERE id_rep = :id_rep", array(':id_rep' => array($id_rep, PDO::PARAM_INT)));
    
    if (!$delete) {
        echo "Delete Failed: SQL error";
        die();
    }

    foreach ($_POST['auth'] as $key => $auth) {
        $binds = array(
            ':id_rep' => array($id_rep, PDO::PARAM_INT),
            ':auth' => array($auth, PDO::PARAM_STR)
        );
        $success = $bdd->create("INSERT INTO rep_auth(id_rep, id_auth) VALUES (:id_rep, (SELECT id_auth from authorization where auth = :auth));", $binds);
        if(!$success) {
            echo "Error";
            die();
        }
    }

} else {
    echo "No ID provided";
    die();
}

header('location: /admin/representatives');