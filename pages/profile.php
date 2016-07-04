<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
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
        echo '<br>';
        echo "<a href='../pages/logout.php'> Logout</a> ";
        ?>
    </body>
</html>