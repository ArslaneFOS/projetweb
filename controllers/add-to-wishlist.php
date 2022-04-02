<?php
//sfx27
require_once('../models/model.php');
// checks access requirements
require 'check-session.php';
// admins and students
if (!(has_admin_access_level() || has_student_access_level())) {
    echo "Access Denied";
    die();
}
if (isset($_GET['id_offer']) && isset($_SESSION['id_user'])) {
    $bdd = new DB();
    if ($_SESSION['user-type'] != 'student') {
        echo "You cannot do that, you are not a student.";
        die();
    }
    foreach ($_GET as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Add Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $id_offer = $_GET['id_offer'];
    $id_student = $_SESSION['id_user'];
    
    
    $binds = array(
        ':id_student' => array($id_student, PDO::PARAM_INT),
        ':id_offer' => array($id_offer, PDO::PARAM_INT),
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from students_wishlists where id_offer = {$id_offer} AND id_student = {$id_student};");

    if ($isexist) {
        echo "Offer is already in your wishlist.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->create("INSERT INTO `students_wishlists` (`id_student`, `id_offer`) VALUES (:id_student, :id_offer);", $binds);

    if ($success) {
        echo 'Add Succesful.';
        die();
    }
    else {
        echo 'Add Failed: SQL Error.';
        die();
    }
    
} else {
    echo 'Add Failed: No parameters provided';
    die();
}