<?php
require '../models/model.php';
// checks access requirements
require 'check-session.php';
// admins and pilots
if (!(has_admin_access_level() || has_student_access_level())) {
    echo "Access Denied";
    die();
}
if (isset($_GET['id_com']) && isset($_SESSION['id_user']) && isset($_GET['rating'])) {
    $bdd = new DB();
    foreach ($_GET as $key => $value) {
        # code...
        if ($value == "") {
            echo 'Evaluation Failed: Empty field(s).';
            die();
        }
    }
    
    // --------------------------------------------------
    $id_com = $_GET['id_com'];
    $id_student = $_SESSION['id_user'];
    $rating = $_GET['rating'];
    
    
    $binds = array(
        ':id_student' => array($id_student, PDO::PARAM_INT),
        ':id_com' => array($id_com, PDO::PARAM_INT),
        ':rating' => array($rating, PDO::PARAM_STR),
    );
    
    // --------------------------------------------------
    $isexist = $bdd->select("SELECT 1 from students_evals where id_com = {$id_com} AND id_student = {$id_student};");

    if ($isexist) {
        // update
        $success = $bdd->update("UPDATE students_evals SET student_eval = :rating WHERE id_com = :id_com AND id_student = :id_student;", $binds);
    } else {
        // create
        $success = $bdd->create("INSERT INTO `students_evals` (`id_student`, `id_com`, `student_eval`) VALUES (:id_student, :id_com, :rating);", $binds);
    }
    
    // --------------------------------------------------

    if ($success) {
        echo 'Evaluation Succesful.';
        die();
    }
    else {
        echo 'Evaluation Failed: SQL Error.';
        die();
    }
    
} else {
    echo 'Evaluation Failed: No parameters provided';
    die();
}