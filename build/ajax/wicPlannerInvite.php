<?php
include_once '../db/dbconn.php';
include_once '../db/functions.php';
include_once '../db/session.php';

$idWicInvite = $_POST['Id'];
$resp = $_POST['resp'];

$msg = DB_updateWicinvite($pdo, $resp, $idWicInvite);
