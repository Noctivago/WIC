<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$role = (filter_var($_POST['role']));
$idUserInService = (filter_var($_POST['id']));
$userId = $_SESSION['id'];
echo $userId;
Db_UpdateRoleInService($pdo,$role,$idUserInService);