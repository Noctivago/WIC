<?php
include ("includes/head_sideMenu.php");
include ("./db/dbconn.php");
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="cards-grid" data-columns>
            
            					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="checkbox">
								<input type="checkbox" id="check-1">
								<label for="check-1">Check me out</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" id="check-2" checked>
								<label for="check-2">Check me out</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" id="check-3" disabled>
								<label for="check-3">Check me out</label>
							</div>
							<div class="checkbox">
								<input type="checkbox" id="check-4" checked disabled>
								<label for="check-4">Check me out</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="radio">
								<input type="radio" name="optionsRadios" id="radio-1" value="option1">
								<label for="radio-1">Option one </label>
							</div>
							<div class="radio">
								<input type="radio" name="optionsRadios" id="radio-2" value="option2" checked>
								<label for="radio-2">Option two </label>
							</div>
							<div class="radio">
								<input type="radio" name="optionsRadios" id="radio-3" value="option3" disabled>
								<label for="radio-3">Option three is disabled</label>
							</div>
							<div class="radio">
								<input type="radio" name="optionsRadios2" id="radio-4" value="option4" checked disabled>
								<label for="radio-4">Option four is disabled</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="checkbox-slide">
								<input type="checkbox" id="check-slide-1" />
								<label for="check-slide-1">Slide</label>
							</div>
							<div class="checkbox-slide">
								<input type="checkbox" id="check-slide-2" checked />
								<label for="check-slide-2">Slide checked</label>
							</div>
							<div class="checkbox-slide">
								<input type="checkbox" id="check-slide-3" disabled />
								<label for="check-slide-3">Slide disabled</label>
							</div>
							<div class="checkbox-slide">
								<input type="checkbox" id="check-slide-4" checked disabled />
								<label for="check-slide-4">Slide checked disabled</label>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="checkbox-toggle">
								<input type="checkbox" id="check-toggle-1" />
								<label for="check-toggle-1">Toggle</label>
							</div>
							<div class="checkbox-toggle">
								<input type="checkbox" id="check-toggle-2" checked />
								<label for="check-toggle-2">Toggle checked</label>
							</div>
							<div class="checkbox-toggle">
								<input type="checkbox" id="check-toggle-3" disabled />
								<label for="check-toggle-3">Toggle disabled</label>
							</div>
							<div class="checkbox-toggle">
								<input type="checkbox" id="check-toggle-4" checked disabled />
								<label for="check-toggle-4">Toggle checked disabled</label>
							</div>
						</div>
					</div><!--.row-->


            <?php
            //name
            if (isset($_GET ['Category']) && !isset($_GET ['qParam']) && !isset($_GET ['name'])) {
                $CategoryId = (filter_var($_GET ['Category']));
                DB_getServicesForIndexByCategory($pdo, $CategoryId);
            } elseif (!isset($_GET ['Category']) && isset($_GET ['qParam']) && !isset($_GET ['name'])) {
                $qParam = (filter_var($_GET ['qParam']));
                DB_getServicesForIndexByName($pdo, $qParam);
                DB_getServicesForIndexByDescription($pdo, $qParam);
            } elseif (isset($_GET ['Category']) && isset($_GET ['qParam']) && !isset($_GET ['name'])) {
                $CategoryId = (filter_var($_GET ['Category']));
                $qParam = (filter_var($_GET ['qParam']));
                DB_getServicesForIndexByNameAndCategory($pdo, $qParam, $CategoryId);
                DB_getServicesForIndexByDescriptionAndCategory($pdo, $qParam, $CategoryId);
                //APENAS CITY
            } elseif (isset($_GET ['name']) && !isset($_GET ['qParam']) && !isset($_GET ['Category'])) {
                $City = (filter_var($_GET ['name']));
                //$City = ucfirst($City);
                $CityId = DB_getCityId($pdo, $City);
                DB_getServicesForIndexByCity($pdo, $CityId);
                //CITY e CATEGORY
            } elseif (isset($_GET ['name']) && isset($_GET ['Category']) && !isset($_GET ['qParam'])) {
                $City = (filter_var($_GET ['name']));
                $CategoryId = (filter_var($_GET ['Category']));
                $CityId = DB_getCityId($pdo, $City);
                DB_getServicesForIndexByCityAndCategory($pdo, $CategoryId, $CityId);
            } else {
                DB_getServicesForIndex($pdo);
            }
            ?>

        </div><!--.card-grid-->
        <div class="clear"></div>
        <div style="padding-left: 500px;">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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

<script type="text/javascript">
    function openMyWics(Sid) {
        var x = (screen.width / 2) - (435 / 2);
        var y = (screen.height / 2) - (362 / 2);
        if (Sid > 0) {
            window.open('./ajax/getMyWicsPopup.php?id=' + Sid + '', 'MyWics', 'height=435,width=322,left=' + x + ',top=' + y);
        } else {

        }
    }
</script>

</body>
</html>