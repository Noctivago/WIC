<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';


//GET MESSAGES
//GRAB CONVERSATION ID
$Country_Id = (filter_var($_POST ['con']));
DB_getCityAsSelectByCountrySelected($pdo, $Country_Id);
