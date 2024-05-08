<?php
$users=['1'=>['name'=>'Ali','age'=>25],'2'=>['name'=>'Reza','age'=>33]];

if((isset($_GET['id'])) && isset($users[$_GET['id']])){
header('Content-Type: application/json');

echo json_encode($users[$_GET['id']]);
}
else{

    http_response_code(404);
    echo json_encode(['error'=>'NOT FOUND!']);
}
