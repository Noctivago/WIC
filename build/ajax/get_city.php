<?php

require_once '../db/locations.php.php';
require_once '../db/functions.php';


$State_Id = (filter_var($_POST ['con']));
DB_getCityAsSelectByStateSelected($pdo, $State_Id);
