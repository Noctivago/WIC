<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
include_once '../build/db/functions.php';
$msg = "";
?>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    //falta alterar foto
    $userId = $_SESSION['id'];
    if (isset($_POST['save']) && !empty($_POST['first']) && !empty($_POST['last'])) {

        $firstName = (filter_var($_POST ['first'], FILTER_SANITIZE_STRING));
        $lastName = (filter_var($_POST ['last'], FILTER_SANITIZE_STRING));
        $msg = DB_UpdateUserInformation($pdo, $userId, $firstName, $lastName);

        $target_file = $target_dir . basename($_FILES["Photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["Photo"]["tmp_name"]);
            if ($check !== false) {
                $msg = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }
            if ($_FILES["Photo"]["size"] > 500000) {
                $msg = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg = "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else {
                    $msg = "Sorry, there was an error uploading your file.";
                }
            }
        }

//        $uploadDir = './img/pics/'; //Image Upload Folder
//        $fileName = $_FILES['Photo']['name'];
//        $tmpName = $_FILES['Photo']['tmp_name'];
//        $fileSize = $_FILES['Photo']['size'];
//        //FALTA VALIDAR FILE TIPE E FILE SIZE
//        $fileType = $_FILES['Photo']['type'];
//        $temp = explode(".", $_FILES["file"]["name"]);
//        $newfilename = generateActivationCode() . '_' . $userId . '.jpg';
//        #$filePath = $uploadDir . $fileName;
//        $filePath = $uploadDir . $newfilename;
//        #$result = move_uploaded_file($tmpName, $filePath);
//        $result = move_uploaded_file($tmpName, $filePath);
//        $pic = $filePath;
//        if (!$result) {
//            $msg = "Error uploading file";
//            exit;
//        } else {
//            if (!get_magic_quotes_gpc()) {
//                $fileName = addslashes($fileName);
//                $filePath = addslashes($filePath);
//            }
//            //REMOVE ATUAL
//            #$msg = DB_addUserProfilePicture($pdo, $filePath, $userId);
//            $msg = DB_addUserProfilePicture($pdo, $pic, $userId) . ' > ' . $userId;
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"  style="max-width: 600px; width: 600px;">
                    <?php
                    DB_UserProfile($pdo, $userId);
                    echo $msg;
                    ?>
                    <!--                    <div class="sign-avatar no-photo" >
                                            <img id="image" src="" alt=""/>&plus;
                                        </div>
                                        <button type="submit" class="btn btn-rounded btn-file" onselect="change()">Change Picture <input class="btn-file" type="file"/> </button>
                                        <header class="sign-title">Edit Profile</header>
                                        <div class="form-group">
                                            <div class="form-control-wrapper form-control-icon-left" >
                                                    <input type="text" id="first-name" class="form-control" placeholder="First Name"/>
                                                <i class="font-icon font-icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control-wrapper form-control-icon-left" >
                                                <input type="text" id="last-name" class="form-control" placeholder="Last Name"/>
                                                <i class="font-icon font-icon-user"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-rounded btn-success sign-up">Save Changes</button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>
</html>