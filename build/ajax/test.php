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
echo '<br>';
echo filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
echo '<br>';
echo __DIR__;
echo '<br>';
echo '<a href="' . filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/build/index.php">TESTE</a>';