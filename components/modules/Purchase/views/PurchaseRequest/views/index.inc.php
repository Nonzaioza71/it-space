<?php
    $path = dirname(__FILE__);
    $option = $_GET['option'];

    if ($option == 'insert') {
        require_once($path.'/insert.inc.php');
    }else{
        require_once($path.'/view.inc.php');
    }