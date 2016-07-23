<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$email = (filter_var($_POST['email']));
$serviceId = (filter_var($_POST['serv']));


$userId = DB_checkUserByEmail($pdo, $email);
if(DB_checkIfUserExists($pdo, $email)){
    if(DB_checkIfUserInService($pdo,$userId,$serviceId)){
        sql($pdo,"UPDATE [dbo].[User_Service]
   SET [Enabled] = 0
      ,[Validate] = 0
     where [User_Id] = ? and [Service_Id] = ?",array($userId,$serviceId));
    }else{
    sql($pdo,"INSERT INTO [dbo].[User_Service]
           ([Service_Id]
           ,[User_Id]
           ,[Enabled]
           ,[Validate])
     VALUES
           (?
           ,?
           ,0
    ,0)", array($serviceId,$userId));
    
    }
}else{
    
    sql($pdo,"INSERT INTO [dbo].[Organization_Invites]
           ([Email]
           ,[Enabled]
           ,[Service_Id])
     VALUES
           (?
           ,0
           ,?)",array($email,$serviceId));
}

