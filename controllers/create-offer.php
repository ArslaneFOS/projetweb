<?php
//sfx9
require_once('../models/model.php');
// checks access requirements
require 'check-session.php';
// admins, pilots and authorized reps
if (!(has_admin_access_level() || has_pilot_access_level()  || has_representative_access_level('sfx9'))) {
    echo "Access Denied";
    die();
}
if (isset($_POST['name_offer'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Creation Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $name_offer = $_POST['name_offer'];
    $level_offer = $_POST['level_offer'];
    $internship_length_offer = $_POST['internship_length_offer'];
    $pay_offer = $_POST['pay_offer'];
    $date_offer = $_POST['date_offer'];
    $available_places_offer = $_POST['available_places_offer'];
    $description_offer = $_POST['description_offer'];
    $id_com = $_POST['id_com'];
    
    
    $binds = array(
        ':name_offer' => array($name_offer, PDO::PARAM_STR),
        ':level_offer' => array($level_offer, PDO::PARAM_STR),
        ':internship_length_offer' => array($internship_length_offer, PDO::PARAM_INT),
        ':pay_offer' => array($pay_offer, PDO::PARAM_STR),
        ':date_offer' => array($date_offer, PDO::PARAM_STR),
        ':available_places_offer' => array($available_places_offer, PDO::PARAM_INT),
        ':description_offer' => array($description_offer, PDO::PARAM_STR),
        ':id_com' => array($id_com, PDO::PARAM_INT)
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from offer where name_offer = '{$name_offer}' AND id_com = {$id_com}");

    if ($isexist) {
        echo "Creation Failed: Offer already exists for the same company.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->create("INSERT INTO `offer` (`id_offer`, `name_offer`, `level_offer`, `internship_length_offer`, `pay_offer`, `date_offer`, `available_places_offer`, `description_offer`, `id_com`) VALUES 
                                                 (NULL, :name_offer, :level_offer, :internship_length_offer, :pay_offer, :date_offer, :available_places_offer, :description_offer, :id_com);", $binds);

    if ($success) {
        echo 'Creation Succesful.';
        die();
    }
    else {
        echo 'Creation Failed: SQL Error.';
        die();
    }
    
} else {
    echo 'Creation Failed: No parameters provided';
    die();
}