<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';

$wicPlannerId = (filter_var($_POST ['con']));
$userId = $_SESSION['id'];
//var_dump($wicPlannerId);
db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId);

