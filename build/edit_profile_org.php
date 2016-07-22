<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';

$msg = '';
?>

<body>
    <?php
    //falta alterar foto
    $userId = $_SESSION['id'];
  //&& !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email'])
    if (isset($_POST['save'])) {
        $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_STRING));
        $address = (filter_var($_POST ['address'], FILTER_SANITIZE_STRING));
        $phone = (filter_var($_POST ['phone'], FILTER_SANITIZE_STRING));
        $mobile = (filter_var($_POST ['mobile'], FILTER_SANITIZE_STRING));
        $website = (filter_var($_POST ['website'], FILTER_SANITIZE_STRING));
        $facebook = (filter_var($_POST ['facebook'], FILTER_SANITIZE_STRING));
        $linkdin = (filter_var($_POST ['linkdin'], FILTER_SANITIZE_STRING));
        $twitter = (filter_var($_POST ['twitter'], FILTER_SANITIZE_STRING));
        $description = (filter_var($_POST ['description'], FILTER_SANITIZE_STRING));
        $msg = DB_UpdateOrgInformation($pdo,$name,$email,$address,$phone,$mobile,$website,$facebook,$linkdin,$twitter,$description,$userId);
        
    }
    ?>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid" style="padding-top: 100px;">
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  style="max-width: 600px; width: 600px;">
                    <?php
                    DB_OrgProfile($pdo, $userId)
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