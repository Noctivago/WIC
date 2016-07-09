<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
?>
<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>

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

                                        <!-- GET USER PICS PATH -->
                                        <!--<img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">-->
                                        <p><?= DB_getUserProfilePicture($pdo, $_SESSION['id']) ?><p>
                                            <input type="file" class="text-center center-block well well-sm" style="color:black">
                                            <!--<h6 style="color:black">Upload a different photo...</h6>-->

                                    </div>
                                    <!--                            <div class="form-top-right">
                                                                    <i class="fa fa-key"></i>
                                                                </div>-->
                                </div>

                                <div class="form-bottom">
                                    <h3 style="color:black">  Edit Your Profle</h3>
                                    <form role="form" action="" method="post" class="login-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">First Name</label>
                                            <input type="text" name="email" placeholder="First Name" class="form-username form-control" id="form-username" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Last Name</label>
                                            <input type="text" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Email</label>
                                            <input type="text" name="email" placeholder="youremail@email.com" class="form-username form-control" id="form-username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Country:</label>
                                            <input type="text" name="password" placeholder="Choose your Country" class="form-password form-control" id="form-password" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">City:</label>
                                            <input type="password" name="password" placeholder="Choose your City" class="form-password form-control" id="form-password" required disabled="">
                                        </div>
                                        <button type="submit" class="btn" name="login">Save Changes!</button>

                                    </form>
                                </div>



                            </div>

                            <!--                        <div class="col-sm-1 middle-border"></div>-->
                            <div class="col-sm-1"></div>

                            <div class="col-sm-5">



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



