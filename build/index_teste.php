<html>
    <?php
    include ("includes/head_sideMenu.php");
    include ("./db/dbconn.php");
    ?>

    <div class="page-content">
        <div class="container-fluid">
            <div class="cards-grid" data-columns>

                <?= DB_getServicesForIndex($pdo, $Category, $SubCategoty, $city); ?>
            </div><!--.card-grid-->
            <div class="clear"></div>

            <!--TESTE-->
            <div data-role="page">
                <div data-role="header">
                    <h1>Welcome To My Homepage</h1>
                </div>

                <div data-role="main" class="ui-content">
                    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Show Popup Form</a>

                    <div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
                        <form method="post" action="demoform.asp">
                            <div>
                                <h3>Login information</h3>
                                <label for="usrnm" class="ui-hidden-accessible">Username:</label>
                                <input type="text" name="user" id="usrnm" placeholder="Username">
                                <label for="pswd" class="ui-hidden-accessible">Password:</label>
                                <input type="password" name="passw" id="pswd" placeholder="Password">
                                <label for="log">Keep me logged in</label>
                                <input type="checkbox" name="login" id="log" value="1" data-mini="true">
                                <input type="submit" data-inline="true" value="Log in">
                            </div>
                        </form>
                    </div>
                </div>
                <!--TESTE-->
            </div>
        </div>

        <script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="js/lib/tether/tether.min.js" type="text/javascript"></script>

        <script src="js/lib/tether/tether.min.js"></script>
        <script src="js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>

        <script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
        <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
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

        <script src="js/app.js"></script>

        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>

        <script>
            $(function () {
                $('#tags-editor-textarea').tagEditor();
            });
        </script>

    </body>
</html>