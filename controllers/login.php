<?php
session_start();
require "../models/model.php";

if (isset($_POST['submit'])) {
    $login = isset($_POST['login']) ?  $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $bdd = new DB();

    $results = $bdd->select(
        "SELECT * FROM login where login = :login;", 
        array(':login' => array(
            $login, PDO::PARAM_STR
        )));
    if ($results) {
        $data = $results[0];
        if (password_verify($password, $data['password'])) {
            $id_login = $data['id_login'];

            $isstudent = $bdd->select("SELECT 1 from student WHERE id_login = :id_login;", array(':id_login' => array($id_login, PDO::PARAM_INT)));
            $isrep = $bdd->select("SELECT 1 from representative WHERE id_login = :id_login;", array(':id_login' => array($id_login, PDO::PARAM_INT)));
            $ispilot = $bdd->select("SELECT 1 from pilot WHERE id_login = :id_login;", array(':id_login' => array($id_login, PDO::PARAM_INT)));
            $isadmin = $bdd->select("SELECT 1 from admin WHERE id_login = :id_login;", array(':id_login' => array($id_login, PDO::PARAM_INT)));

            if ($isstudent) 
                $_SESSION['user-type'] = 'student';
            elseif ($isrep)
                $_SESSION['user-type'] = 'representative';
            elseif ($ispilot)
                $_SESSION['user-type'] = 'pilot';
            elseif ($isadmin)
                $_SESSION['user-type'] = 'admin';

                $user = $bdd->select("SELECT * from user WHERE id_login = :id_login;", array(':id_login' => array($id_login, PDO::PARAM_INT)))[0];

            $_SESSION['status'] = 'logged-in';
            $_SESSION['login'] = $login;
            $_SESSION['id_login'] = $id_login;
            $_SESSION['name'] = $user['firstname'].' '.$user['lastname'];
            header("Location: ../views/home.php");
            die();
        } else {
            //$_SESSION['status'] = 'wrong-pass';
            //header("Location: ../views/home.php"); 
            echo "wrong-pass";
            die();
        }
    } else {
        //$_SESSION['status'] = 'user-not-exist';
        //header("Location: ../views/home.php"); 
        echo "user-not-exist.";
        die();
    }
}
?>