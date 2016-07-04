<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
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
        <title>SERVICE PAGE</title>

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
                            <h1><strong>SERVICE ADD</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['addService']) && !empty($_POST['name']) && !empty($_POST['description'])) {
                                        $msg = '';
                                        try {
                                            $nome = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
                                            $description = (filter_var($_POST ['description'], FILTER_SANITIZE_STRING));
                                            $subCategoryId = (filter_var($_POST ['subCategory'], FILTER_SANITIZE_NUMBER_INT));
                                            $msg = DB_addService($pdo, $nome, $description, $subCategoryId);
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <input type="text" name="name" placeholder="SERVICE NAME" class="form-username form-control" id="form-name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="description" placeholder="SERVICE DESCRIPTION" class="form-password form-control" id="description" required>
                                        </div>
                                        <div class='form-group'>
                                            <select class="form-control" name="subCategory" id="subCategory" required="required">
                                                <?= DB_getSubCategoryAsSelect($pdo) ?> 
                                            </select>
                                        </div>
                                        <button type="submit" class="btn" name="addService">Add Service!</button>
                                    </form>
                                </div>
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
