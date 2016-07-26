<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
print 'SESSION INFO <br>';
print 'ID > ' . $_SESSION['id'] . '<br>';
var_dump($_SESSION);
DB_getUsersTable($pdo);
echo '<br>';
DB_getMultimediaTable($pdo);
echo '<br>';
DB_getUserProfileTable($pdo);
