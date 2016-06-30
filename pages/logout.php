<?php
session_start();
unset($_SESSION['username']);
//unset($_SESSION["password"]);
unset($_SESSION['id']);
#echo 'You have cleaned session';
header('Refresh: 2; URL = login.php');
?>

<html lang = "en">

    <head>
        <title>WIC</title>
        <link href = "../assets/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #ADABAB;
            }
            h2{
                text-align: center;
                color: #017572;
            }
            h1{
                text-align: center;
                color: #017572;
            }
        </style>
    </head>
    <body>
        <h2>LOGOUT</h2> 
        <h1>Hope to see you again!</h1>
        <div class = "container form-signin">
        </div> <!-- /container -->
        <div class = "container">

            <!--Click here to clean <a href = "logout.php" tite = "Logout">Session-->

        </div> 

    </body>
</html>
