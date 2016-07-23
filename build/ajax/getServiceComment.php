<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
//print 'SESSION INFO <br>';
//print 'ID > ' . $_SESSION['id'] . '<br>';
//var_dump($_SESSION);
$ServiceId = (filter_var($_POST ['sId']));

DB_getServiceCommentFromUsers($pdo, $ServiceId);