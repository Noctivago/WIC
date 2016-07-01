<?php
include_once '../db/conn.inc.php';
?>

<html lang = "en">

    <head>
        <title>WIC - Account Confirmation</title>
        <link href = "../assets/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #ADABAB;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                color: #017572;
            }

            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                border-color:#017572;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-color:#017572;
            }

            h2{
                text-align: center;
                color: #017572;
            }
            h3{
                text-align: center;
                color: #017572;
            }
            href{
                text-align: right;
                color: #017572;
            }
        </style>
    </head>
    <body>
        <h2>ACCOUNT ACTIVATION</h2> 
        <h3>PLACE THE CODE SENT TO YOU BY EMAIL IN THE FIELD BELOW</h3> 
        <div class = "container form-signin">
            <?php
            if (isset($_POST['activate']) && !empty($_POST['activateText']) && !empty($_POST['email'])) {
                $msg = '';
                $forgotPassword = '';
                $code = (filter_var($_POST ['activateText'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                //SE EMAIL EXISTE
                if (DB_checkIfUserExists($pdo, $email)) {
                    //VERIFICA SE O ACTIVATION CODE PERTENCE AO EMAIL
                    if (DB_compareActivationCode($pdo, $email, $code)) {
                        //SE TRUE ATIVA CONTA
                        if (DB_activateUserAccount($pdo, $email)) {
                            header('Location: login.php');
                            $msg = 'ACCOUNT SUCESSUFULY ACTIVATED';
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
        </div> <!-- /container -->

        <div class = "container">

            <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                <input type = "text" class = "form-control" 
                       name = "activateText" placeholder = "place activation code here" 
                       required autofocus></br>
                <input type = "email" class = "form-control" 
                       name = "email" placeholder = "youremail@email.com" 
                       required autofocus></br>
                <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                        name = "activate">Activate Account</button>
                <!-- RECUPERAR USER + PASS FACULTANDO EMAIL -->
                <h2><?php echo $forgotPassword; ?></h2>
            </form>
        </div> 

    </body>
</html>