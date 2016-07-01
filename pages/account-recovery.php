<?php
include_once '../db/conn.inc.php';
?>

<html lang = "en">

    <head>
        <title>WIC - Account Recovery</title>
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
            p{
                text-align: right;
                color: #017572;
            }
        </style>
    </head>
    <body>
        <h2>Forgot your account's details?</h2> 
        <div class = "container form-signin">

        </div> <!-- /container -->
        <?php
        if (isset($_POST['recover']) && !empty($_POST['email'])) {
            $msg = '';
            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
            //SE EMAIL EXISTE
            if (DB_checkIfUserExists($pdo, $email)) {
                $password = generatePassword();
                DB_setUserPasword($pdo, $email, $password);
                $msg = $password;
                //ENVIA EMAIL
            } else {
                //SENAO INFORMA
                $msg = 'INCORRECT DATA. PLEASE TRY AGAIN!';
            }
        }
        ?>
        <div class = "container">

            <form class = "form-signin">
                <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                <input type = "email" class = "form-control" 
                       name = "email" placeholder = "EMAIL@EMAIL.COM" 
                       required autofocus></br>
                <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                        name = "recover">Send Recovery Email</button>
            </form>
        </div> 

    </body>
</html>