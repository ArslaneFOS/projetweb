<?php
require '../models/model.php';

if (isset($_POST['id_offer'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Update Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $id_offer = $_POST['id_offer'];
    $name_offer = $_POST['name_offer'];
    $level_offer = $_POST['level_offer'];
    $internship_length_offer = $_POST['internship_length_offer'];
    $pay_offer = $_POST['pay_offer'];
    $date_offer = $_POST['date_offer'];
    $available_places_offer = $_POST['available_places_offer'];
    $description_offer = $_POST['description_offer'];
    $id_com = $_POST['id_com'];
    
    
    $binds = array(
        ':id_offer' => array($id_offer, PDO::PARAM_INT),
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
    $success = $bdd->update(
        "UPDATE offer
        SET name_offer = :name_offer, level_offer = :level_offer, internship_length_offer = :internship_length_offer, pay_offer = :pay_offer, date_offer = :date_offer, available_places_offer = :available_places_offer, description_offer = :description_offer, id_com = :id_com
        WHERE id_offer = :id_offer;", 
        $binds);

    if ($success) {
        echo 'Update Succesful.';
        die();
    }
    else {
        echo 'Update Failed: SQL Error.';
        die();
    }
    
} else {
    echo 'Creation Failed: No parameters provided';
    die();
}