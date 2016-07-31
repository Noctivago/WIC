<?php

require_once '../db/dbconn.php';
include_once '../db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$MultimediaId = (filter_var($_POST ['con']));
//IF IS SET < MISSING


//REMOVE SERVICE PICTURES
DB_deleteServiceSecondaryPagePic($pdo, $MultimediaId);