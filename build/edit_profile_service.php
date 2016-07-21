<?php
include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
?>

<body>
    	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.skinHTML5.css">

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid" style="padding-top: 100px;">
                <form class="sign-box"    style="max-width: 600px; width: 600px;">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <div class="form-group">
                        <button type="button" class="change">
				<i class="font-icon font-icon-picture-double"></i>
				Change Picture
				<input type="file"/>
                        </button>
                    </div>
                    <header class="sign-title">Edit Service Profile</header>
                    
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder=" Service Name"/>
                        <i class="font-icon font-icon-user"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder=" Service Categorie"/>
                        <i class="font-icon font-icon-earth"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder="Service Supplier"/>
                        <i class="font-icon font-icon-home"></i>
                        </div>
                    </div>
<!--                    <div class="form-group">
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
                    </div>-->
                        
                   <div class="form-group row">
                        
						<div class="form-control-wrapper form-control-icon-left" >
							<textarea rows="8" class="form-control" placeholder="Service Info"></textarea>
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

	<script src="js/lib/salvattore/salvattore.min.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
</body>
</html>