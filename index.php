<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./onLoad.js"></script>
    <?php require_once('./views/header.inc.php') ?>
</head>
<body>
    <noscript>
        <div 
            style="
                width:100%; 
                height:95vh; 
                justify-content:center; 
                vertical-align:middle; 
                display:flex; 
                align-items:center;overflow: hidden;
                position: relative;
            "
        >
            <div style="text-align: center; position: relative;">
                <img src="./templates/images/downloads/icon.png" height=128 width=128>
                <hr style="margin-top: 2rem;">
                <strong>
                    กรุณาเปิดใช้งาน JavaScript <img src="https://api.iconify.design/logos/javascript.svg" height=32 width=32 style="margin-bottom: 16px;"> บนบราวเซอร์ของคุณ
                </strong>
            </div>
        </div>
    </noscript>
    <?php require_once('./views/body.inc.php') ?>
</body>
<footer>
    <?php require_once('./views/footer.inc.php') ?>
</footer>
</html>