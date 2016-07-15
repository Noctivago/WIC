<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';
require_once '../forms/session.php';


//GET MESSAGES
//GRAB CONVERSATION ID
$userId = (filter_var($_POST ['usrId']));
DB_getMyWICPlanners($pdo, $userId);
