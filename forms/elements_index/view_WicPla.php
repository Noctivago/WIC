<script type="text/javascript">
    function getMyWic(userId) {
        var ajaxDisplay = document.getElementById('no-more-tables');

        $.ajax({
            url: '../../ajax/get_my_wic.php',
            method: 'post',
            data: {usrId: userId},
            success: function (data) {
                ajaxDisplay.innerHTML = data;
            }
        });
    }
</script>    
<main onload="getMyWic(<?= $_SESSION['id']; ?>)" class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">


        <div class="top-content">
            <div class="col-lg-12">
                <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Wic Planner
                </h1>
            </div>
        </div>

        <div class="top-content" style="height: 480px">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <!--<link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
            <link rel="stylesheet"   link href="../../assets/assests_sidebar/css/tabela.css" rel="stylesheet" type="text/css"/>
            <!--    <div class="inner-bg" style="padding-top: 0px">-->
            <div class="container">

                <!--            <div class="row">-->
                <div class="col-sm-8 col-lg-offset-2 text">
                    <!--            </div>-->
                </div>

                <div class="row">

                    <div class="col-sm-5">

                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3 style="color: darkgray"> New Wic Planner</h3>

                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-plus-circle"></i>
                                </div>
                                <!--                            <div class="form-top-right">
                                                                <i class="fa fa-key"></i>-->
    <!--                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                    <input style="color: black;" class="form-username form-control" type="file">-->
                                <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->

                            </div>


                            <div class="form-bottom">
                                <?php
                                if (isset($_POST['addWic']) && !empty($_POST['name']) && !empty($_POST['city'])) {
                                    $msg = '';
                                    try {
                                        #$d = getDateToDB();
                                        $name = (filter_var($_POST ['name'], FILTER_SANITIZE_EMAIL));
                                        $city = (filter_var($_POST ['city'], FILTER_SANITIZE_NUMBER_INT));
                                        $userId = $_SESSION['id'];
                                        $eventDate = (filter_var($_POST ['eventDate'], FILTER_SANITIZE_STRING));
                                        $DB_Date = getDateToDBStringToDate($eventDate);
                                        $msg = DB_addWicPlanner($pdo, $name, $city, $userId, $DB_Date, $eventDate);
                                        #$msg = ' NOME ' . $name . ' CITY ' . $city . ' USER ' . $userId . ' DATE ' . $d . ' EVENT DATE ' . $DB_Date;
                                    } catch (Exception $ex) {
                                        echo "ERROR!";
                                    }
                                }
                                ?>	

                                <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                    <div class="form-group"><h4 style="color: darkgray"><?php echo $msg; ?></h4>

                                        <!--<label class="sr-only" for="form-username">Company Name:</label>-->
                                        <input type="text" name="name" placeholder="WIC Planner Name" class="form-username form-control" id="name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Telephone:</label>-->
                                        <select type="text" name="city" placeholder="Chose a City" class="form-password form-control" id="city" required>
                                            <?= DB_getCityAsSelect($pdo) ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Mobile Number:</label>-->
                                        <input type="date" name="eventDate" placeholder="Event Date" class="form-username form-control" id="eventDate" required>
                                    </div>

                                    <button type="submit" onclick="getMyWic(<?= $_SESSION['id']; ?>)" class="btn" name="addWic" visible="true">NEW Wic Planner!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--post modal-->
                    <!--<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            Update Status
                          </div>
                          <div class="modal-body">
                              <form class="form center-block">
                                <div class="form-group">
                                  <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
                                </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <div>
                              <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
                                <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                                      </div>	
                          </div>
                      </div>
                      </div>
                    </div>-->
                    <div class="col-sm-1 middle-border" style="margin-top: 70px;"></div>


                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">


                        <div class="container">
                            <div class="row">
                                <!--                                <div class="col-lg-12">
                                                                    <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;"> My WicPlanner's
                                                 </h1>
                                
                                                                </div>-->
                                <div class="form-box">

                                    <div class="form-top" style="padding-bottom: 10px;">
                                        <div class="form-top-left">
                                            <h3 style="color: darkgray"> My Wic Planner's</h3>

                                        </div>
                                        <div class="form-top-right">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <!--                            <div class="form-top-right">
                                                                        <i class="fa fa-key"></i>-->
            <!--                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                            <input style="color: black;" class="form-username form-control" type="file">-->
                                        <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->
                                    </div>
                                    <div class="form-bottom">


                                        <div id="no-more-tables">
                                            <!--WICPLANNER APARECE AQUI-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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



