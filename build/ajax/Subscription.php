<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';

$orgId = (filter_var($_POST['org']));

sql($pdo,"INSERT INTO [dbo].[Organization_Subscription]
           ([Organization_Id]
           ,[Date_Start]
           ,[Date_Finish]
           ,[Enabled])
     VALUES
           (?,?,?,?)", array($orgId,'2016/04/03','2016/07/03',1));