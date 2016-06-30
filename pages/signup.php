<?php
//include_once '../db/conn.inc.php';
include_once '../db/functions.php';
?>

<html lang = "en">

    <head>
        <title>WIC - SignUp Page</title>
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
            href{
                text-align: right;
                color: #017572;
            }
        </style>
    </head>
    <body>
        <h2>LOGIN</h2> 
        <div class = "container form-signin">
            <?php
            if (isset($_POST['signup']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                $msg = '';
                $forgotPassword = '';
                $username = (filter_var($_POST ['username'], FILTER_SANITIZE_STRING));
                $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                #echo 'USERNAME ' . $rows['Username'];
                $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                $hashPassword = hash('whirlpool', $password);

                if (checkIfUserExists($pdo, $email)) {
                    $msg = 'EMAIL [' . $email . '] ALREADY REGISTED!';
                    $forgotPassword = '<a href=account-recovery.php>Forgot your account details?</a>';
                } else {
                    try {
                        $l = '128';
                        $code = generateActivationCode($pdo, $l);
                        sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email], [Account_Enabled], [User_Code_Activation]) VALUES (?, ?, ?, ?)", array($username, $hashPassword, $email, '0', $code));
                        $msg = 'USER ' . $username . ' ADDED!';
                        header('Location: account-confirmation.php');
                    } catch (Exception $ex) {
                        echo "ERROR!";
                    }
                }
            }
            ?>
        </div> <!-- /container -->

        <div class = "container">

            <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                <input type = "text" class = "form-control" 
                       name = "username" placeholder = "username" 
                       required autofocus></br>
                <input type = "password" class = "form-control"
                       name = "password" placeholder = "password" required>
                <input type = "email" class = "form-control"
                       name = "email" placeholder = "youremail@email.com" required>
                <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                        name = "signup">Sign Up</button>
                <!-- RECUPERAR USER + PASS FACULTANDO EMAIL -->
                <h2><?php echo $forgotPassword; ?></h2>
            </form>
        </div> 

    </body>
</html>