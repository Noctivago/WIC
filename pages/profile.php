<?php
//
#include('session.php');
#session_start();
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <title>Your Home Page</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="profile">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['username']; ?></i></b>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
    </body>
</html>-->


<?php session_start(); ?>

<html>
    <head>
        <title> Home </title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['username'])) { // If session is not set that redirect to Login Page                            {
            header("Location:Login.php");
        } else {
            echo $_SESSION['username'];
            echo "Login Success";
            echo "<a href='logout.php'> Logout</a> ";
        }
        ?>
    </body>
</html>