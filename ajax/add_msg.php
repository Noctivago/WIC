<?php

require_once '../db/conn.inc.php';
require_once '../db/functions.php';


//ADD MESSAGES
//SEND MESSAGE ()
$message = (filter_var($_POST ['msg']));
$userId = 36;
$Conversation_Id = 82;
DB_sendMessage($pdo, $userId, $message, $Conversation_Id);
