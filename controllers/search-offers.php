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
    ':search' => array($search, PDO::PARAM_STR_CHAR)
);

$bdd = new DB();

$results = $bdd->select('select * from offer  WHERE INSTR(name_offer, :search) > 0 order by id_offer LIMIT :offset, :limit;', $params);

$resultEncode = array();
foreach ($results as $key => $value) {
    # code...
    $resultEncode[$key] = $results[$key];
}

$echo = array(
    'page' => $page,
    'limit' => $limit,
    'data' => $resultEncode
);

header('Content-type: application/json');
echo json_encode(count($results) == 0 ? null : $echo);
