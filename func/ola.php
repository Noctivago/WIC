<?php

require_once('../db/conn.inc.php'); 

// insert one row
/* @var $_REQUEST type */
//$user = FILTER_SANITIZE_STRING($_REQUEST['username']);
//$pass = FILTER_SANITIZE_STRING($_REQUEST['password']);
//$email = FILTER_SANITIZE_EMAIL($_REQUEST['email']);
$user = FILTER_SANITIZE_STRING('username');
$pass = FILTER_SANITIZE_STRING('password');
$email = FILTER_SANITIZE_EMAIL('email');

try {
    $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:user, :pass, :mail)");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
    echo "1";
} catch (Exception $ex) {
    //retorna 0 para no sucesso do ajax saber que foi um erro
    echo "0 ";
}