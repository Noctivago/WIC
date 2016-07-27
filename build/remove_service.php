<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';

$serviceId = (filter_var($_POST['Service']));
$UserBoss = $_SESSION['id'];
$val = DB_GetUserBossIdByService($pdo, $service_Id);
//SE ID DO USER FOR IGUAL AO DO BOSS DA ORG ENTAO PODE APAGAR
if ($val === $UserBoss) {
    //REMOVER > HEADER LOCATION PROFILE ORG
    DB_removeService($pdo, $serviceId);
    header("location: ../build/profile_org.php");
} else {
    //NAO E BOSS MANDA PASSEAR
    header("location: ../build/index.php");
}

