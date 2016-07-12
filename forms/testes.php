<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
#session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
        if (isset($subCat)) {
            echo 'TEM VALOR';
        } else {
            echo 'ESTA A NULL <br>';
            var_dump($subCat);
        }

        $catId = 1;
        echo '<br>Check Cat > 1 <br>';
        $cat = DB_checkCategoryOwner($pdo, $orgId, $catId);
        var_dump($cat);
        echo '<br>OrgID > 19 <br>';
        $userOrg = DB_checkOrgOwner($pdo, $orgId);
        var_dump($userOrg);
        echo '<br> FINAL TEST<br>';
        $userId = $_SESSION['id'];
        $x = DB_getUserToStartChat($pdo, $orgServId, $userId);
        var_dump($x);
        echo $x;
        #echo '<br>ADDING CONVERSATION<br>';
        #$d = getDateToDB();
        #$orgServ = 2;
        #$userClient = $userId;
        #echo 'CLIENT > ' . $userClient . ' USER ORG > ' . $userOrg . ' DATE > ' . $d .'<br>';
        #echo DB_addConversation($pdo, $userClient, $userOrg, $d, $orgServ);
        ?>

    </body>
</html>