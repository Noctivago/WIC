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

<html lang = "en">

    <head>
        <title>WIC - Login Page</title>
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
            if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                try {
                    $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                    #echo 'USERNAME ' . $rows['Username'];
                    $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                    $hashPassword = hash('whirlpool', $password);
                    $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
                    #echo 'USER ' . $rows['Username'];
                    $msg = '';
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
                            header('Location: profile.php');
                        } else {
                            $msg = 'Wrong username or password';
                        }
                    }
                } catch (Exception $ex) {
                    echo "ERROR!";
                }
            }
            ?>
        </div> <!-- /container -->

        <div class = "container">

            <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                <input type = "email" class = "form-control" 
                       name = "email" placeholder = "youremail@email.com" 
                       required autofocus></br>
                <input type = "password" class = "form-control"
                       name = "password" placeholder = "password" required>
                <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                        name = "login">Login</button>
                <!-- RECUPERAR USER + PASS FACULTANDO EMAIL -->
                <p></p>
                
            </form>
        </div> 

    </body>
</html>