<?php

require_once '../db/dbconn.php';
require_once '../db/functions.php';


$Country_Id = (filter_var($_POST ['con']));
DB_getStateAsSelectByCountrySelected($pdo, $Country_Id);
