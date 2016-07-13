<?php
//FAZER GET DO ID DO SERVICE
$orgServId = 2;
$msg;
?>
<main class = "cd-main-content">
    <div class = "content-wrapper" style = "padding-left: 0%">

        <div class = "top-content">
            <link rel = "stylesheet" href = "http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <!--<link href = "../../assets/assests_sidebar/css/style_inside.css" rel = "stylesheet" type = "text/css"/> -->
            <!--<div class = "inner-bg" style = "padding-top: 0px"> -->
            <div class = "container">
                <!--<div class = "row"> -->
                <div class = "col-sm-8 col-lg-offset-2 text">
                    <!--</div> -->
                    <?php
                    if (isset($_POST['addComment']) && !empty($_POST['userComment'])) {
                        $userId = $_SESSION['id'];
                        $comment = (filter_var($_POST ['userComment'], FILTER_SANITIZE_STRING));
                        $d = getDateToDB();
                        #$orgServId = ;
                        #$msg = 'USER > ' . $userId . ' COMMENT > ' . $comment . ' DATE > ' . $d . ' ORGSERID > ' . $orgServId;
                        $msg = DB_addCommentOnService($pdo, $userId, $comment, $orgServId, $d);
                    }
                    ?>
                </div>
                <div class = "row">
                    <div class = "col-sm-5">
                        <div class = "form-box">
                            <div class = "form-top">
                                <div class = "form-top-left">
                                </div>
                                <div class = "form-top-right">
                                </div>
                                <!--<div class = "form-top-right">
                                <i class = "fa fa-key"></i> -->
                                <img src = "http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class = "avatar img-circle img-thumbnail text-center center-block" alt = "avatar">
                                <!--<input style = "color: black;" class = "form-username form-control" type = "file"> -->
                                <!--<h6 style = "color:black">Upload a different photo...</h6> width: 370px;
                                align:center-left;
                                text-left center-block well well-sm-->

                            </div>
                            <div class = "form-bottom">
                                <form role = "form" action = "" method = "post" class = "login-form">
                                    <div class = "form-group">
                                        <label class = "sr-only" for = "form-username">Name of the Service:</label>
                                        <input type = "text" style = "height: 40px" name = "email" placeholder = "Name of the Service" class = "form-username form-control" id = "form-username" required autofocus>
                                    </div>
                                    <div class = "form-group">
                                        <label class = "sr-only" for = "form-password">Address:</label>
                                        <input type = "text" style = "height: 40px" name = "password" placeholder = "Address:" class = "form-password form-control" id = "form-password" required>
                                    </div>
                                    <div class = "form-group">
                                        <label class = "sr-only" for = "form-password">Description:</label>
                                        <input type = "text" style = "height: 40px" name = "password" placeholder = "DESCRIPTION:" class = "form-password form-control" id = "form-password" required>
                                    </div>
                                </form>
                                <div>
                                    <button id ="showWICPlannerBTN" onclick="show('showWICPlanner');hide('showWICPlannerBTN');" class = "btn" name = "WICPlannerShow">Add to WIC Planner!</button>
                                    <div id ="showWICPlanner" style="display:none;">
                                        <p>Choose a WIC Planner</p>
                                        <select class="form-username form-control" name="wicPlannerSelect" id="wicPlannerSelect" required="required">
                                            <?= DB_getWicPlannerAsSelect($pdo, $_SESSION['id']) ?>
                                        </select>
                                        <br>
                                        <div class = "login-form">
                                            <button onclick="hide('showWICPlanner');show('showWICPlannerBTN');" class = "btn" name = "WICPlannerHide">Hide WIC Planner!</button>
                                            <button onclick="addToWic(<?= $orgServId ?>)"class = "btn" name = "addToWICPlanner">Add to WIC Planner!</button>
                                        </div>
                                    </div>
                                        <button onclick="show('showChat');" class = "btn" name = "WICChat">Start dealing!</button>
                                        <div id ="showChat" style="display:none;">
                                            <button onclick="hide('showChat');" class = "btn" name = "ChatHide">Maybe later!</button>
                                            <button onclick="addToConversation(<?= $_SESSION['id'] ?>,<?= $orgServId ?>)" class = "btn" name = "addToConversation">Start it now!</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function show(toBlock) {
                            setDisplay(toBlock, 'block');
                        }
                        function hide(toNone) {
                            setDisplay(toNone, 'none');
                        }
                        function setDisplay(target, str) {
                            document.getElementById(target).style.display = str;
                        }
                    </script>

                    <div class = "col-sm-1 middle-border" >
                    </div>
                    <div class = "col-sm-1"></div>
                    <div class = "col-sm-5">
                        <!--<link rel = "stylesheet" href = "http://fontawesome.io/assets/font-awesome/css/font-awesome.css"> -->
                        <!--espaço comentários-->
                        
<!--                        descomentar!!!-->

<!--                        <div class = "container">
                            <div class = "row">
                                <h3>Give your about this Service :D</h3>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6" style = "width: 100%">
                                    <div class = "form-bottom">
                                        <div class = "status-upload"> 
                                        <div class = "cd-label">
                                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                                <div><h4> <?php echo $msg; ?></h4>
                                                    <textarea id="userComment" name ="userComment" placeholder="Write your comment here" style="width: 100%"></textarea>
                                                </div>
                                                <button type="submit" class="btn" id = "addComment" name="addComment"><i class="fa fa-reply"></i>POST </button>
                                                <button onclick="addCommentToService(<?= $_SESSION['id'] ?>,<?= $orgServId ?>,<?= getDateToDB() ?>));" class="btn" id = "addComment" name="addComment"><i class="fa fa-reply"></i>POST </button>
                                            </form>
                                        </div> Status Upload class="btn btn-success "
                                        </div><!-- Widget Area 
                                    </div>

                                </div>
                            </div>
                            /espaço comentários

                            espaço comentários anteriores

                            <div class="container">
                                <?= DB_getCommentsOfService($pdo, $orgServId) ?>

                            </div> /container 
                            /espaço comentarios anteriores

                        </div>-->

<!--                        descomentar!!!-->


                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <!--                    <div class="col-sm-1"></div>
                        
                                            <div class="col-sm-5">-->

<!--Caixa de escrever mensagens-->

<div class="row" style="
    margin-top: 0px;
    width: 800px;
    height: 68px;
">
        <div class="col-lg-3">
            <div class="btn-panel btn-panel-conversation">
                <a href="" class="btn  col-lg-6 send-message-btn " role="button"><i class="fa fa-search"></i> Search</a>
                <!--<a href="" class="btn  col-lg-6  send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> New Message</a>-->
            </div>
        </div>

        <div class="col-lg-offset-1 col-lg-7">
            <div class="btn-panel btn-panel-msg">

                <!--<a href="" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i> Settings</a>-->
            </div>
        </div>
    </div>

        <div class="message-wrap col-lg-8">
            <div class="msg-wrap">


                <div class="media msg ">
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am</small>
                        <h5 class="media-heading">Naimish Sakhpara</h5>
                        <small class="col-lg-10">Location H-2, Ayojan Nagar, Near Gate-3, Near
                            Shreyas Crossing Dharnidhar Derasar,
                            Paldi, Ahmedabad 380007, Ahmedabad,
                            India
                            Phone 091 37 669307
                            Email aapamdavad.district@gmail.com</small>
                    </div>
                </div>
                <div class="alert alert-info msg-date">
                    <strong>Today</strong>
                </div>
                <div class="media msg">
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am</small>

                        <h5 class="media-heading">Naimish Sakhpara</h5>
                        <small class="col-lg-10">Arnab Goswami: "Some people close to Congress Party and close to the government had a #secret #meeting in a farmhouse in Maharashtra in which Anna Hazare send some representatives and they had a meeting in the discussed how to go about this all fast and how eventually this will end."</small>
                    </div>
                </div>
                <div class="media msg">
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am</small>

                        <h5 class="media-heading">Naimish Sakhpara</h5>
                        <small class="col-lg-10">Arnab Goswami: "Some people close to Congress Party and close to the government had a #secret #meeting in a farmhouse in Maharashtra in which Anna Hazare send some representatives and they had a meeting in the discussed how to go about this all fast and how eventually this will end."</small>
                    </div>
                </div>

                <div class="media msg">
                    <a class="pull-left" href="#">
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                        <small class="pull-right time"><i class="fa fa-clock-o"></i> 12:10am</small>
                        <h5 class="media-heading">Naimish Sakhpara</h5>

                        <small class="col-lg-10">Arnab Goswami: "Some people close to Congress Party and close to the government had a #secret #meeting in a farmhouse in Maharashtra in which Anna Hazare send some representatives and they had a meeting in the discussed how to go about this all fast and how eventually this will end."</small>
                    </div>
                </div>

            </div>

            <div class="send-wrap ">

                <textarea class="form-control send-message" rows="3" placeholder="Write a reply..."></textarea>


            </div>
            <div class="btn-panel">
                <!--<a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>-->
                <a href="" class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</a>
            </div>
        </div>


<!--Caixa de escrever mensagens-->
                        



                    </div>
                    

</div>


                </div>
                <!--        </div>-->

            </div>
        </div>
</main>
<!--<script src="../../assets/assests_sidebar/js/js_main/bootstrap.min_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/jquery_1.11.1_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/backstretch.min_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/scripts_main.js" type="text/javascript"></script>-->


<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>
<script src="../../js/Service.js" type="text/javascript"></script>



