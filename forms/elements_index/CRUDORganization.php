
<main class="cd-main-content">
<div class="content-wrapper" style="padding-left: 0%">

<div class="top-content">
                 <div class="col-lg-12">
                 <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;"> New  Organization For YOU <h4> <?php echo $msg; ?></h4>
                 </h1>
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
                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                <input style="color: black;" class="form-username form-control" type="file">
                                <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->

                                                       </div>
                        

                        <div class="form-bottom">

                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
<!--                               <div class="form-group" id="org-sel">
                                                    <h4> <?php echo $msg; ?></h4>
                                                    <select class="form-username form-control" name="org" id="org" onchange="readDataOrganization()">
                                                        <?= DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                                    </select>
                                 </div>-->
                                
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Company Name:</label>
                                    <input type="text" style="height: 40px" name="email" placeholder="First Name" class="form-username form-control" id="form-username" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Adress:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Web Site:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Facebook:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Twitter:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Linkedin:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Email</label>
                                    <input type="text" style="height: 40px" name="email" placeholder="youremail@email.com" class="form-username form-control" id="form-username" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Country:</label>
                                    <input type="text" style="height: 40px" name="password" placeholder="Choose your Country" class="form-password form-control" id="form-password" required>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-password">City:</label>
                                    <input type="password" style="height: 40px" name="password" placeholder="Choose your City" class="form-password form-control" id="form-password" required disabled="">
                                </div>
                                <button type="submit" class="btn" name="login">Save Changes!</button>

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



