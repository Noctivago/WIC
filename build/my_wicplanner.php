<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
$msg = '';
?>
<!--<link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">-->
<div class="page-content" style="height: 817px;">
    <div class="container-fluid">
        <div class="row" style="height: 700px;">
            <div class="col-lg-6">
                <section class="box-typical box-typical-max-280">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>My Events #WIC Planner</h3> 
                            </div>
                            <div class="tbl-cell tbl-people">
                                <!--<span><a class="font-icon font-icon-plus" style="align:rigth" href="addwicplanner.php"> Add a new Event	</a></span>-->
                                <!--<span><a class="font-icon font-icon-plus" onclick="showAddWicForm()" style="align:rigth"> New Event?</a></span>-->
                                <span><a class="font-icon font-icon-plus" onclick="loadMyWics();showAddWicForm();" style="align:rigth"> New Event?</a></span>
                            </div>
                        </div>
                    </header>
                    <div class="box-typical-body" style="overflow: hidden; padding: 0px; height: 700px; width: 504px;">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Owner</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="WICS">
                                    <!--COLOCAR VIA AJAX-->                                   
                                </tbody>
                            </table>
                        </div>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-->
            </div><!--.col- -->
            <!--A PUTA COMEÇA AQUI-->
            <!--SECÇAO PARA INCLUDES-->
            <link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
            <div class="col-lg-6 INCLUDE">

            </div>
        </div><!--.container-fluid-->
    </div><!--.page-content--> 
</div>

<script>
    function loadMyWics() {
        $.ajax({
            url: 'ajax/getMyWics.php',
            method: 'post',
            data: {},
            success: function (data) {
                $('.WICS').html(data);
            }
        });
    }
    function removeWic(x) {
        var id = x.id;
        $.ajax({
            url: 'ajax/remove_wic_planner.php',
            method: 'post',
            data: {con: id},
            success: function (data) {
                loadMyWics();
            }
        });
    }
    function removeWicService(x, y) {
        var id = x.id;
        var sid = y;
        $.ajax({
            url: 'ajax/remove_wic_planner_service.php',
            method: 'post',
            data: {con: id, conId: sid},
            success: function (data) {
                showWicServicesForm(id);
            }
        });
    }
    function showAddWicForm() {
        $(".INCLUDE").load("addwicplanner.php");
    }
    function showAddWicFormEditMode(idWicPlanner) {
        var x = idWicPlanner;
        $(".INCLUDE").load("addwicplanner.php?id=" + x + "&uid=" + <?= $_SESSION['id']; ?>);
    }

    function showWicServicesForm(idWicPlanner) {
        var x = idWicPlanner;
        $.ajax({
            url: 'ajax/showWicServices.php',
            method: 'post',
            data: {con: x},
            success: function (data) {
                if (data != '') {
                    $('.INCLUDE').html(data);
                } else {
                    alert('Falta Link do index dos services');
                    $(".INCLUDE").load("addTowicplanner.php");
                }
            }
        });
    }

    function addWic(wicId) {
        var wicName = document.getElementById("name").value;
        var wicDate = document.getElementById("daterange3").value;
        var wId = wicId;
        if (wicName !== "") {
            $.ajax({
                url: 'ajax/addWicP.php',
                method: 'post',
                data: {name: wicName, eDate: wicDate, wicId: wId},
                success: function (data) {
                    wicName.innerHTML = '';
                    wicDate.innerHTML = '';
                    loadMyWics();
                    document.getElementById("textelement").innerHTML = data;
                }
            });
        } else {
            document.getElementById("textelement").innerHTML = "Please fill all fields!";
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('.panel').lobiPanel({
            sortable: true
        });
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Day');
            dataTable.addColumn('number', 'Values');
            // A column for custom tooltip content
            dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
            dataTable.addRows([
                ['MON', 130, ' '],
                ['TUE', 130, '130'],
                ['WED', 180, '180'],
                ['THU', 175, '175'],
                ['FRI', 200, '200'],
                ['SAT', 170, '170'],
                ['SUN', 250, '250'],
                ['MON', 220, '220'],
                ['TUE', 220, ' ']
            ]);
            var options = {
                height: 314,
                legend: 'none',
                areaOpacity: 0.18,
                axisTitlesPosition: 'out',
                hAxis: {
                    title: '',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    textPosition: 'out'
                },
                vAxis: {
                    minValue: 0,
                    textPosition: 'out',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    baselineColor: '#16b4fc',
                    ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                    gridlines: {
                        color: '#1ba0fc',
                        count: 15
                    },
                },
                lineWidth: 2,
                colors: ['#fff'],
                curveType: 'function',
                pointSize: 5,
                pointShapeType: 'circle',
                pointFillColor: '#f00',
                backgroundColor: {
                    fill: '#008ffb',
                    strokeWidth: 0,
                },
                chartArea: {
                    left: 0,
                    top: 0,
                    width: '100%',
                    height: '100%'
                },
                fontSize: 11,
                fontName: 'Proxima Nova',
                tooltip: {
                    trigger: 'selection',
                    isHtml: true
                }
            };
            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        }
        $(window).resize(function () {
            drawChart();
            setTimeout(function () {
            }, 1000);
        });
        $('.panel').on('dragged.lobiPanel', function (ev, lobiPanel) {
            $('.dahsboard-column').matchHeight();
        });
    });</script>

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

<link rel="stylesheet" href="css/lib/clockpicker/bootstrap-clockpicker.min.css">
<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="js/lib/salvattore/salvattore.min.js"></script>
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

</body>
</html>