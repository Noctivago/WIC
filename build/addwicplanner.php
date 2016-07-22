<!DOCTYPE html>
<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$msg = 'ID >' . $id;
?>
<body>
    <link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
    <!--    <div class="page-center">
            <div class="page-center-in">-->
    <div class="container-fluid">
        <!--DIV ESTAVA COMO FORM-->
        <form class="sign-box">
            <div class="sign-avatar no-photo">&plus;</div>
            <header class="sign-title">Add new Wic Planner</header>
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
            <button onclick="addWic();" name="signup" class="btn btn-rounded btn-success sign-up">Add Wic Planner</button>
        </form>
        <div class="INCLUDE">

        </div>
    </div>
    <!--        </div>
        </div>.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="js/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="js/lib/clockpicker/bootstrap-clockpicker-init.js"></script>
    <script src="js/lib/daterangepicker/daterangepicker.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>

    <script>
                $(function () {
                    $('#tags-editor-textarea').tagEditor();
                });
    </script>

    <script>
        function addWic() {
            var wicName = document.getElementById("name").value;
            var wicDate = document.getElementById("daterange3").value;
            if (wicName != "") {
                alert(wicName + ' ' + wicDate);
                $.ajax({
                    url: 'ajax/addWicP.php',
                    method: 'post',
                    data: {name: wicName, eDate: wicDate},
                    success: function (data) {
                        $('.INCLUDE').html(data);
                    }
                });
                wicName.innerHTML = "";
                wicDate.innerHTML = "";
            } else {
                $('.INCLUDE').html("Please fill all fields!");
            }
        }
    </script>



    <!-- RECHAPTA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        $(function () {
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
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
                /*$('.daterangepicker select').selectpicker({
                 size: 10
                 });*/
            });
        });
    </script>

</body>
</html>
