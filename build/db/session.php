<?php

include_once './dbconn.php';
ob_start();
session_start(); // Starting Session
//VERIFICA SE SESSION NAO EXISTE
if (!isset($_SESSION['id'])) {
    header('Location:../build/sign_in.php'); // Redirecting To Home Page
    //SE EXISTIR
} else {
    //FAZ GET DOS VALORES
    $sId = $_SESSION['id'];
    $sEmail = $_SESSION['email'];
    $s_pw = $_SESSION['password'];
    $s_role = $_SESSION['role'];

    //VERIFICA SE SESSION E TODOS OS SEUS DADOS SAO VALIDOS
    if (DB_validateUserSession($pdo, $sId, $sEmail, $s_pw, $s_role)) {

        //SENAO NAO FOREM VALIDOS
    } else {
        session_unset();
        session_destroy();
        header('Location:../build/sign_in.php'); // Redirecting To Home Page
    }
}