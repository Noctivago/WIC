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
    echo DB_getRoles($pdo);
} else if ($arg === 'readAllPermission') {
    echo DB_getPermissions($pdo);
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
