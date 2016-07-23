<?php
include ("includes/head_sideMenu.php");
$serviceId = (filter_var($_GET['Service']));
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-lg-push-0 col-md-12">

                <!--<div class="col-lg-6 col-lg-push-3 col-md-12">-->
                <section class="box-typical">
                    <img src="http://www.clickgratis.com.br/fotos-imagens/praia/aHR0cDovL3d3dy5vbGVvby5jb20uYnIvd3AtY29udGVudC91cGxvYWRzLzIwMTUvMTEvcHJhaWEuanBn.jpg" style="width: 100%"/>
                </section>                                         

                <section class="box-typical">
                    <div class="recomendations-slider">
                        <div class="slide">

                            <div class="user-card-row">
                                <div class="tbl-row">
                                    <div class="tbl-cell tbl-cell-photo">
                                        <a href="#">
                                            <img src="img/photo-64-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tbl-cell">
                                        <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
                                        <p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
                                    </div>
                                </div>
                            </div>
                        </div><!--.slide-->

                        <div class="slide">

                            <div class="user-card-row">
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
                                    <p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
                                </div>
                            </div>
                        </div><!--.slide-->

                        <div class="slide">

                            <div class="user-card-row">
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
                                    <p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
                                </div>								</div>
                        </div><!--.slide-->

                    </div>
                </section>

                <section class="box-typical">
                    <header class="box-typical-header-sm">Personal Info</header>
                    <article class="profile-info-item">
                        <header class="profile-info-item-header">
                            <i class="font-icon font-icon-notebook-bird"></i>
                            Summary
                        </header>
                        <div class="text-block text-block-typical">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                        </div>
                    </article>
                </section>

                <div class="box-typical">
                    <input type="text" id="userComment" name="userComment" class="write-something userComment" placeholder="Write a Review..." required/>
                    <div class="box-typical-footer">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">

                                </div>
                                <div class="tbl-cell tbl-cell-action">
                                    <button onclick="addServiceComment(<?= $serviceId; ?>);" class="btn btn-rounded">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--.box-typical-->

                <section class="box-typical">
                    <header class="box-typical-header-sm">
                        Reviews
                        <div class="slider-arrs">
                            <button type="button" class="recomendations-slider-prev">
                                <i class="font-icon font-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="recomendations-slider-next">
                                <i class="font-icon font-icon-arrow-right"></i>
                            </button>
                        </div>
                    </header>
                    
                        <!--DISPLAY COMMENTS-->
                        <div class="COMMENTS">

                        </div>
                   
                </section>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6" style="padding-right: 0px;">
                <section class="box-typical">
                    <!--DISPLAY SERVICE USERS-->
                    <?= DB_getUsersInServiceOrganizationByService($pdo, $serviceId); ?>
                </section>

                <section class="box-typical">
                    <!--DISPLAY ORG INFO-->
                    <?= DB_GetOrgInformationForService($pdo, $serviceId); ?>
                </section>
            </div>
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
<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
<script>
                                        function addServiceComment(serviceId) {
                                            var comment = document.getElementById("userComment").value;
                                            var sId = serviceId;
                                            if (comment !== '') {
                                                $.ajax({
                                                    url: 'ajax/addServiceComment.php',
                                                    method: 'post',
                                                    data: {comment: comment, sId: sId},
                                                    success: function (data) {
                                                        alert(data);
                                                        loadComments();
                                                        $("#userComment").empty();
                                                    }
                                                });
                                            }
                                        }
                                        function loadComments() {
                                            $.ajax({
                                                url: 'ajax/getServiceComment.php',
                                                method: 'post',
                                                data: {sId: <?= $serviceId; ?>},
                                                success: function (data) {
                                                    $('.COMMENTS').html(data);
                                                }
                                            });
                                        }
                                        function load() {
                                            console.log("load comments");
                                            loadComments();
                                        }
                                        window.onload = load;
</script>

<script>
    $(document).ready(function () {
        $("#range-slider-1").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-2").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-3").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-4").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

    });
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

<script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
<script src="js/lib/select2/select2.full.min.js"></script>


<script src="js/app.js"></script>
</body>
</html>
