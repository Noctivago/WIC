<?php
include_once '../db/dbconn.php';
include_once '../db/session.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
//print 'SESSION INFO <br>';
//print 'ID > ' . $_SESSION['id'] . '<br>';
//var_dump($_SESSION);
$userId = $_SESSION['id'];
$wicPlannerId = (filter_var($_GET ['id']));
//DB_getMyWicsAsPopup($pdo, $userId);
?>
<div class="sign-box">
    <div class="sign-avatar no-photo">&plus;</div>
    <header class="sign-title">#Add Service to WiC Planner?</header>
    <div class="form-group">
        <?= DB_getMyWicsAsPopup($pdo, $userId); ?>
    </div>
    <span id="textelement" class="form-control" style="border:0px"></span>
    <button onclick="alert('OK');" name="add2WiC" class="btn btn-rounded btn-success sign-up">Save</button>
</div>

