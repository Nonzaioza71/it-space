<?php
    session_start();
    $path = dirname(__FILE__);
    $select = $_GET['select'];
    if (($_SESSION['user']['user_role'] == 'administrator') || ($_SESSION['user']['user_role'] == 'seller')) {
        if ($select == 'PR') {
            require_once($path.'/PurchaseRequest/views/index.inc.php');
        }
        elseif ($select == 'PO') {
            require_once($path.'/PurchaseOrder/views/index.inc.php');
        }
        else{
            echo "<script>window.history.pushState('' , '', './')</script>";
        }
    }
    else{
        echo "<script>window.history.pushState('' , '', './')</script>";
    }
?>