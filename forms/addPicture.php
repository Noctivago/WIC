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
        <title>UPLOAD PICTURE</title>

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
                            <h1><strong>UPLOAD PICTURE</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['addPicture']) && !empty($_POST['file'])) {
                                        $msg = '';
                                        try {
                                            $d = getDateToDB();
                                            $picture = (filter_var($_POST ['file'], FILTER_SANITIZE_STRING));
                                            $file_exts = array("jpg", "bmp", "gif", "png");
                                            $upload_exts = end(explode(".", $_FILES["file"]["name"]));
                                            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts)) {
                                                if ($_FILES["file"]["error"] > 0) {
                                                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                                } else {
                                                    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                                    echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                                    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
// Enter your path to upload file here
                                                    if (file_exists('../pics/' .
                                                                    $_FILES["file"]["name"])) {
                                                        echo "<div class='error'>" . "(" . $_FILES["file"]["name"] . ")" .
                                                        " already exists. " . "</div>";
                                                    } else {
                                                        move_uploaded_file($_FILES["file"]["tmp_name"], "c:\wamp\www\upload/newupload/" . $_FILES["file"]["name"]);
                                                        echo "<div class='sucess'>" . "Stored in: " .
                                                        "../pics/" . $_FILES["file"]["name"] . "</div>";
                                                    }
                                                }
                                            } else {
                                                echo "<div class='error'>Invalid file</div>";
                                            }
                                            $msg = DB_addOrganizationServiceBook($pdo, $name, $description, $d, $orgSerId);
                                        } catch (Exception $ex) {
                                            $msg = "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">



                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <label for="file"><span class="IL_AD" id="IL_AD4">Filename</span>:</label>
                                            <input type="file" name="file" id="file"><br>
                                        </div>
                                        <button type="submit" class="btn" name="addPicture">UPLOAD PICTURE!</button>
                                    </form>
                                </div>
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
