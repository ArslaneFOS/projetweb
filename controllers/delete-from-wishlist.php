<?php
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_student_access_level())) {
    echo "Access Denied";
    die();
}

// connection a la database
require '../models/model.php';

if(!isset($_GET['id_offer']) && isset($_SESSION['id_user'])) {
    echo "Deletion Failed: No ID provided";
    die();
}

$id_offer = $_GET['id_offer'];
$id_student = $_SESSION['id_user'];

$binds = array(
    ':id_offer' => array($id_offer, PDO::PARAM_INT),
    ':id_student' => array($id_student, PDO::PARAM_INT)
);

$bdd = new DB();

$exists = $bdd->select("SELECT 1 FROM students_wishlists where id_offer = :id_offer AND id_student = :id_student", $binds);

if(!$exists) {
    echo "Deletion Failed: Offer not in wishlist.";
    die();
}

$success = $bdd->delete("DELETE FROM `students_wishlists` WHERE `id_offer` = :id_offer AND id_student = :id_student;", $binds);

if ($success) {
    echo "Deletion Succesful";
    die();
} else {
    echo "Deletion Failed: SQL Error.";
}
