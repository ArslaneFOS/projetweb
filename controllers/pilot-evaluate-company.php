<?php
//sfx5
require_once('../models/model.php');
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}
if (isset($_GET['id_com']) && isset($_SESSION['id_user']) && isset($_GET['rating'])) {
    $bdd = new DB();
    foreach ($_GET as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Evaluation Failed: Empty field(s).';
            die();
        }
    }

    // --------------------------------------------------
    $id_com = $_GET['id_com'];
    $id_pilot = $_SESSION['id_user'];
    $rating = $_GET['rating'];

    $binds = array(
        ':id_pilot' => array($id_pilot, PDO::PARAM_INT),
        ':id_com' => array($id_com, PDO::PARAM_INT),
        ':rating' => array($rating, PDO::PARAM_STR),
    );

    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from pilots_evals where id_com = {$id_com} AND id_pilot = {$id_pilot};");

    if ($isexist) {
        // update
        $success = $bdd->update("UPDATE pilots_evals SET pilot_eval = :rating WHERE id_com = :id_com AND id_pilot = :id_pilot;", $binds);
    } else {
        // create
        $success = $bdd->create("INSERT INTO `pilots_evals` (`id_pilot`, `id_com`, `pilot_eval`) VALUES (:id_pilot, :id_com, :rating);", $binds);
    }

    // --------------------------------------------------

    if ($success) {
        echo 'Evaluation Succesful.';
        die();
    }
    else {
        echo 'Evaluation Failed: SQL Error.';
        die();
    }

} else {
    echo 'Evaluation Failed: No parameters provided';
    die();
}