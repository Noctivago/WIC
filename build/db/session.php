<?php

include_once './dbconn.php';
session_start(); // Starting Session
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
if (!isset($_SESSION['id'])) {
    header('Location:../build/sign_in.php'); // Redirecting To Home Page
} else {

    $sId = $_SESSION['id'];
    $sEmail = $_SESSION['email'];
    $s_pw = $_SESSION['password'];
    $s_role = $_SESSION['role'];

//SE TUDO OK C/ A SESSION
    if (DB_validateUserSession($pdo, $sId, $sEmail, $s_pw, $s_role)) {

//SENAO    
    } else {
        session_destroy();
        header('Location:../build/sign_in.php'); // Redirecting To Home Page
    }
}