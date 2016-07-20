<!DOCTYPE html>
<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>
<body>


    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Sign Up</header>
                    <div class="form-group">
                        <input type="email" id = "email" name ="email" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" id ="pw1" name="pw1" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pw2" name = "pw2" class="form-control" placeholder="Repeat password" required/>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" class="form-control" data-sitekey="6LdypyQTAAAAACjs5ZFCy67r2JXYJUcudQvstby6"></div>
                    </div>
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="signup" class="btn btn-rounded btn-success sign-up">Sign up</button>
                    <p class="sign-note">Already have an account? <a href="sign_in.php">Sign in</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <!-- RECHAPTA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
