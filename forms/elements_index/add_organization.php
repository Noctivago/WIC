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

                                   
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NEW ORGANIZATION</title>

        <!-- CSS -->




        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
       
    </head>
<!---->
    <body onload="viewAllOrganization(<?= $userid ?>)">
        

        <!-- Top content -->
        
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>NEW ORGANIZATION</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
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

                        </div>

                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <div class="col-sm-1" ></div>

                        <div class="col-sm-5" id="orgresp">
                            <br>
                            <br>
                            <!--?= DB_readOrganizationAsTable($pdo, $_SESSION['id']); ?-->
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/scripts.js" type="text/javascript"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>


</html>
