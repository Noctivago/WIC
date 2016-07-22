<!DOCTYPE html>
<?php
include_once 'includes/head_singleforms.php';
include_once './db/dbconn.php';
include_once './db/session.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
$msg ='';
?>

<body>
    <?php
    if (isset($_POST['changePassword']) && !empty($_POST['apw']) && !empty($_POST['pw1']) && !empty($_POST['pw2'])) {
        $msg = '';
        $aPW = (filter_var($_POST ['apw'], FILTER_SANITIZE_STRING));
        $PW1 = (filter_var($_POST ['pw1'], FILTER_SANITIZE_STRING));
        $PW2 = (filter_var($_POST ['pw2'], FILTER_SANITIZE_STRING));
        $sId = $_SESSION['id'];
        if ($PW1 != $PW2) {
            $msg = "PASSWORD & RETYPE PASSWORD DOES NOT MATCH!";
        } else {
            $hashPassword = hash('whirlpool', $aPW);
            $newPassword = hash('whirlpool', $PW1);
            if (DB_getUserPW($pdo, $sId, $hashPassword)) {
                $msg = DB_changeUserPW($pdo, $newPassword, $sId);
            } else {
                $msg = "ATUAL PASSWORD IS NOT CORRECT!";
            }
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box reset-password-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <!--<div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>-->
                    <header class="sign-title">New Password</header>
                    <div class="form-group">
                        <input type="password" id="apw" name ="apw" class="form-control" placeholder="Actual Password" required/>
                    </div> 
                    <div class="form-group">
                        <input type="password" id="pw1" name ="pw1" class="form-control" placeholder="New Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pw2" name ="pw2" class="form-control" placeholder="Confirm New Password" required/>
                    </div>
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="changePassword" class="btn btn-rounded btn-block">Submit</button>
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