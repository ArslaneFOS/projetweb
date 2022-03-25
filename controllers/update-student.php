<?php
// checks access requirements
require 'check-session.php';

if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}

require '../models/model.php';

if (isset($_POST['id_user'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "" && $key != 'password') {
            echo 'Update Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $id_user = $_POST['id_user'];
    $login = $_POST['login'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id_prom = $_POST['id_prom'];
    $id_center = $_POST['id_center'];
    
    $binds = array(
        ':id_user' => array($id_user, PDO::PARAM_INT),
        ':login' => array($login, PDO::PARAM_STR),
        ':firstname' => array($firstname, PDO::PARAM_STR),
        ':lastname' => array($lastname, PDO::PARAM_STR),
        ':id_prom' => array($id_prom, PDO::PARAM_INT),
        ':id_center' => array($id_center, PDO::PARAM_INT),
    );
    $isstudent = $bdd->select("SELECT 1 from student where id_user = {$id_user};");
    if (!$isstudent) {
        echo "Update Failed: Not A Student.";
        die();
    }
    // --------------------------------------------------
    $loginexists = $bdd->select("SELECT 1 from login where login = '{$login}' AND id_login != (SELECT id_login from student where id_user = {$id_user});");

    if ($loginexists) {
        echo "Update Failed: Login already exists for another user.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->update(
        "UPDATE login SET login = :login WHERE id_login = (SELECT id_login from student where id_user = :id_user);
        UPDATE user SET lastname = :lastname, firstname = :firstname, id_center = :id_center WHERE id_user = :id_user;
        UPDATE student SET lastname = :lastname, firstname = :firstname, id_center = :id_center, id_prom = :id_prom WHERE id_user = :id_user;", $binds);

    if ($_POST['password'] != '') {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $bind_pass = array(
            ':id_user' => array($id_user, PDO::PARAM_INT),
            ':password' => array($password, PDO::PARAM_STR)
        );
        $success_pass = $bdd->update("UPDATE login SET password = :password WHERE id_login = (SELECT id_login from user where id_user = :id_user)", $bind_pass);
    }

    if ($success) {
        echo 'Update Succesful.';
        die();
    }
    else {
        echo 'Update Failed: SQL Error.';
        die();
    }
    
} else {
    echo 'Update Failed: No parameters provided';
    die();
}