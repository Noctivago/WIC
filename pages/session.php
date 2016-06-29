<?php

include_once '../db/conn.inc.php../';
session_start(); // Starting Session
//Storing Session
$userId = $_SESSION['Id'];
$userUsername = $_SESSION['Username'];
//Query To Fetch Complete Information Of User
$user = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Username] = ? and [Id] = ?", array($userUsername, $userId), "rows");
$login_session = $user['Username'];
if (!isset($login_session)) {
    $pdo = null;
    header('Location: login.php'); // Redirecting To Home Page
}