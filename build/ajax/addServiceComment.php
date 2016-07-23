<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
//print 'SESSION INFO <br>';
//print 'ID > ' . $_SESSION['id'] . '<br>';
//var_dump($_SESSION);
$userId = $_SESSION['id'];
$Comment = (filter_var($_POST ['comment']));
$ServiceId = (filter_var($_POST ['sId']));

if (isset($comment) && isset($serviceId)) {
 DB_addCommentsToService($pdo, $userId, $Comment, $ServiceId);
} else {
    return 'Empty!';
}