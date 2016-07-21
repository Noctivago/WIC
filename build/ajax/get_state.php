<?php
include_once '../db/session.php';
include_once '../db/dbconn.php';
include_once '../db/functions.php';


$Country_Id = (filter_var($_POST ['con']));
DB_getStateAsSelectByCountrySelected($pdo, $Country_Id);
