<?php
require '../models/model.php';
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_student_access_level())) {
    echo "Access Denied";
    die();
}
if (isset($_POST['id_offer']) && isset($_SESSION['id_login'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Add Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $id_offer = $_POST['id_offer'];
    $id_login = $_SESSION['id_login'];
    
    
    $binds = array(
        ':id_login' => array($id_login, PDO::PARAM_INT),
        ':id_offer' => array($id_offer, PDO::PARAM_INT),
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from students_wishlists where id_offer = {$id_offer} AND id_student = (SELECT id_user from student where id_login = {$id_login});");

    if ($isexist) {
        echo "Add Failed: Offer already in wishlist.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->create("INSERT INTO `students_wishlists` (`id_student`, `id_offer`) VALUES ((SELECT id_user from student where id_login = :id_login), :id_offer);;", $binds);

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