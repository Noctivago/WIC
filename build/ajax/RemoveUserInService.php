<?php
include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$idUserInService = (filter_var($_POST['id']));

DB_removeUserInService($pdo,$idUserInService);