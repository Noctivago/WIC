<?php
include_once '../db/conn.inc.php';
include_once '../db/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Account Recovery </title>

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
        <link rel="shortcut icon" href="../assets/img/backgrounds/logo.png">
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
                            <h1><strong>Account recovery</strong> </h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">


                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <p>Please fill the form below to get access again:</p>

                                        <!--                                        <div class="form-top-right">
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </div>-->
                                    </div>
                                    <div class="form-bottom"><h4> <?php echo $msg; ?></h4>
                                        <?php
                                        if (isset($_POST['activate']) && !empty($_POST['email'])) {
                                            $msg = '';
                                            $forgotPassword = '';
                                            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                                            //SE EMAIL EXISTE
                                            if (DB_checkIfUserExists($pdo, $email)) {
                                                //CRIA PASSWORD -
                                                //ATRIBUI NOVA PASSWORD AO USER
                                                $password = generateActivationCode();
                                                //CODIFICA PASSWORD PARA INSERIR NA BD
                                                $hashPassword = hash('whirlpool', $password);
                                                //INSERE PASSWORD NA BD
                                                if (DB_changeUserPassword($pdo, $email, $hashPassword)) {
                                                    //ENVIA EMAIL
                                                    $to = $email;
                                                    $subject = "WIC - ACCOUNT RECOVERY";
                                                    $body = $password;
                                                    $msg = sendEmail($to, $subject, $body);
                                                } else {
                                                    $msg = "AN ERROR OCCURED! PLEASE TRY AGAIN!";
                                                }
                                            } else {
                                                //SENAO INFORMA
                                                $msg = 'INCORRECT DATA. PLEASE TRY AGAIN!';
                                            }
                                        }
                                        ?>
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="registration-form">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-email">Email</label>
                                                <input type="email" name="email" placeholder="youremail@email.com" class="form-email form-control" id="form-email"required>
                                            </div>
                                            <button type="submit" class="btn" name="activate">Recovery Account</button>
                                        </form>
                                    </div>
                                </div>

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
                            <p>Made by  <a href="http://google.pt" target="_blank"><strong>Easy Solutions</strong></a> 
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

            <!--[if lt IE 10]>
                <script src="assets/js/placeholder.js"></script>
            <![endif]-->

    </body>

</html>