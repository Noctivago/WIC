<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';

$userId = $_SESSION['id'];

if (isset($_POST['rate']) && !empty($_POST['rate'])) {
    $rate = (filter_var($_POST ['rate']));
    $serviceId = (filter_var($_POST ['service']));

    DB_addUserRateService($pdo, $userId, $serviceId, $rate);
}