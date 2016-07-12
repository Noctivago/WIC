<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
#session_start();
?>

<html>
    <head>
        <title> TESTES </title>
    </head>
    <body>

        <?php
        echo 'Welcome ' . $_SESSION['username'] . '<br>';
        $orgUsers = DB_checkUserToStartChat($pdo, $orgServId);
        var_dump($orgUsers);
        ?>

    </body>
</html>