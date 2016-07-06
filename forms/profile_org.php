<?php
//
include_once ('session.php');
include_once ('../db/conn.inc.php');
#session_start();
?>

<!--<html>
    <head>
        <title> Home </title>
    </head>
    <body>

        <?php
        echo 'Welcome ' . $_SESSION['username'] . '<br>';
        echo 'Profile ' . '<br>';
        echo '<br>';
        echo '<br>';
        echo "<a href='service.php'> AddService</a> ";
        echo "<a href='logout.php'> Logout</a> ";
        ?>
        
    </body>
</html>-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Faceboot - A Facebook style template for Bootstrap</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
<!--                <link href="../assets/css_profile_org/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		[if lt IE 9]>
  
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]
		-->
                <link href="../assets/css_profile_org/styles.css" rel="stylesheet" type="text/css"/>
	</head>
<?php
include("elements_index/head_index.php");
?>
	<body>
            <?php
            include("elements_index/header_index.php");
            ?>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
            

                      
          
            <!-- sidebar -->
<!--            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
                    <li class="active"><a href="#featured"><i class="glyphicon glyphicon-list-alt"></i> Featured</a></li>
                    <li><a href="#stories"><i class="glyphicon glyphicon-list"></i> Stories</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-paperclip"></i> Saved</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="http://www.bootply.com"><h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply</a>
                    </li>
                </ul>
              
              	 tiny only nav
              <ul class="nav visible-xs" id="xs-menu">
                  	<li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
                  	<li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                </ul>
              
            </div>-->
            <!-- /sidebar -->
            <?php
            include ("elements_index/main_index.php");
            ?>
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                 top nav 
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="/" class="navbar-brand logo">b</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"> <i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
                      <li>
                        <a href="#"><span class="badge">badge</span></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href=""  class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                                            	
  <div class="container" style="text-align:center;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Organization info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Username:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text">
          </div>
        </div>
           <div class="form-group">
          <label class="col-lg-3 control-label">Company:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
           <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text">
          </div>
        </div>
           <div class="form-group">
          <label class="col-lg-3 control-label">Address:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Website:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Facebook:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Twitter:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
       <div class="form-group">
          <label class="col-lg-3 control-label">Linkedin:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Country:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_contry" class="form-control">
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
                           		
                           
                          </div>
                          
                          <!-- main col right -->
                          <div class="col-sm-4">
                               
                                
                       
                                
                                    
                                  </div>
                               </div>

                          </div>
                       </div><!--/row-->
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            
                          </div>
                        </div>
                    
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
