<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';

$WicPlannerId = (filter_var($_POST ['con']));
$userId = $_SESSION['id'];

//REMOVE WICPLANNER
DB_removeWICPlanner($pdo, $userId, $WicPlannerId);
