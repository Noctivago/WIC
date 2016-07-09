<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

 <?php
                                    $userid = $_SESSION['id'];
                                    if (isset($_POST['addOrg']) && !empty($_POST['address']) && !empty($_POST['orgEmail'])) {
                                        $msg = '';
                                        try {
                                            $d = getDateToDB();
                                            $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
                                            $phone = (filter_var($_POST ['phone'], FILTER_SANITIZE_STRING));
                                            $mobile = (filter_var($_POST ['mobile'], FILTER_SANITIZE_STRING));
                                            $address = (filter_var($_POST ['address'], FILTER_SANITIZE_STRING));
                                            $facebook = (filter_var($_POST ['facebook'], FILTER_SANITIZE_STRING));
                                            $twitter = (filter_var($_POST ['twitter'], FILTER_SANITIZE_STRING));
                                            $linkdin = (filter_var($_POST ['linkdin'], FILTER_SANITIZE_STRING));
                                            $orgEmail = (filter_var($_POST ['orgEmail'], FILTER_SANITIZE_EMAIL));
                                            $website = (filter_var($_POST ['website'], FILTER_SANITIZE_STRING));
                                            $msg = DB_addOrganization($pdo, $userid, $name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $d);
                                        } catch (Exception $ex) {
                                            $msg = "ERROR!";
                                        }
                                    }
                                    ?>	

                                   
<body >
<main class="cd-main-content">
<div class="content-wrapper">



<div class="top-content">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
    <div class="inner-bg">
        <div class="container">
            
<!--            <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 style="color: darkgray"><strong>NEW ORGANIZATION</strong> </h1>
            </div>-->


<div class="row" style="color: #000" onload="viewAllOrganization(<?= $userid ?>)">
                <h1 style="color: darkgray"><strong>NEW ORGANIZATION</strong> </h1>
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top">

                                <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                <input type="file" class="text-center center-block well well-sm" style="color:black">
                                <!--<h6 style="color:black">Upload a different photo...</h6>-->

                            </div>
                            <!--                            <div class="form-top-right">
                                                            <i class="fa fa-key"></i>
                                                        </div>-->
                        </div>

                        <div class="form-bottom">
                            <h3 style="color:black">  New Organization</h3>
                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <input type="text" name="name" placeholder="ORGANIZATION NAME" class="form-username form-control" id="name" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="ORGANIZATION PHONE" class="form-password form-control" id="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" placeholder="ORGANIZATION MOBILE" class="form-password form-control" id="mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" placeholder="ORGANIZATION ADDRESS" class="form-password form-control" id="address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="facebook" placeholder="ORGANIZATION FACEBOOK" class="form-password form-control" id="facebook" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="twitter" placeholder="ORGANIZATION TWITTER" class="form-password form-control" id="twitter" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="linkdin" placeholder="ORGANIZATION LINKDIN" class="form-password form-control" id="linkdin" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="orgEmail" placeholder="ORGANIZATION EMAIL" class="form-password form-control" id="orgEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="website" placeholder="ORGANIZATION WEBSITE" class="form-password form-control" id="website" required>
                                        </div>
                                        <button type="submit" id="add" class="btn" name="addOrg" visible="true">NEW ORGANIZATION!</button>
                                        <button type="submit" id="cancel" class="btn" name="Cancel" style="display: none;"> Cancel </button>
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
</main>


    <script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>


</body>

