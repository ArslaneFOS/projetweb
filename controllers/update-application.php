<?php

require '../models/model.php';
require_once('check-session.php');

function get_application_status($id_offer, $id_student) {
    $db = new DB();
    return $db->select("SELECT status from applications where id_offer = {$id_offer} AND id_student = {$id_student};")[0]['status'];
}

if (isset($_POST['id_student']) && $_SESSION['user-type'] != 'student') {
    $id_student = $_POST['id_student'];
} elseif (isset($_SESSION['id_user']) && !isset($_POST['id_student'])) {
    $id_student = $_SESSION['id_user'];
} else {
    echo "Access Denied.";
    die();
}

if (isset($_POST['submit'])) {
    $bdd = new DB();
    $id_offer = $_POST['id_offer'];
    //$id_student = $_SESSION['id_user'];

    switch ($_POST['submit']) {
        case 'step 2-response': case 'step 2-no-response';
            if(!(has_admin_access_level() || has_student_access_level())) {
                echo "Access Denied";
                die();
            }

            if(get_application_status($id_offer, $id_student) != 'step 1') {
                echo "Can't update application yet.";
                die();
            }

            $success = $bdd->update("UPDATE applications SET status = '{$_POST['submit']}' WHERE id_student = {$id_student} AND id_offer = {$id_offer};");
            echo $success ? "Your application was updated succesfully, your pilot will be notified soon." : "An unexpected error has occured.";
            break;
        case 'step 3':
            if(!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx32'))) {
                echo "Access Denied";
                die();
            }

            if(get_application_status($id_offer, $id_student) != 'step 2-response') {
                echo "Can't update application, company hasn't responded.";
                die();
            }

            if($_FILES['validation_form']['size'] == 0) {
                echo "No Validation Form Provided";
                die();
            }
            $validation_form = file_get_contents($_FILES['validation_form']['tmp_name']);
            $binds = array(
                ':validation_form' => array($validation_form, PDO::PARAM_LOB),
                ':id_student' => array($id_student, PDO::PARAM_INT),
                ':id_offer' => array($id_offer, PDO::PARAM_INT)
            );
            $success = $bdd->update("UPDATE applications SET status = 'step 3', validation_form = :validation_form WHERE id_student = :id_student AND id_offer = :id_offer", $binds);
            echo $success ? "Validation form was sent succesfully, pilot will be notified soon." : "An unexpected error has occured";
            break;
        case 'step 4':
            if(!(has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx33'))) {
                echo "Access Denied";
                die();
            }

            if(get_application_status($id_offer, $id_student) != 'step 3') {
                echo "Can't update application. Validation form wasn't sent yet";
                die();
            }

            if($_FILES['validation_form']['size'] == 0) {
                echo "No Validation Form Provided";
                die();
            }
            $validation_form = file_get_contents($_FILES['validation_form']['tmp_name']);
            $binds = array(
                ':validation_form' => array($validation_form, PDO::PARAM_LOB),
                ':id_student' => array($id_student, PDO::PARAM_INT),
                ':id_offer' => array($id_offer, PDO::PARAM_INT)
            );
            $success = $bdd->update("UPDATE applications SET status = 'step 4', validation_form = :validation_form WHERE id_student = :id_student AND id_offer = :id_offer", $binds);
            echo $success ? "Validation form was sent succesfully, pilot will be notified soon." : "An unexpected error has occured";
            break;
        case 'step 5':
            if(!(has_admin_access_level() || has_student_access_level())) {
                echo "Access Denied";
                die();
            }

            if(get_application_status($id_offer, $id_student) != 'step 4') {
                echo "Can't update application, validation form hasn't been signed by pilot yet.";
                die();
            }

            if($_FILES['internship_agreement']['size'] == 0) {
                echo "No Agreement Provided";
                die();
            }
            $internship_agreement = file_get_contents($_FILES['internship_agreement']['tmp_name']);
            $binds = array(
                ':internship_agreement' => array($internship_agreement , PDO::PARAM_LOB),
                ':id_student' => array($id_student, PDO::PARAM_INT),
                ':id_offer' => array($id_offer, PDO::PARAM_INT)
            );
            $success = $bdd->update("UPDATE applications SET status = 'step 5', internship_agreement  = :internship_agreement  WHERE id_student = :id_student AND id_offer = :id_offer", $binds);
            echo $success ? "Agreement was sent succesfully." : "An unexpected error has occured";
            break;
        case 'step 6':
            if(!(has_admin_access_level() || has_student_access_level())) {
                echo "Access Denied";
                die();
            }

            if(get_application_status($id_offer, $id_student) != 'step 5') {
                echo "Can't update application, Agreements weren't sent yet";
                die();
            }

            if($_FILES['internship_agreement']['size'] == 0) {
                echo "No Agreement Provided";
                die();
            }
            $internship_agreement = file_get_contents($_FILES['internship_agreement']['tmp_name']);
            $binds = array(
                ':internship_agreement' => array($internship_agreement , PDO::PARAM_LOB),
                ':id_student' => array($id_student, PDO::PARAM_INT),
                ':id_offer' => array($id_offer, PDO::PARAM_INT)
            );
            $success = $bdd->update("UPDATE applications SET status = 'step 6', internship_agreement  = :internship_agreement  WHERE id_student = :id_student AND id_offer = :id_offer;
            update offer set available_places_offer = available_places_offer - 1 where id_offer = :id_offer AND available_places_offer > 0;", $binds);
            echo $success ? "Agreement was sent succesfully" : "An unexpected error has occured";
            break;
        default:
            echo "An unexpected error has occured.";
            die();
    }
} else {
    echo "Empty field(s).";
    die();
}