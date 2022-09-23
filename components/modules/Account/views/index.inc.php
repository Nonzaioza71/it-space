<?php
    session_start();
    $path = dirname(__FILE__);
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : false ;
    if($user['user_id']){
        require_once($path.'/view.inc.php');
    }else{
        require_once($path.'/auth.inc.php');
    }
    echo '<pre>';
    print_r($user);
    echo '</pre>';