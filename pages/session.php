<?php

include_once '../db/conn.inc.php../';
session_start(); // Starting Session

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirecting To Home Page
} else {
    //ADICIONAR PASSWORD
    $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Username] = ? AND [Id] = ?", array($_SESSION['username'], $_SESSION['id']), "rows");
    foreach ($rows as $row) {
        if ($row['Username'] == $_SESSION['username']) {
            
        } else {
            
        }
    }
}


