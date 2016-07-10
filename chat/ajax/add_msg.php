<?php
session_start();

if (isset($_POST['msg'])) {
  require_once '../db/FbChatMock.php';
  
  $userId = (int) $_SESSION['user_id'];
  // Escape the message string
  $msg = htmlentities($_POST['msg'],  ENT_NOQUOTES);
  
  $chat = new FbChatMock();
  $result = $chat->addMessage($userId, $msg);
}
