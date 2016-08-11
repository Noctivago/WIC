<!DOCTYPE html>
<?php
include("includes/head_singleforms.php");
include("../build/db/dbconn.php");
?>
<body>
    <?php
    if (isset($_POST['verify']) && !empty($_POST['verifyCity']) && !empty($_POST['city'])) {
        $city = (filter_var($_POST ['verifyCity'], FILTER_SANITIZE_STRING));
       //SE CIDADE EXISTE
        if (DB_checkIfUserExists($pdo, $email)) {
            //VERIFICA SE O ACTIVATION CODE PERTENCE AO EMAIL
            if (DB_compareActivationCode($pdo, $email, $code)) {
                //SE TRUE ATIVA CONTA
                if (DB_activateUserAccount($pdo, $email)) {
                    $msg = 'ACCOUNT SUCESSUFULLY ACTIVATED';
                    $to = $email;
                    $subject = "Account Successfully Activated";
                    $body = "Hello! <br><br>"
                            . "WiC Team welcomes you,<br><br>"
                            . "Thank you to making our dream happen.<br>"
                            . "Event your life ! You Can Event !<br><br>"
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
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="activateText" id="activateText" class="form-control" placeholder="Validation Code" required/>
                        <p class="sign-note">  <?= $msg; ?> </p>
                        <button type="submit" name="activate" id="activate" class="btn btn-rounded">Validate account</button>
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