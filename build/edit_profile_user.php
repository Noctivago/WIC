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
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Name"/>
                        <i class="font-icon font-icon-user"></i>
                        </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Telephone Number"/>
                        <i class="font-icon font-icon-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="My WebSite"/>
                        <i class="font-icon font-icon-earth-bordered"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Facebook Account"/>
                        <i class="font-icon font-icon-facebook"></i>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Linkedin Account"/>
                        <i class="font-icon font-icon-linkedin"></i>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Twitter Account"/>
                        <i class="font-icon font-icon-twitter"></i>
                        </div>
                   <div class="form-group row">
                        
						<div class="form-control-wrapper form-control-icon-left" >
							<textarea rows="4" class="form-control" placeholder="Personal Info"></textarea>
                                                        <i class="font-icon font-icon-user"></i>
						</div>
                    </div>
                    
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Save Changes</button>
                    
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