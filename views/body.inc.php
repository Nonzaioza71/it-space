<div id="navBar"></div>
<div id="sideBar"></div>

<?php
    $body_path = dirname(__FILE__);
    $view = $_GET['view'];

    require_once($body_path . './layouts/content.inc.php');