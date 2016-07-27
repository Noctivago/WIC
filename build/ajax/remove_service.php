<?php

include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';

$serviceId = (filter_var($_POST ['sId']));
$UserBoss = $_SESSION['id'];

$val = DB_GetUserBossIdByService($pdo, $serviceId);

//SE ID DO USER FOR IGUAL AO DO BOSS DA ORG ENTAO PODE APAGAR
if ($val === $UserBoss) {
    DB_removeService($pdo, $serviceId);
} 

