<?php

include_once '../db/conn.inc.php';

//VERIFICAR SE TEM PERMISSOES

$arg = (filter_var($_POST ['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addRole') {
    $role = (filter_var($_POST ['role'], FILTER_SANITIZE_STRING));
    try {
        sql($pdo, "INSERT INTO [dbo].[Role] ([Name], [Enabled]) VALUES (?, ?)", array($role, '1'));
        #echo 'USER ' . $role . ' ADDED!';
    } catch (Exception $ex) {
        echo "ERROR!";
    }
} else if ($arg === 'readAllRole') {
//    try {
//        //$id = 0;
//        $rows = sql($pdo, "SELECT * FROM [dbo].[Role] WHERE [id] > ?", array('0'), "rows");
//        echo "<table><tr><th>ID</th><th>Name</th><th>Enabled?</th></tr>";
//        foreach ($rows as $row) {
//            echo "<tr>";
//            echo "<td>" . $row['id'] . "</td>";
//            echo "<td>" . $row['Name'] . "</td>";
//            echo "<td>" . $row['Enabled'] . "</td>";
//            echo "<tr>";
//        }
//        echo "</table>";
//    } catch (Exception $exc) {
//        echo 'ERROR READING ROLES';
//    }
    try {
        $id = 0;
        //PARA CONTAR -> count
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Id] > ?", array($id), "rows");
        echo "<table><tr><th>ID</th><th>ACCOUNT ENABLED?</th><th>ACTIVATION CODE</th><th>FAILED</th><th>Username</th><th>Password</th><th>Email</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Account_Enabled'] . "</td>";
            echo "<td>" . $row['User_Code_Activation'] . "</td>";
            echo "<td>" . $row['Login_Failed'] . "</td>";
            echo "<td>" . $row['Username'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo '';
    }
} else if ($arg === 'readAllPermission') {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Permission] WHERE [Id] > ?", array('0'), "rows");
        echo "<table><tr><th>ID</th><th>Name</th><th>Enabled?</th><th>Organization?</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Enabled'] . "</td>";
            echo "<td>" . $row['Organization'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING PERMISSIONS';
    }
} else if ($arg === 'addPermission') {
    $permission = (filter_var($_POST ['permission'], FILTER_SANITIZE_STRING));
    $permissionOrg = (filter_var($_POST ['permissionOrg'], FILTER_SANITIZE_STRING));
    if ($permissionOrg == '1') {
        $p = '1';
    } else {
        $p = '0';
    }
    try {
        sql($pdo, "INSERT INTO [dbo].[Permission] ([Name], [Enabled], [Organization]) VALUES (?, ?, ?)", array($permission, '1', $p));
        #echo 'USER ' . $role . ' ADDED!';
    } catch (Exception $ex) {
        echo "ERROR!";
    }
} else {
    echo "IF -> ELSE -> ERROR!";
}
