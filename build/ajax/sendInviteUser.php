<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$email = (filter_var($_POST['email']));
$serviceId = (filter_var($_POST['serv']));

// ver se existe alguma linha na bd com o id do user e id servico se exister update validation 0 
// se nao existir insere
//se o user nao existir enviar email e inserir no organization invites.
$userId = DB_checkUserByEmail($pdo, $email);
sql($pdo,"INSERT INTO [dbo].[User_Service]
           ([Service_Id]
           ,[User_Id]
           ,[Enabled]
           ,[Validate])
     VALUES
           (?
           ,?
           ,0
           ,0)", array($serviceId,$userId), "rows");
//if(DB_checkIfUserExists($pdo, $email)){
//    $id = DB_checkUserByEmail($pdo, $email);
//    echo $id;
//}  else {
//    echo 'eroroororor';
//    //insert organization invites
//}