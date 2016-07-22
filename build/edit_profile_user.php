<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//$msg = "";
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#images').on('change', function () {
            $('#multiple_upload_form').ajaxForm({
                target: '#images_preview',
                beforeSubmit: function (e) {
                    $('.uploading').show();
                },
                success: function (e) {
                    $('.uploading').hide();
                },
                error: function (e) {
                }
            }).submit();
        });
    });
</script>
<body>
    <?php
    //falta alterar foto
    $userId = $_SESSION['id'];
    if (isset($_POST['save']) && !empty($_POST['first']) && !empty($_POST['last'])) {
        $firstName = (filter_var($_POST ['first'], FILTER_SANITIZE_STRING));
        $lastName = (filter_var($_POST ['last'], FILTER_SANITIZE_STRING));
        $msg = DB_UpdateUserInformation($pdo, $userId, $firstName, $lastName);
        $images_arr = array();
        foreach ($_FILES['images']['name'] as $key => $val) {
            $image_name = $_FILES['images']['name'][$key];
            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $size = $_FILES['images']['size'][$key];
            $type = $_FILES['images']['type'][$key];
            $error = $_FILES['images']['error'][$key];

            ############ Remove comments if you want to upload and stored images into the "uploads/" folder #############

            $target_dir = "uploadsPP/";
            $target_file = $target_dir . $_FILES['images']['name'][$key];
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                $images_arr[] = $target_file;
            }

            //display images without stored
            //$extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
            //$images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  style="max-width: 600px; width: 600px;">
                    <?php
                    DB_UserProfile($pdo, $userId);
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