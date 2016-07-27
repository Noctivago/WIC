<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$userId = $_SESSION['id'];

if (isset($_POST['rate']) && !empty($_POST['rate'])) {
    $rate = (filter_var($_POST ['rate']));
    $serviceId = (filter_var($_POST ['service']));
    $d = getDateToDB();
    echo DB_addUserRateService($pdo, $userId, $serviceId, $rate, $d);
}