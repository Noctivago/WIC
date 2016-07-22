<?php

include_once '../db/dbconn.php';
include_once '../db/functions.php';

$invite = (filter_var($_POST['invite']));
$resp = (filter_var($_POST['resp']));
$userId = $_SESSION['id'];
if($resp ===0){
    sql($pdo,"", array(0,1,$userId,$invite), $return);
}else{
    sql($pdo, $q, $params, $return);
}