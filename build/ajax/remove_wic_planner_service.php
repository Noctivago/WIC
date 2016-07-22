<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';

$WicPlannerId = (filter_var($_POST ['con']));
$serviceId = (filter_var($_POST ['conId']));

//REMOVE WICPLANNER
DB_removeWICPlanner($pdo, $userId, $WicPlannerId);
