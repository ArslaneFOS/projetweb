<?php
//sfx2
// checks access requirements
require 'check-session.php';

// admins, pilots, students and authorized reps
if (!(has_student_access_level() || has_admin_access_level() || has_pilot_access_level() || has_representative_access_level('sfx2'))) {
    echo "Access Denied";
    die();
}

// connection to database
require_once('../models/model.php');
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? ($_GET['search']) : '';
$id_student = $_SESSION['id_user'];
$offset = ($page - 1) * $limit;

$binds = array(
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':search' => array($search, PDO::PARAM_STR),
    ':id_student' => array($id_student, PDO::PARAM_INT)
);

$bdd = new DB();

$results = $bdd->select("SELECT company.*, students_evals.student_eval from company left join (select * from students_evals WHERE students_evals.id_student = :id_student) as students_evals on students_evals.id_com = company.id_com WHERE INSTR(company.name_com, :search) ORDER BY id_com LIMIT :offset, :limit;", $binds);
$total = $bdd->select("SELECT COUNT(*) as total from company  WHERE INSTR(name_com, :search);", array(':search' => array($search, PDO::PARAM_STR)));

$total = (int)$total[0]['total'];

$resultEncode = array();
foreach ($results as $key => $value) {
    # code...
    $resultEncode[$key] = $results[$key];
    $resultEncode[$key]['logo_com'] = base64_encode($results[$key]['logo_com']);
}

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'search' => $search,
    'total' => $total,
    'data' => $resultEncode
);

header('Content-type: application/json');
echo json_encode($results ? $echo:null);
