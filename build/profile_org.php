<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
$org = $_POST['Organization'];
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-push-3 col-md-12">
                  <section class="box-typical">
                    <header class="box-typical-header-sm">
                        Services
                        <div class="slider-arrs">
                            <button type="button" class="posts-slider-prev">
                                <i class="font-icon font-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="posts-slider-next">
                                <i class="font-icon font-icon-arrow-right"></i>
                            </button>
                        </div>
                    </header>
                    <div class="posts-slider">
                        <?php DB_GetOrganizationServices($pdo, $org) ?>
                    </div><!--.posts-slider-->
                </section><!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">Organization Information</header>
                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-notebook-bird"></i>
                            Description
                        </header>
                        <?php DB_GetOrgInformation2($pdo, $org); ?>
                </section>
                <section class="box-typical">
                    <header class="box-typical-header-sm">
                        People in our organization
                        &nbsp;
                        <!--a href="#" class="full-count"><--?php db_CountPeopleInOrg($pdo)?></a-->
                    </header>
                    <div class="friends-list">
                        <?php DB_getUsersInServiceOrganization($pdo, $org); ?>
                    </div>
                </section><!--.box-typical-->
            </div><!--.col- -->

            <div class="col-lg-3 col-md-6 col-sm-6">
                <section class="box-typical">
                    <header class="box-typical-header-sm">People also viewed</header>
                    <div class="friends-list stripped">
                        <?php DB_getPeopleViewServicesOrg($pdo, $org) ?>
                    </div>
                </section><!--.box-typical-->

            </div><!--.col- -->
        </div><!--.row-->
    </div><!--.container-fluid-->
</div><!--.page-content-->


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

<!--scrpit-messenger-->
<script>
    $(function () {
        $('.chat-settings .change-bg-color label').on('click', function () {
            var color = $(this).data('color');

            $('.messenger-message-container.from').each(function () {
                $(this).removeClass(function (index, css) {
                    return (css.match(/(^|\s)bg-\S+/g) || []).join(' ');
                });

                $(this).addClass('bg-' + color);
            });
        });
    });
</script>


<script src="js/app.js"></script>
</body>
</html>