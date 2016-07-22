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
$d = getDateToDB();
$name = (filter_var($_POST ['name']));
$eventDate = (filter_var($_POST ['eDate']));
$wicId = (filter_var($_POST ['wicId']));

if (isset($name) && isset($eventDate)) {
//VERIFICAR SE EXISTE; SE SIM UPDATE
    if (isset($wicId)) {
        DB_updateWicPlanner($pdo, $wicId, $userId, $name, $eventDate);
    } else {
        DB_addWicPlanner($pdo, $name, $userId, $d, $eventDate);
    }
}