<?php
// checks access requirements
require 'check-session.php';
// admins, pilots, and authorized reps
if (!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx3'))) {
    echo "Access Denied";
    die();
}
require_once('../models/model.php');

if (isset($_POST['name_com'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Creation Failed: Empty field(s).';
            die();
        }
    }
    // --------------------------------------------------
    if ($_FILES['logo_com']['size'] == 0) {
        echo 'Creation Failed: No thumbnail provided.';
        die();
    }

    // --------------------------------------------------
    $name_com = $_POST['name_com'];
    $sector_com = $_POST['sector_com'];
    $nb_interns_com = $_POST['nb_interns_com'];
    $description_com = $_POST['description_com'];
    $email_com = $_POST['email_com'];
    $logo_com = file_get_contents($_FILES['logo_com']['tmp_name']);
    
    $binds = array(
        ':name_com' => array($name_com, PDO::PARAM_STR),
        ':sector_com' => array($sector_com, PDO::PARAM_STR),
        ':nb_interns_com' => array($nb_interns_com, PDO::PARAM_INT),
        ':description_com' => array($description_com, PDO::PARAM_STR),
        ':email_com' => array($email_com, PDO::PARAM_STR),
        ':logo_com' => array($logo_com, PDO::PARAM_LOB),
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from company where email_com = '{$email_com}'");

    if ($isexist) {
        echo "Creation Failed: Company already exists.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->create("INSERT INTO `company` (`id_com`, `name_com`, `sector_com`, `nb_interns_com`, `description_com`, `email_com`, `logo_com`) VALUES (NULL, :name_com, :sector_com, :nb_interns_com, :description_com, :email_com, :logo_com);", $binds);

    if ($success) {
        echo 'Creation Succesful.';
        die();
    }
    else {
        echo 'Creation Failed.';
        die();
    }
    
}