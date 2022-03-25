<?php
// checks access requirements
require 'check-session.php';

if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}

require '../models/model.php';

if (isset($_POST['id_com'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Update Failed: Empty field(s).';
            die();
        }
    }
    // --------------------------------------------------
    
    // --------------------------------------------------
    $id_com = $_POST['id_com'];
    $name_com = $_POST['name_com'];
    $sector_com = $_POST['sector_com'];
    $nb_interns_com = $_POST['nb_interns_com'];
    $description_com = $_POST['description_com'];
    $email_com = $_POST['email_com'];
    
    $binds = array(
        ':id_com' => array($id_com, PDO::PARAM_INT),
        ':name_com' => array($name_com, PDO::PARAM_STR),
        ':sector_com' => array($sector_com, PDO::PARAM_STR),
        ':nb_interns_com' => array($nb_interns_com, PDO::PARAM_INT),
        ':description_com' => array($description_com, PDO::PARAM_STR),
        ':email_com' => array($email_com, PDO::PARAM_STR),
        
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from company where email_com = '{$email_com}' AND id_com != {$id_com}");
    
    if ($isexist) {
        echo "Update Failed: Email already in database for another company.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->update(
        "UPDATE company
        SET name_com = :name_com, sector_com = :sector_com, nb_interns_com = :nb_interns_com, description_com = :description_com, email_com = :email_com
        WHERE id_com = :id_com;", $binds);
    
    if ($_FILES['logo_com']['size'] != 0) {
        $logo_com = file_get_contents($_FILES['logo_com']['tmp_name']);
        $bind_logo = array(
            ':logo_com' => array($logo_com, PDO::PARAM_LOB),
            ':id_com' => array($id_com, PDO::PARAM_INT)
        );

        $success_logo = $bdd->update(
            "UPDATE company
            SET logo_com = :logo_com
            WHERE id_com = :id_com;", $bind_logo);
        }

    if ($success) {
        echo 'Update Succesful.';
        die();
    }
    else {
        echo 'Update Failed: SQL Error';
        die();
    }
    
}