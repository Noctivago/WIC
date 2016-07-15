<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';
require_once '../forms/session.php';


//ADD MESSAGES
//SEND MESSAGE ()
$message = (filter_var($_POST ['msg']));
$userId = (filter_var($_POST ['usr']));
$Conversation_Id = (filter_var($_POST ['con']));
DB_sendMessage($pdo, $userId, $message, $Conversation_Id);
