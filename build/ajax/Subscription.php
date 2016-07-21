<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$orgId = (filter_var($_POST['org']));
$d = getDateToDB();
$effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($d)));
echo $effectiveDate;
sql($pdo,"INSERT INTO [dbo].[Organization_Subscription]
           ([Organization_Id]
           ,[Date_Start]
           ,[Date_Finish]
           ,[Enabled])
     VALUES
           (?,?,?,?)", array($orgId,$d,$effectiveDate,1));
echo 'go';