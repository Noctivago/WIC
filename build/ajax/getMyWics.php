<?php

include_once '../db/session.php';
require_once '../db/dbconn.php';
require_once '../db/functions.php';

db_getMyWicPlannerToWICCrud($pdo, $_SESSION['id']);
db_getThirdWicPlannerToWICCrud($pdo, $_SESSION['id']);
