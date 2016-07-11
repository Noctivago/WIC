<?php

include_once '../db/conn.inc.php';
include_once '../forms/session.php';


$arg = (filter_var($_POST ['arg']));

if ($arg === 'add2Wic') {
    try {
        $wicPlannerId = (filter_var($_POST ['wic']));
        $orgServId = (filter_var($_POST ['org']));
        echo DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId);
    } catch (Exception $ex) {
        echo 'ERRO';
    }
}