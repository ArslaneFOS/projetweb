<?php
require '../models/model.php';

if (isset($_POST['submit'])) {
    $bdd = new DB();
    
    $name_com = $_POST['name_com'];
    $sector_com = $_POST['sector_com'];
    $nb_interns_com = $_POST['nb_interns_com'];
    $description_com = $_POST['description_com'];
    $email_com = $_POST['email_com'];
    $logo_com = file_get_contents($_FILES['logo_com']['tmp_name']);
    
    //$logo_com = base64_encode($logo_com);

    $binds = array(
        ':name_com' => array($name_com, PDO::PARAM_STR),
        ':sector_com' => array($sector_com, PDO::PARAM_STR),
        ':nb_interns_com' => array($nb_interns_com, PDO::PARAM_INT),
        ':description_com' => array($description_com, PDO::PARAM_STR),
        ':email_com' => array($email_com, PDO::PARAM_STR),
        ':logo_com' => array($logo_com, PDO::PARAM_LOB),
    );
    
    $success = $bdd->create("INSERT INTO `company` (`id_com`, `name_com`, `sector_com`, `nb_interns_com`, `description_com`, `email_com`, `logo_com`) VALUES (NULL, :name_com, :sector_com, :nb_interns_com, :description_com, :email_com, :logo_com);", $binds);

    header('Location: ../views/');
    
    
}