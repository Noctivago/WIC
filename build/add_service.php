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
                    
                    <button type="submit" class="btn btn-rounded btn-file">add picture <input class="btn-file" type="file"/> </button>
                    <header class="sign-title">Add a new Service </header>
                    
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" placeholder=" Service Name"/>
                        <i class="font-icon font-icon-user"></i>
                        </div>
                    </div>

                    
                    <div >
                                    <select class="bootstrap-select bootstrap-select-arrow" placeholder="Country">
					<option>Country</option>
					<option>Country</option>
					<option>Country</option>
                                        <option>Country</option>
                                        <option>Long long long extra long example line long long long extra long example line </option>
                                    </select>
				
                                
                    </div>
                    
                    <div>
                                    <select class="bootstrap-select bootstrap-select-arrow" placeholder="Country">
					<option>Country</option>
					<option>Country</option>
					<option>Country</option>
                                        <option>Country</option>
                                        <option>Long long long extra long example line long long long extra long example line </option>
                                    </select>
				
                                
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
                    
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Add a new service!</button>
                    
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
        
        
                <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
	<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
	<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="js/lib/select2/select2.full.min.js"></script>
</body>
</html>