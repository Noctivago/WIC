<?php

include_once './dbconn.php';
session_start(); // Starting Session

if (!isset($_SESSION['email'])) {
    header('Location:../sign_in.php'); // Redirecting To Home Page
}

$sId = $_SESSION['id'];
$sEmail = $_SESSION['email'];
$s_pw = $_SESSION['password'];
$s_role = $_SESSION['role'];

//SE TUDO OK C/ A SESSION
if (DB_validateUserSession($pdo, $sId, $sEmail, $s_pw, $s_role)) {

//SENAO    
} else {
    session_destroy();
    header('Location:../sign_in.php'); // Redirecting To Home Page
}
