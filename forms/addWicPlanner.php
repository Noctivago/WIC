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

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>ADD WIC PLANNER</strong> </h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3 style="color:black">ADD WIC PLANNER</h3>

                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['addWic']) && !empty($_POST['name']) && !empty($_POST['city'])) {
                                        $msg = '';
                                        try {
                                            $d = getDateToDB();
                                            $name = (filter_var($_POST ['name'], FILTER_SANITIZE_EMAIL));
                                            $city = (filter_var($_POST ['city'], FILTER_SANITIZE_NUMBER_INT));
                                            $userId = $_SESSION['id'];
                                            $eventDate = (filter_var($_POST ['eventDate'], FILTER_SANITIZE_STRING));
                                            $eventTime = (filter_var($_POST ['eventTime'], FILTER_SANITIZE_STRING));
                                            $msg = DB_addWicPlanner($pdo, $name, $city, $userId, $d, $eventDate, $eventTime);
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <input type="text" name="name" placeholder="WIC PLANNER NAME" class="form-username form-control" id="name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="city" id="city" required="required">
                                                <?= DB_getCityAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="eventDate" placeholder="EVENT DATE" class="form-password form-control" id="eventDate" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="eventTime" placeholder="EVENT TIME" class="form-password form-control" id="eventTime" required>
                                        </div>
                                        <button type="submit" class="btn" name="addWic">ADD WIC PLANNER!</button>

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
