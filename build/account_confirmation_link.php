<!DOCTYPE html>
<?php
include("includes/head_singleforms.php");
include("../build/db/dbconn.php");
?>
<body>
    <?php
    if (!empty($_GET['AC']) && !empty($_GET['EM'])) {
        $code = (filter_var($_GET ['AC'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_GET ['EM'], FILTER_SANITIZE_EMAIL));
        //SE EMAIL EXISTE
        if (DB_checkIfUserExists($pdo, $email)) {
            //VERIFICA SE O ACTIVATION CODE PERTENCE AO EMAIL
            if (DB_compareActivationCode($pdo, $email, $code)) {
                //SE TRUE ATIVA CONTA
                if (DB_activateUserAccount($pdo, $email)) {
                    $msg = 'ACCOUNT SUCESSUFULLY ACTIVATED';
                    $to = $email;
                    $subject = "WIC #ACCOUNT ACTIVATED";
                    $body = "Hi! <br>"
                            . "Your account was successfully activated!<br>"
                            . "You can now login and make the best event for you!<br>"
                            . "Best regards,<br>"
                            . "WIC<br><br>"
                            . "Note: Please do not reply to this email! Thanks!";
                    $msg = sendEmail($to, $subject, $body) . ' Account successfully activated!';
                } else {
                    //SENAO
                    $msg = 'AN ERROR OCCURED WHILE ACTIVATING ACCOUNT';
                }
            } else {
                //SENAO INFORMA
                $msg = 'WRONG ACTIVATION CODE!';
            }
        } else {
            //SENAO INFORMA
            $msg = 'INCORRECT DATA. PLEASE TRY AGAIN!';
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Confirm Your Account</header>
                    <div class="form-group">
                        <p class="sign-note">  <?= $msg; ?> </p>
                        <p class="sign-note">New to our website? <a href="sign_up_user.php">Sign up as an user</a><a href="sign_up_org.php"> Sign up as an Organization</a></p>
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