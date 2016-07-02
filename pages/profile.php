<?php
//
include_once ('session.php');
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
#echo "Login Success";
        echo "<a href='logout.php'> Logout</a> ";
        ?>
    </body>
</html>