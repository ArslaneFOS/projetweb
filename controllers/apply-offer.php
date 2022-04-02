<?php
//sfx29
// checks access requirements
require 'check-session.php';
// admins and students
if (!(has_admin_access_level() || has_student_access_level())) {
    echo "Access Denied";
    die();
}

// connection a la database
require_once('../models/model.php');

$bdd = new DB();

foreach ($_POST as $key => $value) {
    # code...
    if ($value == "") {
        echo 'Application Failed: Empty field(s).';
        die();
    }
}
// --------------------------------------------------
if ($_FILES['resume']['size'] == 0 || $_FILES['motivation']['size'] == 0 ) {
    echo 'Application Failed: No Resume or Motivation Letter provided.';
    die();
}

$ALLOWED_MIME = array('application/pdf');

if (!in_array($_FILES['resume']['type'], $ALLOWED_MIME) || !in_array($_FILES['motivation']['type'], $ALLOWED_MIME)) {
    echo "NOT A PDF FILE.";
    die();
}

$id_user = $_SESSION['id_user'];

$isstudent = $bdd->select("SELECT 1 FROM student where id_user = :id_user;", array(':id_user' => array($id_user, PDO::PARAM_INT)));

$id_offer = $_POST['id_offer'];

$offerexists = $bdd->select("SELECT 1 FROM offer where id_offer = :id_offer;", array(':id_offer' => array($id_offer, PDO::PARAM_INT)));




$appexists = $bdd->select("SELECT 1 FROM applications where id_offer = :id_offer AND id_student = :id_student;", array(':id_offer' => array($id_offer, PDO::PARAM_INT), ':id_student' => array($id_user, PDO::PARAM_INT)));

if ($appexists) {
    echo "You already applied for this offer";
    die();
}

if (!$isstudent || !$offerexists) {
    echo "Not a student or offer doesn't exist.";
    die();
}

$resume = file_get_contents($_FILES['resume']['tmp_name']);
$motivation = file_get_contents($_FILES['motivation']['tmp_name']);


$binds = array(
    ':id_student' => array($id_user, PDO::PARAM_INT),
    ':id_offer' => array($id_offer, PDO::PARAM_INT),
    ':resume' => array($resume, PDO::PARAM_LOB),
    ':motivation' => array($motivation, PDO::PARAM_LOB)
);

$success = $bdd->create("INSERT INTO applications(id_student, id_offer, resume, motivation_letter, status) VALUES (:id_student, :id_offer, :resume, :motivation, 'step 1');", $binds);

if ($success) {
    echo "Application Successful.";
    $company = $bdd->select("SELECT name_com, email_com from company where id_com = (select id_com from offer where id_offer = :id_offer);", array(':id_offer' => array($id_offer, PDO::PARAM_INT)))[0];
    $offer = $bdd->select("SELECT name_offer from offer where id_offer = :id_offer;", array(':id_offer' => array($id_offer, PDO::PARAM_INT)))[0];
    $name_com = urlencode($company['name_com']);
    $email = urlencode($company['email_com']);
    $subject = urlencode("My Internship Application at ").$name_com;
    $body = urlencode(
"Greetings,
I am contacting you to apply for your offer: ".$offer['name_offer'].".
!!!!!!!!!!!!!!!!!!!!!!!!!!DELETE THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Please attach your resume and motivation letter again.
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
    header('location: mailto:'.$email.'?subject='.$subject."&body=".$body);
    die();
} else {
    echo "Application failed: SQL Error.";
    die();
}