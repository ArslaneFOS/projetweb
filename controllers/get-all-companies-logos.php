<?php
// connection a la database
require '../models/model.php';
$bdd = new DB();

$results = $bdd->select('select * from company;');

    foreach ($results as $key => $value) {
        # code...
        $newArrayData[$key] = $results[$key];
        $newArrayData[$key]['logo_com'] = base64_encode($results[$key]['logo_com']);
    }

header('Content-type: application/json');
echo json_encode(count($results)==0? null : $newArrayData);
?>