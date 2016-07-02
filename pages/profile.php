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
        echo '<input type = "text" id = "default" list = "cities" placeholder = "e.g. JavaScript">';
        '<datalist id = "cities">';
        echo DB_getCityOnSelect($pdo);
        echo '</datalist>';
        echo '<br>';
        echo "<a href='logout.php'> Logout</a> ";
        ?>
    </body>
</html>