<?php
include_once '../db/conn.inc.php';
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
        <title>LOGIN PAGE</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">



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
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <p>Login to our site</p>
                                        <p>Enter your EMAIL and password to log on:</p>

                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                        $msg = '';
                                        try {
                                            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                                            $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                                            $hashPassword = hash('whirlpool', $password);
                                            if (DB_checkIfUserExists($pdo, $email)) {
                                                $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? and [Account_Enabled] = ?", array($email, '1'), "rows");
                                                $msg = 'EMAIL FOUND';
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
                                                        //INC TO BLOCK;
                                                        //SET
                                                        $val = DB_getLoginFailedValue($pdo, $email);
                                                        if ($val < 3) {
                                                            $value = $val + 1;
                                                            DB_setLoginFailed($pdo, $email, $value);
                                                            $msg = 'Wrong username or password';
                                                        } else {
                                                            //BLOCK ACCOUNT
                                                            DB_setLoginFailed($pdo, $email);
                                                            DB_setBlockAccount($pdo, $email);
                                                            $msg = 'Account blocked!';
                                                        }
                                                    }
                                                }
                                            } else {
                                                $msg = 'Wrong username or password';
                                            }
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
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
                                        <button type="submit" class="btn" name="login">Sign in!</button>
                                        
                                    </form>
                                </div>
                                <h3> Don´t have an account?</3>
                                    <button type="submit" class="btn"  onclick="registration.php">Sign up!</button>
                                    <input type="button" class="btn" onClick="document.location.href='registration.php'" />
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
