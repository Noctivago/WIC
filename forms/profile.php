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
        echo "<a href='logout.php'> Logout</a> ";
        echo "<a href='main_page.php'> Main Page</a> ";
        ?>
        
    </body>
</html>