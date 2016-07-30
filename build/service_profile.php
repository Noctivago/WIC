<?php
include ("includes/head_sideMenu.php");
$serviceId = (filter_var($_GET['Service']));
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//$link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/';
//$link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/profile_org.php?Organization=' . $serviceId;
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

                <section class="box-typical" style="background-color: transparent; border: 0px">
			
                            <script src="js/jssor.slider.min.js" type="text/javascript"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: false,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
        <!-- Loading Screen -->
        <div align="center"  data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
            <?php DB_GetPicsService($pdo,$serviceId);
            

?>
            
<!--            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/01.jpg" />
                <img data-u="thumb" src="img/01.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/02.jpg" />
                <img data-u="thumb" src="img/thumb-02.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/03.jpg" />
                <img data-u="thumb" src="img/thumb-03.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/04.jpg" />
                <img data-u="thumb" src="img/thumb-04.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/05.jpg" />
                <img data-u="thumb" src="img/thumb-05.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/06.jpg" />
                <img data-u="thumb" src="img/thumb-06.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/07.jpg" />
                <img data-u="thumb" src="img/thumb-07.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/08.jpg" />
                <img data-u="thumb" src="img/thumb-08.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/09.jpg" />
                <img data-u="thumb" src="img/thumb-09.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/10.jpg" />
                <img data-u="thumb" src="img/thumb-10.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/11.jpg" />
                <img data-u="thumb" src="img/thumb-11.jpg" />
            </div>
            <div data-p="144.50" style="display: none;">
                <img data-u="image" src="img/12.jpg" />
                <img data-u="thumb" src="img/thumb-12.jpg" />
            </div>-->
            <a data-u="add" href="http://www.jssor.com" style="display:none">Jssor Slider</a>
        
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
    

					</section><!--.box-typical-->
                                        
          
                                     
    <section class="box-typical">
                    <!--<div class="recomendations-slider" style="opacity: 1;width: 726px;left: 0px;height: 36px;">-->

                    <header class="box-typical-header-sm">
                        Organization Information
<!--                        <div class="slider-arrs">
                            <button type="button" class="recomendations-slider-prev">
                                <i class="font-icon font-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="recomendations-slider-next">
                                <i class="font-icon font-icon-arrow-right"></i>
                            </button>
                        </div>-->
                    </header>
                    

                    <div class="recomendations-slider" >
                        <?= DB_GetServiceInfoBar($pdo, $serviceId, $_SESSION['id']); ?>
                        <div class="slide">
                            <!--BOTOES CHAT + WIC-->
                            <div class="user-card-row">
                                <?php
                                echo '<div class="card-typical-section">
                            
                                 <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onClick="openMyWics('.$row['SID'].');" </button>
                                 <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onClick="openMyWics();" </button>
                                     
                                </div>';
                                ?>
                            </div>
                            <!--<input type=button onClick="openMyWics();",  value="+">-->
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
                        echo '<article class="friends-list-item" style="width:300px">';
                        echo '    <div class="user-card-row">';
                        echo '      <div class="tbl-row">';
                        echo '        <div class="tbl-cell">';
                        echo '            <a href="edit_profile_service.php?Service=' . $serviceId . '" class="btn btn-inline btn-primary" style="margin-top: 10px;" role="button">Edit service</a> ';
                        if (db_checkServiceOrgBossServicePermission($pdo, $serviceId, $_SESSION['id'])) {
//                            $orgIdentifier = DB_GetOrgIdByUserBossId($pdo, $_SESSION['id']);
                            $link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/index.php';
                            echo '<a onclick="removeService();" class="btn btn-inline btn-danger" style="margin-top: 10px;" role="button">Delete service</a>';
                        }
                        echo '         </div>';
                        echo '  </div>';
                        echo ' </article>';
                    }
                    ?>
                     <?php
                   echo '<div class="card-typical-section">
                            
                       <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onClick="openMyWics('.$row['SID'].');"> </button>
                       <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onClick="openMyWics();" title="Add To my wic planner"> </button>
                                     
                     </div>';
                ?>
                </section>
                <br>


                <section class="box-typical" style="width:270px">
                    <!--DISPLAY SERVICE USERS-->
                    <?= DB_getUsersInServiceOrganizationByService($pdo, $serviceId); ?>
                </section>

                <section class="box-typical" style="width:270px">
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
                    $('#userComment').val('');
                }
            });
        }
    }

    function openMyWics() {
        var x = (screen.width / 2) - (435 / 2);
        var y = (screen.height / 2) - (362 / 2);
        window.open("./ajax/getMyWicsPopup.php?id=' <?= $serviceId; ?> '", 'MyWics', 'height=435,width=322,left=' + x + ',top=' + y);
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
