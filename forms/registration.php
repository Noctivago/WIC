<?php
include_once '../db/conn.inc.php';
include_once '../db/functions.php';
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
        <title> Register </title>

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
                            <h1><strong>Register Now</strong> </h1>
                            <div class="description">
                                <p>
                                    Registe-se e Realize o seu evento de sonho já!  A vida é uma celebração
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">



                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">


                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <p>Sign up now!!</p>
                                        <p>Fill in the form below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['signup']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                                        $msg = '';
                                        $forgotPassword = '';
                                        $secret = "6LdypyQTAAAAAPaex4p6DqVY6W62Ihld7DDfCMDm";
                                        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST['g-recaptcha-response']);
                                        $response = json_decode($response, true);
                                        if ($response["success"] === true) {
                                            $username = (filter_var($_POST ['username'], FILTER_SANITIZE_STRING));
                                            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                                            #echo 'USERNAME ' . $rows['Username'];
                                            $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                                            $hashPassword = hash('whirlpool', $password);

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
                                        } else {
                                            echo "You are a robot";
                                        }
                                    }
                                    ?>
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="registration-form">
                                        <div class="form-group"<h4><?php echo $msg; ?></h4>
                                            <label class="sr-only" for="form-first-name">Username</label>
                                            <input type="text" name="username" placeholder="Username..." class="form-first-name form-control" id="form-first-name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-last-name">Password</label>
                                            <input type="password" name="password" placeholder="Password" class="form-last-name form-control" id="form-last-name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="email" name="email" placeholder="example@wic.club" class="form-email form-control" id="form-email"required>
                                        </div>

                                        <div class="form-group">
                                            <select id = "countrySelect" class="form-first-name form-control" onchange="myFunction()">
                                                <option value="0">Country</option>
                                                <?= DB_getCountryAsSelect($pdo); ?>
                                            </select>
                                        </div>
                                        <!--LOAD CITIES-->
                                        <div class = "form-group">
                                            <select class = "form-first-name form-control loadcity"  id="cities" disabled>
                                                <option value="0">City</option>
                                            </select>
                                        </div>
                                        <div class = "form-group">
                                            <select class = "form-first-name form-control" id="userChoice" onchange="FunctionCat()">
                                                <option value = "N">USER TYPE</option>
                                                <option value = "1">JOIN AS SUPPLIER</option>
                                                <option value = "2">JOIN AS PLANNER</option>
                                            </select>
                                        </div>
                                        <div class = "form-group">
                                            <select class = "form-first-name form-control" id="loadCat" style="display:none;">
                                                <!--GET CATEGORY AS SELECT-->
                                                <option value = "choice">PLEASE CHOOSE A CATEGORY</option>
                                                <?= DB_getCategoryAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <!--ON CHANGE LOAD SUPPLIER TYPE IS VALUE=SUPPLIER-->
                                        <div class="g-recaptcha" data-sitekey="6LdypyQTAAAAACjs5ZFCy67r2JXYJUcudQvstby6" required></div>
                                        <br>
                                        <button type="submit" class="btn" name="signup">Sign me up!</button>
                                        <h2><?php echo $forgotPassword; ?></h2>
                                    </form>
                                </div>
                                <h3> Already have an account?</3>
                                    <button type="submit" class="btn"  onClick="document.location.href = 'login.php'">Sign in!</button>

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

        <script>
                                        function myFunction() {
                                            var x = document.getElementById("countrySelect").value;
                                            //div.style.visibility = 'visible';
                                            //div.style.visibility = 'hidden';
                                            loadcities(x);
                                        }
                                        function loadcities(Country) {
                                            //var Country_Id = document.getElementById(x).value;
                                            var Country_Id = Country;
                                            var cityOp = document.getElementById('cities');
                                            cityOp.disabled = false;
                                            $.ajax({
                                                url: '../ajax/get_city.php',
                                                method: 'post',
                                                data: {con: Country_Id},
                                                success: function (data) {
                                                    $('.loadcity').html(data);
                                                }
                                            });
                                        }
                                        function FunctionCat() {
                                            var y = document.getElementById("userChoice").value;
                                            alert(y);
                                            if (y == '1') {
                                                var CAT = document.getElementById('loadCat');
                                                CAT.style.display = "inline";
                                                alert('VIS');
                                            }
                                            if (y == 'N') {
                                                var CAT = document.getElementById('loadCat');
                                                CAT.style.display = "none";
                                            }
                                            if (y == '2') {
                                                var CAT = document.getElementById('loadCat');
                                                CAT.style.display = "none";
                                            }
                                        }

        </script>



    </body>

</html>
