<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';
require_once '../forms/session.php';


//GET MESSAGES

DB_getMyMessages($pdo, 82);
