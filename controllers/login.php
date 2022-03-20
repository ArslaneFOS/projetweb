<?php
session_start();
require "../models/model.php";

if (isset($_POST['submit'])) {
    $login = isset($_POST['login']) ?  $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $bdd = new DB();

    $results = $bdd->select("SELECT * FROM login where login = '$login' ;");

    if ($results) {
        $data = $results[0];
        if (password_verify($password, $data['password'])) {
            $_SESSION['status'] = 'logged-in';
            $_SESSION['login'] = $login;
            header("Location: ../views/home.php"); 
            exit();
        } else {
            $_SESSION['status'] = 'wrong-pass';
            header("Location: ../views/home.php"); 
            exit();
        }
    } else {
        $_SESSION['status'] = 'user-not-exist';
        header("Location: ../views/home.php"); 
        exit();
    }
}
?>