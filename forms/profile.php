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
        echo "<a href='addOrganization.php'> AddOrg</a> ";
        echo '<br>';
        echo "<a href='addOrganizationService.php'> AddOrgService</a> ";
        echo '<br>';
        echo "<a href='addOrganizationServiceBook.php'> AddOrgServiceBook</a> ";
        echo '<br>';
        echo "<a href='addNewsletterPlataform.php'> addNewsletterPlataform</a> ";
        echo '<br>';
        echo "<a href='addWicPlanner.php'> addWicPlanner</a> ";
        echo '<br>';
        echo "<a href='addPicture.php'> addPicture</a> ";
        echo '<br>';
        echo "<a href='searchService.php'> searchService</a> ";
        echo '<br>';
        echo "<a href='logout.php'> Logout</a> ";
        ?>
        
    </body>
</html>