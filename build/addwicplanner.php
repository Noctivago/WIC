<!DOCTYPE html>
<?php
//include_once 'includes/head_sideMenu.php';
//include_once '../build/db/functions.php';
//include_once '../build/db/dbconn.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
//include_once './db/session.php';
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$uid = filter_input(INPUT_GET, "uid", FILTER_VALIDATE_INT);
if (isset($id)) {
    $wicId = $id;
    $userId = $uid;
    $msg = 'WID >' . $wicId . ' UID > ' . $userId;
//    $wicInfo = array();
//    $wicInfo = DB_getWicPlannerInfo($pdo, $wicId, $userId);
}
?>
<!--<body>-->

<link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
<!--    <div class="page-center">
        <div class="page-center-in">-->
<div class="container-fluid">
    <!--DIV ESTAVA COMO FORM-->
    <div class="sign-box">
        <div class="sign-avatar no-photo">&plus;</div>
        <header class="sign-title">#Wic Planner</header>
        <div class="form-group">
            <!--<input type="text" id = "name" value="<?= $wicInfo["Name"] ?>" class="form-control" placeholder="Event Name" required/>-->
            <input type="text" id = "name" class="form-control" placeholder="Event Name" required/>
        </div>
        <div class='input-group date'>
            <!--<input id="daterange3" type="text" value="<?= $wicInfo["Event_Date"] ?>" class="form-control" required>-->
            <input id="daterange3" type="text" value="01-08-2016" class="form-control" required>
            <span class="input-group-addon">
                <i class="font-icon font-icon-calend"></i>
            </span>
        </div>
        <?= $msg; ?>
        <span id="textelement" class="form-control" style="border:0px"></span>
        <button onclick="addWic();" name="signup" class="btn btn-rounded btn-success sign-up">Save</button>
    </div>
</div>

