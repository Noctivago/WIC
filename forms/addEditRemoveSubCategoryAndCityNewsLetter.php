<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
#session_start();
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
        <title>ADD WIC PLANNER</title>

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
        
        <!--javascript-->
        <script src="../js/organization.js"></script>

    </head>

    <body onload="readAllUserNewsletter()">

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Add Sub Category and city newsletter</strong> </h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3 style="color:black">ADD Newsletter</h3>
                                         
                                    </div>
                                </div>

                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3 style="color:black">ADD Newsletter</h3>
                                        
                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['addNews'])&&!empty($_POST['subCategory']) && !empty($_POST['city'])) {
                                        $msg = '';
                                        try {
                                            #$d = getDateToDB();
                                            $subCategoryId = (filter_var($_POST ['subCategory'], FILTER_SANITIZE_EMAIL));
                                            $cityId = (filter_var($_POST ['city'], FILTER_SANITIZE_NUMBER_INT));
                                            $userId = $_SESSION['id'];
                                            $msg = DB_addUserNewsletter($pdo,$subCategoryId,$cityId,$userId);
                                            #$msg = ' NOME ' . $name . ' CITY ' . $city . ' USER ' . $userId . ' DATE ' . $d . ' EVENT DATE ' . $DB_Date;
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>	
                                    
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group">
                                            <select class="form-username form-control" name="city" id="city" required="required">
                                                <?= DB_getCityAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="subCategory" id="subCategory" required="required">
                                                <?= DB_readSubCategoryAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn" name="addNews">ADD Newsletter</button>
                                 </form>
                                </div>

                            </div>

                            <div class="social-login">

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
