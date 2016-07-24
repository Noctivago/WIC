<?php
include_once '../db/dbconn.php';
include_once '../db/session.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
//print 'SESSION INFO <br>';
//print 'ID > ' . $_SESSION['id'] . '<br>';
//var_dump($_SESSION);
$userId = $_SESSION['id'];
//$wicPlannerId = (filter_var($_GET ['id']));
//DB_getMyWicsAsPopup($pdo, $userId);
?>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href="../css/lib/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/lib/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>




    </head>
    <body>
        <div class="sign-box">
            <div class="sign-avatar no-photo">&plus;</div>
            <header class="sign-title">#Add Service to WiC Planner?</header>
            <div class="form-group">
                <?= DB_getMyWicsAsPopup($pdo, $userId); ?>
            </div>
            <span id="textelement" class="form-control" style="border:0px"></span>
            <button onclick="alert('OK');" name="add2WiC" class="btn btn-rounded btn-success sign-up">Save</button>
        </div>


        <script src="../js/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../js/lib/tether/tether.min.js" type="text/javascript"></script>

        <script src="../js/lib/tether/tether.min.js"></script>
        <script src="../js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="../js/plugins.js"></script>

        <script type="text/javascript" src="../js/lib/jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/lib/lobipanel/lobipanel.min.js"></script>
        <script type="text/javascript" src="../js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script src="js/lib/salvattore/salvattore.min.js"></script>

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

        <script src="../js/app.js"></script>

        <script src="../js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="../js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="../js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="../js/lib/select2/select2.full.min.js"></script>

        <script>
                $(function () {
                    $('#tags-editor-textarea').tagEditor();
                });
        </script>

