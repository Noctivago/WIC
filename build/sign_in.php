<!DOCTYPE html>
<?php
include_once 'includes/head_singleforms.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
$msg = '';

ob_start();
session_start();
if (isset($_SESSION['id'])) {
    //CHECK ROLE
    header("location: profile.php");
}
?>
<body>
    <?php
    if (isset($_POST['signin']) && !empty($_POST['email']) && !empty($_POST['pw'])) {
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
        $pw = (filter_var($_POST ['pw'], FILTER_SANITIZE_STRING));
        if ($pw1 != $pw2) {
            $msg = "PASSWORD & RETYPE PASSWORD DOES NOT MATCH!";
        } else {
            $hashPassword = hash('whirlpool', $pw1);
            //FUNCA ATE AKI
            if (DB_checkIfUserExists($pdo, $email)) {
                $msg = 'EMAIL [' . $email . '] ALREADY REGISTED!';
            } else {
                try {
                    $code = generateActivationCode();
                    DB_addUser($pdo, $hashPassword, $email, $code);
                } catch (Exception $ex) {
                    echo "ERROR!";
                }
            }
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pw" name="pw" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset_password.php">Reset Password</a>
                        </div>
                    </div>
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="signin" class="btn btn-rounded">Sign in</button>
                    <p class="sign-note">New to our website? <a href="sign_up.php">Sign up</a></p>
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
</body>
</html>