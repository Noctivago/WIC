<?php
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
                                    <button id ="showWICPlannerBTN"onclick="show('showWICPlanner');hide('showWICPlannerBTN');" class = "btn" name = "WICPlannerShow">Add to WIC Planner!</button>
                                    <div id ="showWICPlanner" style="display:none;">
                                        <select class="form-username form-control" name="wicPlanner" id="wicPlanner" required="required">
                                            <?= DB_getWicPlannerAsSelect($pdo, $_SESSION['id']) ?>
                                        </select>
                                        <br>
                                        <div class = "login-form">
                                            <button onclick="hide('showWICPlanner');show('showWICPlannerBTN');" class = "btn" name = "WICPlannerHide">Hide WIC Planner!</button>
                                            <button onclick="addToWICPlanner()"class = "btn" name = "addToWICPlanner">Add to WIC Planner!</button>
                                        </div>
                                    </div>
                                    <button onclick="show('showChat');" class = "btn" name = "WICChat">Start dealing!</button>
                                    <div id ="showChat" style="display:none;">
                                        <p>SHOWING CHAT</p>
                                        <button onclick="hide('showChat');" class = "btn" name = "ChatHide">Maybe later!</button>
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
                        function addToWICPlanner() {
                            //function DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId)
                            var myData = <?php DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId) ?>;
                            console.log(myData);
                            alert(myData);
                        }

                    </script>

                    <div class = "col-sm-1 middle-border" >
                    </div>
                    <div class = "col-sm-1"></div>
                    <div class = "col-sm-5">
                        <!--<link rel = "stylesheet" href = "http://fontawesome.io/assets/font-awesome/css/font-awesome.css"> -->
                        <!--espaço comentários-->
                        <div class = "container">
                            <div class = "row">
                                <h3>Give your about this Service :D</h3>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6" style = "width: 100%">
                                    <div class = "form-bottom">
                                        <!--<div class = "status-upload"> -->
                                        <div class = "cd-label">
                                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                                <div><h4> <?php echo $msg; ?></h4>
                                                    <textarea id="userComment" name ="userComment" placeholder="Write your comment here" style="width: 100%"></textarea>
                                                </div>
                                                <button type="submit" class="btn" id = "addComment" name="addComment"><i class="fa fa-reply"></i>POST </button>
                                        </div><!-- Status Upload class="btn btn-success "
                                        </div><!-- Widget Area -->
                                    </div>

                                </div>
                            </div>
                            <!--/espaço comentários-->

                            <!--espaço comentários anteriores-->

                            <div class="container">
                                <?= DB_getCommentsOfService($pdo, $orgServId) ?>

                            </div><!-- /container -->
                            <!--/espaço comentarios anteriores-->

                        </div>
                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <!--                    <div class="col-sm-1"></div>
                        
                                            <div class="col-sm-5">-->




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



