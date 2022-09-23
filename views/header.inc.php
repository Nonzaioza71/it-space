<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Space</title>
    <link rel="shortcut icon" href="./templates/images/downloads/icon.png" type="image/x-icon">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;1,100;1,200&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- iconify -->
    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>

    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- swal2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- sweet-modal -->
    <!-- <link rel="stylesheet" href="./templates/imports/sweet-modal/min/jquery.sweet-modal.min.css" />
    <script src="./templates/imports/sweet-modal/min/jquery.sweet-modal.min.js"></script> -->

    <!-- custom css -->
    <link rel="stylesheet" href="./templates/css/main.css">

    <!-- custom header script -->
    <?php 
        $importType = 'imp';
        if ($importType == 'imp') {
    ?>
        <script src="./views/scripts/GLOBAL.js"></script>
        <script src="./views/scripts/global.scripts.js"></script>
        <script src="./views/scripts/navController.scripts.js"></script>
        <script src="./views/scripts/layout.scripts.js"></script>
        <script src="./views/scripts/CustomElements.scripts.js"></script>
        <script src="./views/scripts/loading.script.js"></script>
    <?php }else{
            require_once('./views/scripts/global.scripts.php'); 
            require_once('./views/scripts/header.scripts.php');
            require_once('./views/scripts/layout.scripts.php');
            require_once('./views/scripts/CustomElements.scripts.php');
            require_once('./views/scripts/loading.script.php');
        }
    ?>