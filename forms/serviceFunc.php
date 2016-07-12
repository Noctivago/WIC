<?php

include_once '../db/conn.inc.php';
include_once '../forms/session.php';


$arg = (filter_var($_POST ['arg']));

if ($arg === 'add2Wic') {
    try {
        $wicPlannerId = (filter_var($_POST ['wicPlannerId']));
        $orgServId = (filter_var($_POST ['orgServId']));
        echo DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId);
    } catch (Exception $ex) {
        echo 'ERRO ADDING SERVICE TO WIC';
    }
}
//if ($arg === 'addCommentToService') {
//    try {
//        $userId = (filter_var($_POST ['userId']));
//        $comment = (filter_var($_POST ['comment']));
//        $orgServId = (filter_var($_POST ['org']));
//        $d = (filter_var($_POST ['date']));
//        echo DB_addCommentOnService($pdo, $userId, $comment, $orgServId, $d);
//    } catch (Exception $ex) {
//        echo 'ERRO ADDING YOUR COMMENT';
//    }
//}
if ($arg === 'addToConversation') {
    try {
        $userId = (filter_var($_POST ['userId']));
        $orgServId = (filter_var($_POST ['org']));
        echo DB_getUserToStartChat($pdo, $orgServId, $userId);
    } catch (Exception $ex) {
        echo 'ERRO ADDING CONVERSATION';
    }
}