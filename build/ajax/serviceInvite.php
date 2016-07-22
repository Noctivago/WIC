<?php

include_once '../db/dbconn.php';
include_once '../db/functions.php';

$invite = $_POST['invite'];
$resp = $_POST['resp'];
$userId = $_SESSION['id'];
echo $userId ."  ". $resp . "  ". $invite;
DB_updateinvite($pdo, $resp, $invite, $userId);
