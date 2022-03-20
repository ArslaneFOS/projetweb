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

$results = $bdd->select('select * from company  WHERE INSTR(name_com, :search) > 0 order by id_com LIMIT :offset, :limit;', $params);

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
    'data' => $resultEncode
);

header('Content-type: application/json');
echo json_encode($echo);
