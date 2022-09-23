<!-- custom footer script -->
<?php 
        $importType = 'imp';
        if ($importType == 'imp') {
    ?>
        <script src="./views/scripts/content.scripts.js"></script>
        <script src="./views/scripts/onLoad.scripts.js"></script>
        <script src="./views/scripts/useState.script.js"></script>
    <?php }else{
            require_once('./views/scripts/onLoad.scripts.php');
        }
    ?>