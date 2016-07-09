<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NEW ORGANIZATION SERVICE</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

         <!-- javascripto-->
         <script src="../js/OrganizationUsers.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
       
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Users in organization</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['addOrgSer']) && !empty($_POST['name']) ) {
                                        $msg = '';
                                        try {
                                            $d = getDateToDB();
                                            $userid = $_SESSION['id'];
                                            $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
                                            $description = (filter_var($_POST ['description'], FILTER_SANITIZE_STRING));
                                            $org = (filter_var($_POST ['org'], FILTER_SANITIZE_STRING));
                                            $subCategory = (filter_var($_POST ['subCategory'], FILTER_SANITIZE_STRING));
                                            $city = (filter_var($_POST ['city'], FILTER_SANITIZE_STRING));
                                            $msg = DB_addOrganizationService($pdo, $name, $description, $org, $subCategory, $city, $d);
                                        } catch (Exception $ex) {
                                            $msg = "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <select class="form-username form-control" name="org" id="org" required="required">
                                                <?= DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email-user" placeholder="User email" class="form-password form-control" id="email-user" required>
                                        </div>
                                        <button type="submit" class="btn" name="send-invite" onclick="assignUserInOrganization()">Send invite to join organization</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">
                            <br>
                            <br>
                            <?= DB_readOrganizationServiceAsTable($pdo, $_SESSION['id']); ?>
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
