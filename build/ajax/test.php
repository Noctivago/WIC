<?php

include_once '../db/dbconn.php';

//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
$email = "paulo.cunha@esprominho.pt";
DB_getUsersTable($pdo);
echo '<br>' . DB_getRoleName($pdo, $email);

echo 'FUCK';
