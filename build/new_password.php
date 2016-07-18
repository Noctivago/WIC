<!DOCTYPE html>
<?php
    include("includes/head_singleforms.php");
?>

<body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box reset-password-box">
                    <!--<div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>-->
                    <header class="sign-title">New Password</header>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="New Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm New Password"/>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div><!--.page-center-->

<?php
include("includes/basic_scrpits_css.php");
?>

</body>
</html>