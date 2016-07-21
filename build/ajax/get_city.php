<?php
include_once '../db/session.php';
require_once '../db/dbconn.php';
require_once '../db/functions.php';


$State_Id = (filter_var($_POST ['con']));
DB_getCityAsSelectByStateSelected($pdo, $State_Id);
