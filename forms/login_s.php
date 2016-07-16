<?php
include_once '../db/conn.inc.php';
include_once '../db/recaptchalib.php';
include_once '../db/functions.php';
ob_start();
session_start();
if (isset($_SESSION['username'])) {
    header("location: profile.php");
}
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WIC</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <!-- RECHAPTA -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Sign In </strong> </h1>
                            <div class="description">
                                <p>
                                    Life is all about Celebration... You Can Event!! Try and have fun!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3 style="color:black">Login to our site</h3>
                                        <p style="color:black">Enter your Email and Password to log on:</p>

                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <label>
                                        <input type="radio" name="Organization" style="color:black" id="optionsRadios1" value="option1">
      Supplier
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      <input type="radio" name="User" id="optionsRadios1" value="option2">
      Planner
    </label>
                                    <?php
                                    if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                        $msg = '';
                                        // sua chave secreta
                                        $secret = "6LdypyQTAAAAAPaex4p6DqVY6W62Ihld7DDfCMDm";
                                        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST['g-recaptcha-response']);
                                        $response = json_decode($response, true);
                                        if ($response["success"] === true) {
                                            try {
                                                $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                                                $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                                                $hashPassword = hash('whirlpool', $password);
                                                #$val = DB_getLoginFailedValue($pdo, $email);
                                                if (DB_checkIfUserExists($pdo, $email)) {
                                                    if (DB_checkIfUserEnabled($pdo, $email)) {
                                                        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? ", array($email), "rows");
                                                        #$msg = 'EMAIL FOUND';
                                                        foreach ($rows as $row) {
                                                            if ($row['Email'] == $email && $row['Password'] == $hashPassword) {
                                                                //ADICIONAR PASSWORD
                                                                $_SESSION['valid'] = true;
                                                                $_SESSION['timeout'] = time();
                                                                $_SESSION['id'] = $row['Id'];
                                                                $_SESSION['username'] = $row['Username'];
                                                                $_SESSION['email'] = $row['Email'];
                                                                $_SESSION['password'] = $row['Password'];
                                                                $msg = 'Welcome ' . $row['Username'];
                                                                //SET [Login_failed] = 0
                                                                if (DB_setLoginFailed($pdo, $email)) {
                                                                    header('Location: profile.php');
                                                                }
                                                            } else {
                                                                $val = DB_getLoginFailedValue($pdo, $email);
                                                                if ($val < 3) {
                                                                    $value = $val + 1;
                                                                    DB_setLoginFailed($pdo, $email, $value);
                                                                    $msg = 'Wrong email or password';
                                                                } else {
                                                                    //BLOCK ACCOUNT
                                                                    DB_setLoginFailed($pdo, $email);
                                                                    DB_setBlockAccount($pdo, $email);
                                                                    //ENVIAR EMAIL COM INSTRUÇÔES DE DESBLOQUEIO
                                                                    $msg = 'Account blocked!';
                                                                    $to = $email;
                                                                    $subject = "WIC #ACCOUNT BLOCKED";
                                                                    $code = generateActivationCode();
                                                                    DB_updateUserAccountActivationCode($pdo, $email, $code);
                                                                    $body = "Hi! <br>"
                                                                            . "Your account was blocked due severed failed logins.<br>"
                                                                            . "Use the following code to unblock your account: " . $code . "<br>"
                                                                            . "Plase use the following URL to unlock: http://www.wic.club<br>"
                                                                            . "Best regards,<br>"
                                                                            . "WIC<br><br>"
                                                                            . "Note: Please do not reply to this email! Thanks!";
                                                                    sendEmail($to, $subject, $body);
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $to = $email;
                                                        $msg = "Account blocked! Please check your email!";
                                                        $subject = "WIC #ACCOUNT BLOCKED";
                                                        $code = generateActivationCode();
                                                        DB_updateUserAccountActivationCode($pdo, $email, $code);
                                                        $body = "Hi! <br>"
                                                                . "Your account was blocked due severed failed logins.<br>"
                                                                . "Use the following code to unblock your account: " . $code . "<br>"
                                                                . "Plase use the following URL to unlock: http://www.wic.club<br>"
                                                                . "Best regards,<br>"
                                                                . "WIC<br><br>"
                                                                . "Note: Please do not reply to this email! Thanks!";
                                                        sendEmail($to, $subject, $body);
                                                    }
                                                } else {
                                                    $msg = "Wrong email or password!";
                                                }
                                            } catch (Exception $ex) {
                                                echo "ERROR!";
                                            }
                                        } else {
                                            echo "You are a robot";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="email" name="email" placeholder="youremail@email.com" class="form-username form-control" id="form-username" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password" required>
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="6LdypyQTAAAAACjs5ZFCy67r2JXYJUcudQvstby6" required></div>
                                        <br>
                                        <button type="submit" class="btn" name="login">Sign in!</button>

                                    </form>
                                </div>
                                <h3> Don´t have an account?</3>
                                    <button type="submit" class="btn"  onClick="document.location.href = 'registration.php'">Sign up!</button>
                            </div>

                            <div class="social-login">
                                <h3>...or login with:</h3>
                                <div class="social-login-buttons">
                                    <a class="btn btn-link-1 btn-link-1-facebook" href="login_facebook.php">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </a>
                                    <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                    <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                        <i class="fa fa-google-plus"></i> Google Plus
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">



                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="footer-border"></div>
                        <p>Made by <a href="http://google.pt" target="_blank"><strong>Easy Solutions</strong></a> 
                            having a lot of fun. <i class="fa fa-smile-o"></i></p>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/scripts.js" type="text/javascript"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>


</html>
