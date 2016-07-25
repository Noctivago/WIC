<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
$msg = '';
?>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    //FUTURAMENTE COLOCAR SE USER IN SERVICE PODE EDITAR
    if ($_SESSION['role'] === 'user') {
        header("location: ../build/index.php");
    }
    //falta alterar foto
    $userId = $_SESSION['id'];
    //&& !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email'])
    if (isset($_POST['save']) && !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email'])) {
        $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
        $address = (filter_var($_POST ['address'], FILTER_SANITIZE_STRING));
        $phone = (filter_var($_POST ['phone'], FILTER_SANITIZE_STRING));
        $mobile = (filter_var($_POST ['mobile'], FILTER_SANITIZE_STRING));
        $website = (filter_var($_POST ['website'], FILTER_SANITIZE_STRING));
        $facebook = (filter_var($_POST ['facebook'], FILTER_SANITIZE_STRING));
        $linkdin = (filter_var($_POST ['linkdin'], FILTER_SANITIZE_STRING));
        $twitter = (filter_var($_POST ['twitter'], FILTER_SANITIZE_STRING));
        $description = (filter_var($_POST ['description'], FILTER_SANITIZE_STRING));
        $msg = DB_UpdateOrgInformation($pdo, $name, $email, $address, $phone, $mobile, $website, $facebook, $linkdin, $twitter, $description, $userId);
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

                if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'pics/' . $newfilename)) {
                    die('Error uploading file - check destination is writeable.');
                } else {
                    $picture_path = 'pics/' . $newfilename;
                    //filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
                    DB_UpdateOrgPictureInformation($pdo, $userId, $picture_path);
                    $name = '';
                    $msg = ('File uploaded successfully.');
                }
            }
        }
    }
    ?>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid" style="padding-top: 100px;">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <?php
                    DB_OrgProfile($pdo, $userId);
                    ?>
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