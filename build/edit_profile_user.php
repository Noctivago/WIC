<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
include_once '../build/db/functions.php';
$msg = "";
?>
<body>
    <?php
    //falta alterar foto
    $userId = $_SESSION['id'];
    if ($_SESSION['role'] === 'organization') {
        header("location: ../build/edit_profile_org.php");
    }
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
                if ($_FILES['uploadFile']['error'] > 0) {
                    die('An error ocurred when uploading.');
                }
                if (!getimagesize($_FILES['uploadFile']['tmp_name'])) {
                    die('Please ensure you are uploading an image.');
                }
                // Check filesize
                if ($_FILES['uploadFile']['size'] > 2000000) {
                    die('File uploaded exceeds maximum upload size.');
                }
                if (!move_uploaded_file($_FILES['uploadFile']['tmp_name'], 'pics/' . $newfilename)) {
                    die('Error uploading file - check destination is writeable.');
                } else {
                    $picture_path = 'pics/' . $newfilename;
                    //filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
                    $msg = DB_UpdateUserPictureInformation($pdo, $userId, $picture_path);
                    //$msg = ('File uploaded successfully.');
                }
            }
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" style="width: 100%; max-width:500px;">
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



    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>
</body>
</html>
