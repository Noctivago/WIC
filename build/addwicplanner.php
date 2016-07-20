<!DOCTYPE html>
<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>
<body>


    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Add new Wic Planner</header>
                    <div class="form-group">
                        <input type="text" id = "email" name ="Wic Planner Name" class="form-control" placeholder="Wic Planner Name" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" id ="pw1" name="City" class="form-control" placeholder="City" required/>
                    </div>
                    <div class="form-group">
                        <input type="date" id="pw2" name = "date" class="form-control" placeholder="Date" required/>
                    </div>
                    <div class='input-group date'>
									<input id="daterange3" type="text" value="10/24/1984" class="form-control">
									<span class="input-group-addon">
										<i class="font-icon font-icon-calend"></i>
									</span>
                    </div>
                    
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="signup" class="btn btn-rounded btn-success sign-up">Add Wic Planner</button>
                    
                    
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <!-- RECHAPTA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
