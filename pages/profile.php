<?php
//
include_once ('session.php');
#include_once ('../db/conn.inc.php');
#session_start();
?>

<html>
    <head>
        <title> Home </title>
    </head>
    <body>

        <?php
        echo 'Welcome ' . $_SESSION['username'] . '<br>';
        echo 'Profile ' . '<br>';
        echo '<br>';
        echo DB_getCityOnSelect();
        #echo "Login Success";
        echo "<a href='logout.php'> Logout</a> ";
        ?>
    </body>
</html>