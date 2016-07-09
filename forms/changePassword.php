<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
#session_start();
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
        <title>WIC PASSWORD CHANGE</title>

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
                            <h1><strong>PASSWORD CHANGE</strong> </h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3 style="color:black">PASSWORD CHANGE</h3>

                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['changePassword']) && !empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newPassword2'])) {
                                        $msg = '';
                                        try {
                                            #$d = getDateToDB();
                                            $old = (filter_var($_POST ['oldPassword'], FILTER_SANITIZE_STRING));
                                            $new = (filter_var($_POST ['newPassword'], FILTER_SANITIZE_STRING));
                                            $new1 = (filter_var($_POST ['newPassword2'], FILTER_SANITIZE_STRING));
                                            $userId = $_SESSION['id'];
                                            //VERIFICAR SE NEW == NEW !
                                            if ($new === $new1) {
                                                $hashPassword = hash('whirlpool', $new);
                                                $password = hash('whirlpool', $old);
                                                //VERIFICAR SE OLD CORRETA
                                                if (DB_checkIfUserPasswordIsCorrect($pdo, $password, $userId)) {
                                                    if (DB_changeUserPassword($pdo, $userId, $hashPassword)) {
                                                        $msg = 'PASSWORD CHANGED!';
                                                    } else {
                                                        $msg = 'AN ERROR OCCURED! PLEASE TRY AGAIN!';
                                                    }
                                                } else {
                                                    $msg = 'THE CURRENT PASSWORD IS NOT CORRECT!';
                                                }
                                            } else {
                                                $msg = 'THE NEW PASSWORD DO NOT MATCH! PLEASE TRY AGAIN!';
                                            }
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <input type="password" name="oldPassword" placeholder="ACTUAL PASSWORD" class="form-username form-control" id="oldPassword" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="newPassword" placeholder="NEW PASSWORD" class="form-username form-control" id="newPassword" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="newPassword2" placeholder="CONFIRM NEW PASSWORD" class="form-username form-control" id="newPassword2" required autofocus>
                                        </div>
                                        <button type="submit" class="btn" name="changePassword">SAVE CHANGES!</button>

                                    </form>
                                </div>

                            </div>

                            <div class="social-login">

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
