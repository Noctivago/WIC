<!DOCTYPE html>
<?php
include("includes/head_singleforms.php");
include_once './db/dbconn.php';
$msg = '';
?>
<body>
    <?php
    if (isset($_POST['reset']) && !empty($_POST['email'])) {
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
        #echo 'USERNAME ' . $rows['Username'];
        if (DB_checkIfUserExists($pdo, $email)) {
            $msg = DB_resetPassword($pdo, $email);
        } else {
            $msg = "AN ERROR OCCURED! PLEASE TRY AGAIN!";
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box reset-password-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <!--<div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>-->
                    <header class="sign-title">Reset Password</header>
                    <div class="form-group">
                        <input type="text" id="email" name ="email" class="form-control" placeholder="E-Mail"/>
                    </div>
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="reset" class="btn btn-rounded">Reset</button>
                    or <a href="sign_in.php">Sign in</a>
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