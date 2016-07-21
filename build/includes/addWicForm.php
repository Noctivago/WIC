<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
<form class="sign-box" action="" method="post">
    <div class="sign-avatar no-photo">&plus;</div>
    <header class="sign-title">Add new Wic Planner</header>
    <div class="form-group">
        <input type="text" id = "email" name ="Wic Planner Name" class="form-control" placeholder="Wic Planner Name" required/>
    </div>
    <div class="form-group">
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="Country">
            <option>Country</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="State">
            <option>State</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
        <select class="bootstrap-select bootstrap-select-arrow" placeholder="City">
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>City</option>
            <option>Long long long extra long example line long long long extra long example line </option>
        </select>
    </div>
    <div class='input-group date'>
        <input id="daterange3" type="text" value="01/08/2016" class="form-control">
        <span class="input-group-addon">
            <i class="font-icon font-icon-calend"></i>
        </span>
    </div>

    <p class="sign-note">  <?= $msg; ?> </p>
    <button type="submit" name="signup" class="btn btn-rounded btn-success sign-up">Add Wic Planner</button>
</form>

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