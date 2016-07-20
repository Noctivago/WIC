<?php

require_once '../db/dbconn.php';
require_once '../db/functions.php';


$WicPlannerId = (filter_var($_POST ['con']));
$userId = $SESSION['id'];

//REMOVE WICPLANNER
DB_getCityAsSelectByStateSelected($pdo, $State_Id);
