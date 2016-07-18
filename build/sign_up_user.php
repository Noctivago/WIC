<!DOCTYPE html>
<?php
include("includes/head_singleforms.php");
include("../build/db/functions.php");
include("../build/db/dbsignup.php");
?>
<body>

    <?php
    if (isset($_POST['signup']) && !empty($_POST['email']) && !empty($_POST['pw1']) && !empty($_POST['pw2'])) {
        $secret = "6LdypyQTAAAAAPaex4p6DqVY6W62Ihld7DDfCMDm";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST['g-recaptcha-response']);
        $response = json_decode($response, true);
        if ($response["success"] === true) {
            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
            #echo 'USERNAME ' . $rows['Username'];
            $pw1 = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
            $pw2 = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
            if ($pw1 != $pw2) {
                $msg = "PASSWORD NOT MATCH!";
            } else {
                $hashPassword = hash('whirlpool', $pw1);
                if (DB_checkIfUserExists($pdo, $email)) {
                    $msg = 'EMAIL [' . $email . '] ALREADY REGISTED!';
                    $forgotPassword = '<a href=account-recovery.php>Forgot your account details?</a>';
                } else {
                    try {
                        //GERA CODIGO DE ATIVACAO DE 128car
                        $code = generateActivationCode();
                        sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email], [Account_Enabled], [User_Code_Activation], [Login_Failed]) VALUES (?, ?, ?, ?, ?, ?)", array($username, $hashPassword, $email, '0', $code, '0'));
                        $msg = "ACCOUNT INFORMATION IS BEING SENT! PLEASE WAIT!";
                        $to = $email;
                        $subject = "WIC #ACCOUNT CONFIRMATION";
                        $body = "Hi! <br>"
                                . "To start using our services you need to validate your email.<br>"
                                . "Please use the following code to do that: " . $code . "<br>"
                                . "You can activate your account in the following address: http://www.wic.club/<br>"
                                . "Best regards,<br>"
                                . "WIC<br><br>"
                                . "Note: Please do not reply to this email! Thanks!";
                        $msg = sendEmail($to, $subject, $body) . ' Please check your inbox for foward information!';
                        #CREATE PROFILE
                        DB_CheckOrganizationInvitationAndMoveToInvites($pdo, $email);
                        DB_createProfileOnRegistration($pdo, $email);
                    } catch (Exception $ex) {
                        echo "ERROR!";
                    }
                }
            }
        } else {
            $msg = "You are a robot";
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
                        <div class="g-recaptcha" class="form-control" data-sitekey="6LdypyQTAAAAACjs5ZFCy67r2JXYJUcudQvstby6" required></div>
                    </div>
                    <div class="form-group">
                        <?= $msg; ?>
                    </div>
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