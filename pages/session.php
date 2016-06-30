<?php

include_once '../db/conn.inc.php../';
session_start(); // Starting Session

if (!isset($_SESSION['username'])) {
    #$pdo = null;
    header('Location: login.php'); // Redirecting To Home Page
} else {
    //Storing Session
    $userId = $_SESSION['id'];
    $userUsername = $_SESSION['username'];
//Query To Fetch Complete Information Of User
    $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Username] = ? AND [Id] = ?", array($userUsername, $userId), "rows");
    foreach ($rows as $row) {
        if ($row['Username'] == $userUsername) {
            if (!isset($_SESSION['username'])) {
                #$pdo = null;
                header('Location: login.php'); // Redirecting To Home Page
            } else {
                
            }
        }
    }
}



