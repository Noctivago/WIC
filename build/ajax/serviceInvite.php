<?php

include_once '../db/dbconn.php';
include_once '../db/functions.php';

$invite = $_POST['invite'];
$resp = $_POST['resp'];
$userId = $_SESSION['id'];
echo $userId ."  ". $resp . "  ". $invite;
if($resp == 0){
    sql($pdo,"UPDATE [dbo].[User_Service]
   SET [Enabled] = 0
      ,[Validate] = 1
 WHERE [Id] = ? and [User_Id] = ?", array($invite,$userId));
}else{
sql($pdo,"UPDATE [dbo].[User_Service]
   SET [Enabled] = 1
      ,[Validate] = 1
 WHERE [Id] = ? and [User_Id] = ?", array($invite,$userId));
    
 
}