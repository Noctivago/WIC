<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
?>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <?php
                if (isset($_POST['save']) && isset($_POST['first-name']) && isset($_POST['last-name'])) {
                    echo 'ja foste';
                    //$foto
                    $first = (filter_var($_POST ['first-name'], FILTER_SANITIZE_STRING));
                    $last = (filter_var($_POST ['last-name'], FILTER_SANITIZE_STRING));
                    $sId = $_SESSION['id'];
                    sql($pdo, "UPDATE [dbo].[User_Profile]
   SET [First_Name] = ?
      ,[Last_Name] = ?
 WHERE [User_Id] =? ", array($first, $last, $sId));
                }  
                ?>
                <form class="sign-box"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"  style="max-width: 600px; width: 600px;">
                    <?php
                    $userId = $_SESSION['id'];
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