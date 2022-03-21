<?php
// connection a la database
require '../models/model.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$offset = ($page - 1) * $limit;
$params = array(
    ':limit' => array($limit, PDO::PARAM_INT),
    ':offset' => array($offset, PDO::PARAM_INT),
    ':search' => array($search, PDO::PARAM_STR)
);

$bdd = new DB();

$results = $bdd->select('SELECT * from company  WHERE INSTR(name_com, :search) > 0 order by id_com LIMIT :offset, :limit;', $params);
$total = $bdd->select('SELECT COUNT(*) as total from company  WHERE INSTR(name_com, :search);', array(':search' => array($search, PDO::PARAM_STR)));

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
echo json_encode($echo);
