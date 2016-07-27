<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';

$userId = $_SESSION['id'];
//var_dump($wicPlannerId);
db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId);
//FALTA WIC PLANNER ONDE SOU CONVIDADO


if (isset($_POST['rate']) && !empty($_POST['rate'])) {
    $rate = (filter_var($_POST ['rate']));
    $service = (filter_var($_POST ['service']));

    // check if user has already rated
    $sql = "SELECT `id` FROM `tbl_rating` WHERE `user_id`='" . $ipaddress . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['id'];
    } else {

        $sql = "INSERT INTO `tbl_rating` ( `rate`, `user_id`) VALUES ('" . $rate . "', '" . $ipaddress . "'); ";
        if (mysqli_query($conn, $sql)) {
            echo "0";
        }
    }
}