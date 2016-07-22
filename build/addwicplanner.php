<!DOCTYPE html>
<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (isset($id)) {
    $msg = 'ID >' . $id;
}
?>
<body>
    <link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
    <!--    <div class="page-center">
            <div class="page-center-in">-->
    <div class="container-fluid">
        <!--DIV ESTAVA COMO FORM-->
        <div class="sign-box">
            <div class="sign-avatar no-photo">&plus;</div>
            <header class="sign-title">#Wic Planner</header>
            <div class="form-group">
                <input type="text" id = "name" name ="name" class="form-control" placeholder="Wic Planner Name" required/>
            </div>
            <div class='input-group date'>
                <input id="daterange3" name="daterange3" type="text" value="01/08/2016" class="form-control" required>
                <span class="input-group-addon">
                    <i class="font-icon font-icon-calend"></i>
                </span>
            </div>
            <?= $msg; ?>
            <button onclick="addWic();" name="signup" class="btn btn-rounded btn-success sign-up">Save</button>
        </div>
        <p id="confirmation" name="confirmation"> </p>
    </div>
    <!--        </div>
        </div>.page-center-->

   
<!--    <script src="js/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="js/lib/clockpicker/bootstrap-clockpicker-init.js"></script>
    <script src="js/lib/daterangepicker/daterangepicker.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>-->

   

   


</body>
</html>
