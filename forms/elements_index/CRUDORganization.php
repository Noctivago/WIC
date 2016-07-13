<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">

        <div class="top-content">
            <div class="col-lg-12">
                <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Organization </h1> <h4 style="color: darkgray"> <?php echo $msg; ?></h4>

            </div>
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
            <!--    <div class="inner-bg" style="padding-top: 0px">-->
            <div class="container">

                <!--            <div class="row">-->
                <div class="col-sm-8 col-lg-offset-2 text">
                    <!--            </div>-->
                </div>
                <div class="row">

                    <div class="col-sm-8 col-lg-offset-2 text-center">

                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">

                                </div>
                                <div class="form-top-right">
                                </div>
                                <!--                            <div class="form-top-right">
                                                                <i class="fa fa-key"></i>-->
    <!--                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                    <input style="color: black;" class="form-username form-control" type="file">-->
                                <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->

                            </div>


                            <div class="form-bottom">
                                <?php
                                if ((isset($_POST['addOrg']) || isset($_POST['update'])) && !empty($_POST['address']) && !empty($_POST['orgEmail'])) {
                                    $msg = '';
                                    try {
                                        $userid = $_SESSION['id'];
                                        $d = getDateToDB();
                                        $idOrg = (filter_var($_POST['org'], FILTER_SANITIZE_STRING));
                                        $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
                                        $phone = (filter_var($_POST ['phone'], FILTER_SANITIZE_STRING));
                                        $mobile = (filter_var($_POST ['mobile'], FILTER_SANITIZE_STRING));
                                        $address = (filter_var($_POST ['address'], FILTER_SANITIZE_STRING));
                                        $facebook = (filter_var($_POST ['facebook'], FILTER_SANITIZE_STRING));
                                        $twitter = (filter_var($_POST ['twitter'], FILTER_SANITIZE_STRING));
                                        $linkdin = (filter_var($_POST ['linkdin'], FILTER_SANITIZE_STRING));
                                        $orgEmail = (filter_var($_POST ['orgEmail'], FILTER_SANITIZE_EMAIL));
                                        $website = (filter_var($_POST ['website'], FILTER_SANITIZE_STRING));
                                        $msg = DB_addOrganization($pdo, $userid, $idOrg, $name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $d);
                                        echo $msg;
                                    } catch (Exception $ex) {
                                        $msg = "ERROR!";
                                    }
                                } else if (isset($_POST['delete'])) {
                                    
                                }
                                ?>

                                <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                    <div class="form-group" id="org-sel">
                                        <h4> <?php echo $msg; ?></h4>
                                        <select class="form-username form-control" name="org" id="org" onchange="readDataOrganization()">
                                            <?= DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-username">Company Name:</label>-->
                                        <input type="text" name="name" placeholder="ORGANIZATION NAME" class="form-username form-control" id="name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Telephone:</label>-->
                                        <input type="text" name="phone" placeholder="ORGANIZATION PHONE" class="form-password form-control" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Mobile Number:</label>-->
                                        <input type="text" name="mobile" placeholder="ORGANIZATION MOBILE" class="form-password form-control" id="mobile" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Adress:</label>-->
                                        <input type="text" name="address" placeholder="ORGANIZATION ADDRESS" class="form-password form-control" id="address" >
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Facebook:</label>-->
                                        <input type="text" name="facebook" placeholder="ORGANIZATION FACEBOOK" class="form-password form-control" id="facebook" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Twitter:</label>-->
                                        <input type="text" name="twitter" placeholder="ORGANIZATION TWITTER" class="form-password form-control" id="twitter" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-username">Linkedin</label>-->
                                        <input type="text" name="linkdin" placeholder="ORGANIZATION LINKDIN" class="form-password form-control" id="linkdin" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Email of Organization:</label>-->
                                        <input type="email" name="orgEmail" placeholder="ORGANIZATION EMAIL" class="form-password form-control" id="orgEmail" required>
                                    </div>

                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">WebSite:</label>-->
                                        <input type="text" name="website" placeholder="ORGANIZATION WEBSITE" class="form-password form-control" id="website" required>
                                    </div>
                                    <button type="submit" id="addOrg" class="btn" name="addOrg" visible="true">NEW ORGANIZATION!</button>
                                    
                                    <div class="form-inline">
                                    
                                    <button type="submit" id="update" class="btn" name="update"  style="display: none; width: 140px;" >Save</button>
                                    
                                  
                                    <button type="submit" id="delete" class="btn" name="delete" onclick="removeOrganization()"  style="display: none; width: 140px;" >Delete</button>
                                    </div>
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



                    <!--                        <div class="col-sm-1 middle-border"  >
                                            </div>                   
                                            <div class="col-sm-1"></div>-->


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

<script src="../../js/organization.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



