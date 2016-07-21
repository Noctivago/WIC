<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>


<div class="page-content" style="height: 817px;">
    <div class="container-fluid">
        <div class="row" style="height: 700px;">

            <div class="col-lg-6">

                <!--<div class="col-lg-6 col-lg-push-3 col-md-12">-->

                <section class="box-typical box-typical-max-280">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>My Events #WIC Planner</h3> 
                            </div>
                            <div class="tbl-cell tbl-people">
                                <!--<span><a class="font-icon font-icon-plus" style="align:rigth" href="addwicplanner.php"> Add a new Event	</a></span>-->
                                <span><a class="font-icon font-icon-plus" onclick="showAddWicForm()" style="align:rigth"> Create New Event?</a></span>
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

                                <tbody>
                                    <?= db_getMyWicPlannerToWICCrud($pdo, $_SESSION['id']); ?>
                                    <?= db_getThirdWicPlannerToWICCrud($pdo, $_SESSION['id']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!--.box-typical-body-->
                </section><!--.box-typical-->
            </div><!--.col- -->

            <!--A PUTA COMEÇA AQUI-->
            <!--SECÇAO PARA INCLUDES-->
            <div id = "include" class="col-lg-6">

            </div>

        </div><!--.container-fluid-->
    </div><!--.page-content-->
</div>
<script>
    function showAddWicForm() {
        //alert('WIC PLANNER FORM');
        $("#include").load("includes/addWicForm.php");
    }
    function showWicServicesForm(idWicPlanner) {
        var x = idWicPlanner;
        var u = <?= $_SESSION['id'] ?>;
        $("#include").load("includes/showWicServices.php?id=" + x + "&uId=" + u);
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
    });
</script>

<script src="js/app.js"></script>

<!--        <script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>-->
        <!--<script src="js/lib/tether/tether.min.js" type="text/javascript"></script>-->

<!--<script src="js/lib/tether/tether.min.js"></script>-->
<!--<script src="js/lib/bootstrap/bootstrap.min.js"></script>-->
<!--<script src="js/plugins.js"></script>-->

<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="js/lib/salvattore/salvattore.min.js"></script>

<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/tether/tether.min.js"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>

<!--	<script src="js/lib/table-edit/jquery.tabledit.min.js"></script>
        <script>
                $(function () {
                        $('#table-edit').Tabledit({
                                url: 'example.php',
                                columns: {
                                        identifier: [0, 'id'],
                                        editable: [[1, 'name'], [2, 'description']]
                                }
                        });
                });
        </script>-->

<script src="js/app.js"></script>
</body>
</html>