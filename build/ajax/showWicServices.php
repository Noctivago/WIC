<?php

include_once '../db/session.php';
require_once '../db/dbconn.php';
require_once '../db/functions.php';

$wicPlannerId = (filter_var($_POST ['con']));
$userId = $_SESSION['id'];
//var_dump($wicPlannerId);
echo db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId);

