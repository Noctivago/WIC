<?php

include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';

$serviceId = (filter_var($_POST['sId']));
$UserBoss = $_SESSION['id'];
//echo 'BOSS >' . $UserBoss . '<br>';
$val = DB_GetUserBossIdByService($pdo, $serviceId);
//echo 'KeyBD >' . $val;
//SE ID DO USER FOR IGUAL AO DO BOSS DA ORG ENTAO PODE APAGAR
if ($val === $UserBoss) {
    //REMOVER > HEADER LOCATION PROFILE ORG
    DB_removeService($pdo, $serviceId);
    $org = DB_GetOrgIdByUserBossId($pdo, $UserBoss);
    //header('location: profile_org.php?Organization=' . $org);
} else {
    //NAO E BOSS MANDA PASSEAR
    //header('location: index.php');
}
