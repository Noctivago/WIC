<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../db/dbconn.php';
//FUNCA X) NA QUERY VERIFICAR SE O USER PERTENCE A ESTE WIC PLANNER; SE SIM MOSTRA
//$wicPlannerId = INPUT_GET($_GET["id"]);
$wicPlannerId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$userId = filter_input(INPUT_GET, 'uId', FILTER_SANITIZE_NUMBER_INT);
//var_dump($wicPlannerId);
return db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId);

