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
        //echo '<input list="cities" name="city">';
        //echo '<datalist id="cities">';
        DB_getCityOnSelect();
        //echo '</datalist>';
        #echo "Login Success";
        echo '<br>';
        echo "<a href='logout.php'> Logout</a> ";
        ?>
    </body>
</html>