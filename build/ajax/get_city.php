<?php
include_once '../db/dbconn.php';
include_once '../db/functions.php';


$State_Id = (filter_var($_POST ['con']));
DB_getCityAsSelectByStateSelected($pdo, $State_Id);
