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
        $orgId = 19;
        echo 'GET IDs <br>';
        $orgUsers = DB_checkUserToStartChat($pdo, $orgServId);
        var_dump($orgUsers);
        echo '<br>Check Sub Cat > 1 <br>';
        $subCatId = 1;
        $subCat = DB_checkSubCategoryOwner($pdo, $orgId, $subCatId);
        var_dump($subCat);
        $catId = 1;
        echo '<br>Check Cat > 1 <br>';
        $cat = DB_checkCategoryOwner($pdo, $orgId, $catId);
        var_dump($cat);
        echo '<br>OrgID > 19 <br>';
        $userOrg = DB_checkOrgOwner($pdo, $orgId);
        var_dump($userOrg);
        ?>

    </body>
</html>