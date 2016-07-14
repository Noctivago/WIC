<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';


//ADD MESSAGES
//SEND MESSAGE ()
$userId = 36;
$message = 'QUEIMADELA!';
$Conversation_Id = 82;
DB_sendMessage($pdo, $userId, $message, $Conversation_Id);
