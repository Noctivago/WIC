<?php
include_once '../db/dbconn.php';
include_once '../db/functions.php';
include_once '../db/session.php';

$invite = $_POST['ID'];
$resp = $_POST['resp'];
$userId = $_SESSION['id'];
$msg = DB_updateinvite($pdo, $resp, $invite, $userId);
