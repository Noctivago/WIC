<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
?>
<?php
include ("includes/head_sideMenu.php");
?>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Edit Profile</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telephone Number"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="My WebSite"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Facebook Account"/>
                    </div>
                    <div class="form-group">
                         
                        <input type="text" class="form-control" placeholder="Linkedin Account"/>
                    </div>
                    <div class="form-group">
                         
                        <input type="text" class="form-control" placeholder="Twitter Account"/>
                    </div>
                   <div class="form-group row">
                        
						<div class="form-control-wrapper form-control-icon-left" >
							<textarea rows="4" class="form-control" placeholder="Personal Info"></textarea>
                                                        <i class="font-icon font-icon-user"></i>
						</div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Repeat password"/>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Sign up</button>
                    <p class="sign-note">Already have an account? <a href="sign_in.php">Sign in</a></p>
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
</body>
</html>