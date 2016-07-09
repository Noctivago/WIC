<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
?>

<?
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
                                    $msg = '';
                                    $userId;
                                    // Check if image file is a actual image or fake image
                                    if (isset($_POST["submit"])) {
                                        $userId = $_SESSION['id'];
                                        //pasta do user para guardar a foto de perfil
                                        $uploadDir = '../pics/'; //Image Upload Folder
                                        $fileName = $_FILES['Photo']['name'];
                                        $tmpName = $_FILES['Photo']['tmp_name'];
                                        $fileSize = $_FILES['Photo']['size'];
                                        $fileType = $_FILES['Photo']['type'];
                                        $temp = explode(".", $_FILES["file"]["name"]);
                                        $newfilename = generateActivationCode() . '_' . $userId . '.' . end($temp);
                                        #$filePath = $uploadDir . $fileName;
                                        $filePath = $uploadDir . $newfilename;
                                        #$result = move_uploaded_file($tmpName, $filePath);
                                        $result = move_uploaded_file($tmpName, $filePath);
                                        $pic = $filePath;
                                        if (!$result) {
                                            $msg = "Error uploading file";
                                            exit;
                                        } else {
                                            if (!get_magic_quotes_gpc()) {
                                                $fileName = addslashes($fileName);
                                                $filePath = addslashes($filePath);
                                            }

                                            #$msg = DB_addUserProfilePicture($pdo, $filePath, $userId);
                                            $msg = DB_addUserProfilePicture($pdo, $pic, $userId);
                                        }
                                    }
                                    ?>
                                    <div class = "form-group"><h4> <?php echo $msg; ?></h4>
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="login-form">
                                            Select image to upload:
                                            <input type="file" name="Photo" id="fileToUpload" required="">
                                            <input type="submit" value="Upload Image" name="submit">
                                        </form>
                                    </div>
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
