<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
ob_start();
session_start();

//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
print 'SESSION <br>';
print 'ID > ' . $_SESSION['id'] . '<br>';
var_dump($SESSION);
