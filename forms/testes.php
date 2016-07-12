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
        $orgServId = 2;
        echo 'GET IDs <br>';
        $orgUsers = DB_checkUserToStartChat($pdo, $orgServId);
        var_dump($orgUsers);
        echo 'Check Sub Cat > 1 <br>';
        $subCatId = 1;
        $subCat = DB_checkSubCategoryOwner($pdo, $orgId, $subCatId);
        var_dump($subCat);
        ?>

    </body>
</html>