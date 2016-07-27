<?php
include ("includes/head_sideMenu.php");
$serviceId = (filter_var($_GET['Service']));
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$orgIdentifier = DB_GetOrgIdByUserBossId($pdo, $_SESSION['id']);
$link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/profile_org.php?Organization=' . $serviceId;
?>

<style>
    /****** Rating Starts *****/
    @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    fieldset, label { margin: 0; padding: 0; }
    body{ margin: 20px; }
    h1 { font-size: 1.5em; margin: 10px; }

    .rating { 
        border: none;
        float: left;
    }

    .rating > input { display: none; } 
    .rating > label:before { 
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before { 
        content: "\f089";
        position: absolute;
    }

    .rating > label { 
        color: #ddd; 
        float: right; 
    }
    .rating > input:checked ~ label, 
    .rating:not(:checked) > label:hover,  
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }
    .rating > input:checked + label:hover, 
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, 
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     

</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-lg-push-0 col-md-12">

                <section class="box-typical">
                    <img src="http://www.clickgratis.com.br/fotos-imagens/praia/aHR0cDovL3d3dy5vbGVvby5jb20uYnIvd3AtY29udGVudC91cGxvYWRzLzIwMTUvMTEvcHJhaWEuanBn.jpg" style="width: 100%"/>
                </section>                                         

                <section class="box-typical">
                    <!--<div class="recomendations-slider" style="opacity: 1;width: 726px;left: 0px;height: 36px;">-->
                    <div class="recomendations-slider"  >
                        <?= DB_GetServiceInfoBar($pdo, $serviceId, $_SESSION['id']); ?>
                        <div class="slide">
                            <!--BOTOES CHAT + WIC-->
                            <div class="user-card-row">
                                <?php
                                echo '<div class="card-typical-section">
                                <input type=button onClick=window.open("./ajax/getMyWicsPopup.php?id=' . $serviceId . '","AddToWiC","width=550,height=500,left=30,top=30,toolbar=0,status=0,"); value="+">
                                </div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!--DESCR SERVICE-->
                <?= DB_GetServiceLocAndDescription($pdo, $serviceId); ?>

                <?php
                if ($_SESSION['role'] === 'user') {
                    DB_InsertView($pdo, $serviceId, $_SESSION['id']);
                    echo '<div class="box-typical">
                    <input type="text" id="userComment" name="userComment" class="write-something userComment" placeholder="Write a Review..." required/>
                    <div class="box-typical-footer">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">

                                </div>
                                <div class="tbl-cell tbl-cell-action">
                                    <button onclick="addServiceComment(' . $serviceId . ');" class="btn btn-rounded">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--.box-typical-->';
                }
                ?>

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
                        <?= DB_getServiceCommentFromUsers($pdo, $serviceId); ?>
                    </div>

                </section>
            </div>



            <div class="col-lg-3 col-md-6 col-sm-6" style="padding-right: 0px;">
                <section class="">
                    <!--DISPLAY BOTAO EDIT AO BOSS-->
                    <?php
                    $role = 'Service manager';
                    $role2 = 'Edit service information';
                    if (db_checkServiceOrgBossServicePermission($pdo, $serviceId, $_SESSION['id']) || DB_validatePermissionEditInfo($pdo, $_SESSION['id'], $serviceId, $role) || DB_validatePermissionEditInfo($pdo, $_SESSION['id'], $serviceId, $role2)) {
                        echo '<article class="friends-list-item">';
                        echo '    <div class="user-card-row">';
                        echo '      <div class="tbl-row">';
                        echo '        <div class="tbl-cell">';
                        echo '            <a href="edit_profile_service.php?Service=' . $serviceId . '" class="btn btn-rounded" style="margin-top: 10px;" role="button">Edit your service</a> ';
                        if (db_checkServiceOrgBossServicePermission($pdo, $serviceId, $_SESSION['id'])) {
                            $orgIdentifier = DB_GetOrgIdByUserBossId($pdo, $_SESSION['id']);
                            $link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/profile_org.php?Organization=' . $orgIdentifier;
                            echo '<a onclick="removeService();" class="btn btn-rounded" style="margin-top: 10px;" role="button">Delete your service</a>';
                        }
                        echo '         </div>';
                        echo '  </div>';
                        echo ' </article>';
                    }
                    ?>
                </section>
                <br>


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

<script type="text/javascript">
    function addServiceComment(serviceId) {
        var comment = document.getElementById("userComment").value;
        var sId = serviceId;
        if (comment !== '') {
            $.ajax({
                url: 'ajax/addServiceComment.php',
                method: 'post',
                data: {comment: comment, sId: sId},
                success: function (data) {
                    //alert(data);
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

    function removeService() {
        $.ajax({
            url: 'ajax/remove_service.php',
            method: 'post',
            data: {sId: <?= $serviceId; ?>},
            success: function (data) {
                if (data === 'OK') {
                    window.location.replace("<?= $link; ?>");
                }
            }
        });
    }

    function load() {
        console.log("load comments");
        //loadComments();
    }


    window.onload = load;
</script>

<script src = "js/lib/jquery/jquery.min.js" type = "text/javascript"></script>
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
    $(document).ready(function () {
        $("#demo1 .stars").click(function () {

            $.post('ajax/rating.php', {rate: $(this).val(), service: <?= $serviceId; ?>}, function (d) {
                if (d > 0)
                {
                    alert('You already rated this service!');
                } else {
                    alert('Thanks For Rating');
                    //alert(d);
                }
            });
            $(this).attr("checked");
        });
    });
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
