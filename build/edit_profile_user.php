<?php
//include ("includes/head_sideMenu.php");
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
        //FALTA ACERTAR NISTO
        $name = $_FILES['file_upload']['name'];
        $newfilename = $userId . '.jpg';
        if (isset($name)) {
            if (!empty($name)) {
                // Check for errors
                if ($_FILES['file_upload']['error'] > 0) {
                    die('An error ocurred when uploading.');
                }
                if (!getimagesize($_FILES['file_upload']['tmp_name'])) {
                    die('Please ensure you are uploading an image.');
                }
                // Check filetype
                if ($_FILES['file_upload']['type'] != 'image/png') {
                    die('Unsupported filetype uploaded.');
                }
                // Check filesize
                if ($_FILES['file_upload']['size'] > 500000) {
                    die('File uploaded exceeds maximum upload size.');
                }
                // Check if the file exists
//                if (file_exists('pics/' . $_FILES['file_upload']['name'])) {
//                    die('File with that name already exists.');
//                }
                // Upload file
//                if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'pics/' . $_FILES['file_upload']['name'])) {
                if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'pics/' . $newfilename)) {
                    die('Error uploading file - check destination is writeable.');
                } else {
                    $picture_path = 'pics/' . $newfilename;
                    DB_UpdateUserPictureInformation($pdo, $userId, $picture_path);
                    $msg = ('File uploaded successfully.');
                }
            }
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <?php
                    DB_UserProfile($pdo, $userId);
                    ?>
                </form>
                <?= $msg; ?>
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
