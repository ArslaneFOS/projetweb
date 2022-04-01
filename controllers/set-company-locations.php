<?php
//sfx21
require_once('../models/model.php');
require 'check-session.php';

// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx4'))) {
    echo "Access Denied";
    die();
}

if (isset($_POST['id_com'])) {
    $bdd = new DB();

    $id_com = $_POST['id_com'];

    $comexists = $bdd->select("SELECT 1 from company where id_com = :id_com", array(':id_com' => array($id_com, PDO::PARAM_INT)));

    if (!$comexists) {
        echo "Company doesn't exist.";
        die();
    }

    $delete = $bdd->delete("DELETE FROM companies_locations WHERE id_com = :id_com", array(':id_com' => array($id_com, PDO::PARAM_INT)));
    
    if (!$delete) {
        echo "Delete Failed: SQL error";
        die();
    }

    foreach ($_POST['local'] as $key => $local) {
        $binds = array(
            ':id_com' => array($id_com, PDO::PARAM_INT),
            ':local' => array($local, PDO::PARAM_STR)
        );
        $success = $bdd->create("INSERT INTO companies_locations(id_com, id_local) VALUES (:id_com, (SELECT id_local from locality where city_local = :local));", $binds);
        if(!$success) {
            echo "Error";
            die();
        }
    }

} else {
    echo "No ID provided";
    die();
}