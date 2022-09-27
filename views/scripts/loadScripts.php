<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    $path = dirname(__FILE__);
    $files = glob($path."/*.js");
    $check['res'] = [];
    $check['checked'] = [];
    foreach ($files as $index=>$file) {
        $check['res'][basename($file)] = file_get_contents($file);
        $check['checked'][basename($file)] = boolval($check['res']);
    }

    // echo json_encode($check['checked']);
    echo '{"checked" : "true"}';