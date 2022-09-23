<div class="animate__animated animate__fadeIn animate__faster">
    บัญชีชื่อ : <?php echo $user['user_name']. ' '.$user['user_lastname'] ?>
    <div class="btn btn-danger" onclick="fetch('./controllers/logoutUser.php'); loadPage(true, true); checkLoginNav(true);">
        ออกจากระบบ
    </div>
</div>