
<main class="cd-main-content">
<div class="content-wrapper">



<div class="top-content">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
    <div class="inner-bg">
        <div class="container">


            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top">

                                
                                <h3 style="color:black">Upload a different photo...</h3>

                            </div>

                        </div>

                        <div class="form-bottom">

                            <h3 style="color:black">  Edit Your Profle</h3>
                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Select an Image to upload</label>
                                    <input type="file" name="fileToUpload"  class="form-username form-control" id="fileToUpload" required autofocus>
                                </div>
                                <button type="submit" class="btn" name="submit">Save Changes!</button>

                            </form>
                        </div>



                    </div>

                    <!--                        <div class="col-sm-1 middle-border"></div>-->
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">
                        <br>
                        <br>
                         <?= DB_readOrganizationServiceBookAsTable($pdo, $_SESSION['id']); ?>



                    </div>
                </div>

            </div>
        </div>

    </div>
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



