<?php
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_pilot_access_level())) {
    echo "Access Denied";
    die();
}
require '../models/model.php';

if (isset($_POST['login'])) {
    $bdd = new DB();
    foreach ($_POST as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Creation Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id_center = $_POST['id_center'];
    
    $binds = array(
        ':login' => array($login, PDO::PARAM_STR),
        ':password' => array($password, PDO::PARAM_STR),
        ':firstname' => array($firstname, PDO::PARAM_STR),
        ':lastname' => array($lastname, PDO::PARAM_STR),
        ':id_center' => array($id_center, PDO::PARAM_INT),
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from login where login = '{$login}';");

    if ($isexist) {
        echo "Creation Failed: Login already exists.";
        die();
    }
    
    // --------------------------------------------------
    $success = $bdd->create(
        "INSERT INTO `login` (`id_login`, `login`, `password`) 
        VALUES (NULL, :login, :password);
    INSERT INTO `user` (`id_user`, `lastname`, `firstname`, `id_center`, `id_login`) 
        VALUES (NULL, :lastname, :firstname, :id_center, (SELECT `id_login` FROM `login` WHERE login = :login));
    INSERT INTO `representative` (`id_user`, `lastname`, `firstname`, `id_center`, `id_login`) 
        VALUES ((SELECT id_user from user where id_login = (SELECT `id_login` FROM `login` WHERE login = :login)), :lastname, :firstname, :id_center, (SELECT `id_login` FROM `login` WHERE login = :login));", $binds);

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