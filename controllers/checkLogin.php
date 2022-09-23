<?php
    session_start();
    // session_destroy();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");

    require_once('../models/UserModel.php');
    $userModel = new UserModel();

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($_SESSION['auth']['login']) || isset($data)) {
        $_SESSION['auth']['login'] = $data;
        $check = $userModel->getUserLoginBy($_SESSION['auth']['login']);
    }
    else{
        $check = $userModel->getUserLoginBy($_SESSION['auth']['login']);
    }

    // $data = [];
    // $data['username'] = 'admin';
    // $data['password'] = '123456';
    // $check = $userModel->getUserLoginBy($data);
    
    $result['res'] = isset($check) ? $check : false;
    $result['input'] = $data;
    $_SESSION['user'] = $result['res'];
    echo json_encode($result, JSON_UNESCAPED_UNICODE);