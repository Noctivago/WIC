<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
print 'SESSION INFO <br>';
print 'ID > ' . $_SESSION['id'] . '<br>';
var_dump($_SESSION);
//echo DB_getRatingTable($pdo);
//echo '<br>';
//DB_getUsersTable($pdo);
//echo '<br>';
DB_getMultimediaTable($pdo);
echo '<br>';
//DB_getUserProfileTable($pdo);
//echo '<br>';
//echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo '<br>';
$EM = "paulo.cunha@esprominho.com";
$AC = '14551ASDF';
//echo 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $EM . '&AC=' . $AC . '';
