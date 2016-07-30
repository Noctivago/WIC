<?php
include ("includes/head_sideMenu.php");
include ("./db/dbconn.php");
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="cards-grid" data-columns>
            
            
        <?php
        $s_catId = (filter_var($_GET['Category']));
        $s_qParamString = (filter_var($_GET['aParam']));
        $s_cityId = (filter_var($_GET['City']));
        $idUser = $_SESSION['id'];

        if(isset(filter_var($_GET['Category']))) {
            
        }
//        if (isset($_GET['UserInService'])) {
//                            DEVOLVE OS SERVIÇOS DA ORG DE UM DETERMINADO USER
//            $UserInService = (filter_var($_GET['UserInService']));
//            DB_GetOrganizationServicesByUserInService($pdo, $org, $UserInService);
//        } else {
//                            DEVOLVE TODOS OS SERVIÇOS DAS ORG
//            DB_GetOrganizationServices($pdo, $org, $idUser);
//        }
        ?>

            <?php
            if (isset($_GET ['Category'])) {
                $CategoryId = (filter_var($_GET ['Category']));
                DB_getServicesForIndexByCategory($pdo, $CategoryId);
            } else {
                DB_getServicesForIndex($pdo);
            }
            ?>

        </div><!--.card-grid-->
        <div class="clear"></div>
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
            window.open('./ajax/getMyWicsPopup.php?id=' + Sid +  '', 'MyWics', 'height=435,width=322,left=' + x + ',top=' + y);
        } else {
            
        }
    }
</script>

</body>
</html>