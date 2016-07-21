<?php

include_once '../db/session.php';
require_once '../db/dbconn.php';
require_once '../db/functions.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
db_getMyWicPlannerToWICCrud($pdo, $_SESSION['id']);
db_getThirdWicPlannerToWICCrud($pdo, $_SESSION['id']);
