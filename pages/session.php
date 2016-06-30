<?php

include_once '../db/conn.inc.php../';
session_start(); // Starting Session
//Storing Session
$userId = $_SESSION['id'];
$userUsername = $_SESSION['username'];
//Query To Fetch Complete Information Of User
$user = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Username] = ? and [Id] = ?", array($userUsername, $userId), "rows");
foreach ($rows as $row) {
    if ($_SESSION['username'] == $row['Username']) {
        if (!isset($_SESSION['username'])) {
            #$pdo = null;
            header('Location: login.php'); // Redirecting To Home Page
        } else {
            
        }
    }
}
