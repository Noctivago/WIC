<?php

//
include_once ('session.php');
include_once './db/conn.inc.php';

$arg = (filter_var($_POST ['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addUserProfile') {
    $username = (filter_var($_POST ['username'], FILTER_SANITIZE_STRING));
    $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
    $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
    $hashPassword = hash('whirlpool', $password);
    if (DB_checkIfUserExists($pdo, $email)) {
        echo 'EMAIL [' . $email . '] ALREADY REGISTED!';
    } else {
        try {
            sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (?, ?, ?)", array($username, $hashPassword, $email));
            echo 'USER ' . $username . ' ADDED!';
        } catch (Exception $ex) {
            echo "ERROR!";
        }
    }
} else if ($arg === 'readUserProfile') {
    
} else if ($arg === 'updateUserProfile') {
    
} else if ($arg === 'deleteUserProfile') {
    try {
        $id = 122;
        sql($pdo, "DELETE FROM [dbo].[User] WHERE [Id] = ?", array($id));
        echo 'User deleted!';
    } catch (Exception $exc) {
        echo '';
    }
} 
