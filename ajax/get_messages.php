<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';
require_once '../forms/session.php';


//GET MESSAGES
//GRAB CONVERSATION ID
$Conversation_Id = (filter_var($_POST ['con']));
DB_getMyMessages($pdo, $Conversation_Id);
