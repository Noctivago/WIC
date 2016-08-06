<!DOCTYPE html>
<?php
//include_once 'includes/head_sideMenu.php';
//include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//include_once './db/session.php';
$msg = '';
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$uid = filter_input(INPUT_GET, "uid", FILTER_VALIDATE_INT);
if (isset($id) && isset($uid)) {
    $wicId = $id;
    $userId = $uid;
    $msg = 'WID >' . $wicId . ' UID > ' . $userId;
    $wicInfo = array();
    $wicInfo = DB_getWicPlannerInfo($pdo, $wicId, $userId);
} else {
    $wicId = 0;
    $wicInfo["Name"] = '';
    $wicInfo["Event_Date"] = '01-08-2016';
//    $wicInfo["Event_Date"] = '2016/08/01';
}
?>
<!--<body>-->

<link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
<!--    <div class="page-center">
        <div class="page-center-in">-->
<div class="container-fluid">

    <!--DIV ESTAVA COMO FORM-->
    <div class="sign-box">
        <?php
        if (isset($id)) {
            echo '<div class="title-label" style="align:center;"> <h3 style="padding-left: 60px; color: #3299CC;"><i class="font-icon font-icon-plus "></i>&ensp;Edit Event</h3></div>';
        } else {
            echo '<div class="title-label" style="align:center;"> <h3 style="padding-left: 60px; color: #3299CC;"><i class="font-icon font-icon-plus "></i>&ensp;New Event</h3></div>';
        }
        ?>
        <header class="sign-title">#youcanevent</header>
        <div class="form-group">
            <input type="text" id = "Xname" name ="Xname" value="<?= $wicInfo["Name"] ?>" class="form-control" placeholder="Wic Planner Name"/>
            <input type="text" id="name" value="<?= $wicInfo["Name"] ?>" class="form-control" placeholder="Event Name"/>
        </div>
        <div class='input-group date'>
            <input id="daterange3" type="text" value="<?= $wicInfo["Event_Date"] ?>" class="form-control">
            <span class="input-group-addon">
                <i class="font-icon font-icon-calend"></i>
            </span>
        </div>
        <span id="textelement" class="form-control" style="border:0px"></span>
        <button  onclick="addWic(<?= $wicId; ?>);" name="signup" class="btn btn-rounded btn-success sign-up">Save</button>
    </div>
</div>



<script src="js/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
<script src="js/lib/clockpicker/bootstrap-clockpicker-init.js"></script>
<script src="js/lib/daterangepicker/daterangepicker.js"></script>
<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>


<script>
            $(function () {
                function cb(start, end) {
                    $('#reportrange span').html(start.format('YYYY, MMMM D') + ' - ' + end.format('YYYY, MMMM D'));
                }
                cb(moment().subtract(29, 'days'), moment());

                $('#daterange').daterangepicker({
                    "timePicker": true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    "linkedCalendars": false,
                    "autoUpdateInput": false,
                    "alwaysShowCalendars": true,
                    "showWeekNumbers": true,
                    "showDropdowns": true,
                    "showISOWeekNumbers": true
                });

                $('#daterange2').daterangepicker();

                $('#daterange3').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                });

                $('#daterange').on('show.daterangepicker', function (ev, picker) {
//				$('.daterangepicker select').selectpicker({
//					size: 10
//				});
                });
            });
</script>


