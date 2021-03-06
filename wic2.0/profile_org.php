<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>

        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png">
        <link href="img/wic_logo.png" rel="icon" type="image/png">
        <link href="img/wic_logo.png" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
        <link href="css/lib/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    
    
</head>
<body class="with-side-menu control-panel control-panel-compact">

	<header class="site-header">
	    <div class="container-fluid">
                <a href="index_teste.php" class="site-logo">
                    
	            <img class="hidden-md-down" src="img/wic_logo.png" alt="">
                    <img class="hidden-lg-up" src="img/wic_logo.png" alt="">
                    
	        </a>
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
                            
                            	
                            
	                    <div class="dropdown dropdown-notification notif">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
	                            <div class="dropdown-menu-notif-list">
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-1.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Morgan</a> was bothering about something
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
                                                   href="messenger.php"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>

	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>

	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>

	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="messenger.php">See more</a>
	                            </div>
	                        </div>
	                    </div>
                            

                            
                            
	
<!--	                    <div class="dropdown dropdown-lang">
	                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="flag-icon flag-icon-us"></span>
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ru"></span>Русский</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-de"></span>Deutsch</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-it"></span>Italiano</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-es"></span>Español</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-pl"></span>Polski</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-li"></span>Lietuviu</a>
	                            </div>
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item current" href="#"><span class="flag-icon flag-icon-us"></span>English</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-fr"></span>Français</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-by"></span>Беларускi</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ua"></span>Українська</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-cz"></span>Česky</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ch"></span>中國</a>
	                            </div>
	                        </div>
	                    </div>-->
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <a class="dropdown-item" href="profile_user.php"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                    <a class="dropdown-item" href="profile-edit.html"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                    <a class="dropdown-item" href="faq.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>


	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>

	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
                                
                                
	                        <div class="dropdown dropdown-typical">
	                            <!--<a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
	                            <a class="header" id="dd-header-marketing" data-target="#" href="#" >
	                                <!--<span class="font-icon font-icon-cogwheel"></span>-->
<!--                                        <h4 style="color: darkgray; font-family: cursive">You can event, event your life</h4>-->
                            <span style="color: darkgray; width: 200px;">You can event, event your life!</span>
	                            </a>
                                    <br>
                                    <br>
	
<!--	                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
	                                <a class="dropdown-item" href="#">Current Search</a>
	                                <a class="dropdown-item" href="#">Search for Issues</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Recent issues</div>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                                <div class="dropdown-more">
	                                    <div class="dropdown-more-caption padding">more...</div>
	                                    <div class="dropdown-more-sub">
	                                        <div class="dropdown-more-sub-in">
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#">Import Issues from CSV</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Filters</div>
	                                <a class="dropdown-item" href="#">My Open Issues</a>
	                                <a class="dropdown-item" href="#">Reported by Me</a>
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#">Manage filters</a>
	                                <div class="dropdown-divider"></div>
	                                <div class="dropdown-header">Timesheet</div>
	                                <a class="dropdown-item" href="#">Subscribtions</a>
	                            </div>-->
	                        </div>
<!--	                        <div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-social" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-share"></span>
	                                <span class="lbl">Social media</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-social">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                        <div class="dropdown dropdown-typical">
	                            <a href="#" class="dropdown-toggle no-arr">
	                                <span class="font-icon font-icon-page"></span>
	                                <span class="lbl">Projects</span>
	                                <span class="label label-pill label-danger">35</span>
	                            </a>
	                        </div>
	
-->	                        


<!--<div class="dropdown dropdown-typical">
	                            <a class="dropdown-toggle" id="dd-header-form-builder" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="font-icon font-icon-pencil"></span>
	                                <span class="lbl">Form builder</span>
	                            </a>
	
	                            <div class="dropdown-menu" aria-labelledby="dd-header-form-builder">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>-->





<!--	                        <div class="dropdown">
	                            <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                Add
	                            </button>
	                            <div class="dropdown-menu" aria-labelledby="dd-header-add">
	                                <a class="dropdown-item" href="#">Quant and Verbal</a>
	                                <a class="dropdown-item" href="#">Real Gmat Test</a>
	                                <a class="dropdown-item" href="#">Prep Official App</a>
	                                <a class="dropdown-item" href="#">CATprer Test</a>
	                                <a class="dropdown-item" href="#">Third Party Test</a>
	                            </div>
	                        </div>-->


<!--	                        <div class="help-dropdown"> PODE SER ÚTIL PARA O TUTORIAL
	                            <button type="button">
	                                <i class="font-icon font-icon-help"></i>
	                            </button>
	                            <div class="help-dropdown-popup">
	                                <div class="help-dropdown-popup-side">
	                                    <ul>
	                                        <li><a href="#">Getting Started</a></li>
	                                        <li><a href="#" class="active">Creating a new Event</a></li>
	                                        <li><a href="#">Adding Partners</a></li>
	                                        <li><a href="#">Settings</a></li>
	                                        <li><a href="#">Importing data</a></li>
	                                        <li><a href="#">Exporting data</a></li>
	                                    </ul>
	                                </div>
	                                <div class="help-dropdown-popup-cont">
	                                    <div class="help-dropdown-popup-cont-in">
	                                        <div class="jscroll">
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                How to creat an Event
	                                                <span class="describe">First Idealize your dream Event and then, chose the best services for you, by starting dealing with the suppliers!</span>
	                                            </a>
	                                            <a href="#" class="help-dropdown-popup-item">
	                                                Contrary to popular belief
	                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
	                                            </a>

	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>.help-dropdown
                                -->
                                
<!--	                        <a class="btn btn-nav btn-rounded btn-inline btn-danger-outline" href="http://themeforest.net/item/startui-premium-bootstrap-4-admin-dashboard-template/15228250">
	                            Buy Theme
	                        </a>-->



	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search a Service.."/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
                
                <section>
                     <header class="side-menu-title">Start Planning</header>
	        <li class="gray with-sub">
	            <span>
	                <i class="font-icon font-icon-earth-bordered"></i>
	                <span class="lbl">Space</span>
	            </span>
	            <span>
	                <i class="fa fa-spoon " ></i>
                        
	                <span class="lbl">Food</span>
	            </span>
	            <span>
	                <i class="fa fa-film"></i>
	                <span class="lbl">Entertainement</span>
	            </span>
	            <span>
	                <i class="fa fa-tree"></i>
	                <span class="lbl">Decoration</span>
	            </span>
	            <span>
	                <i class="font-icon font-icon-users-group"></i>
	                <span class="lbl">Staff</span>
	            </span>
	            <span>
	                <i class="font-icon glyphicon glyphicon-film"></i>
	                <span class="lbl">Audio Visual</span>
	            </span>
	            <span>
	                <i class="font-icon font-icon-cam-photo"></i>
	                <span class="lbl">Reportage Photo & Video</span>
	            </span>
<!-- TER EM ATNEÇÃO AO DEFAULT NEW , POR CAUSA DAS FUNCIONALIDADES IMPORTANTES-->
<!--	            <ul>
	                <li><a href="index.html"><span class="lbl">Default</span><span class="label label-custom label-pill label-danger">new</span></a></li>
	                <li><a href="#"><span class="lbl">Space</span></a></li>
	                <li><a href="#"><span class="lbl">Food</span></a></li>
	                <li><a href="#"><span class="lbl">Entertainement</span></a></li>
	                <li><a href="#"><span class="lbl">Decoration</span></a></li>
	                <li><a href="#"><span class="lbl">Staff</span></a></li>
	                <li><a href="#"><span class="lbl">Audio Visual</span></a></li>
	                <li><a href="#"><span class="lbl">Reportage Photo & Video</span></a></li>
	                

	            </ul>-->

	        </li>
                </section>
                
                <section>
                <header class="side-menu-title">My Team</header>

                <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Invite Members</header>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-Mail"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">

                    <button type="submit" class="btn btn-rounded">Invite</button>
                    
                    <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </form>
            </div>
                </section>
                
                
	        

	        <li class="gold with-sub">
	            <span>
	                <i class="font-icon font-icon-edit"></i>
	                <span class="lbl">Organization</span>
	            </span>

	        </li>
<!--	        <li class="blue-dirty">
	            <a href="tables.html">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Tables</span>
	            </a>
	        </li>-->
<!--	        <li class="magenta with-sub">
	            <span>
	                <span class="glyphicon glyphicon-list-alt"></span>
	                <span class="lbl">Datatables</span>
	            </span>
	            <ul>
	                <a href="datatables-net.html"><span class="lbl">Datatables.net</span></a></li>
	                <a href="bootstrap-datatables.html"><span class="lbl">Bootstrap Table</span></a></li>-->
	
<!--	                <li><a href="datatables.html"><span class="lbl">Default</span></a></li>
	                <li><a href="datatables-fixed-columns.html"><span class="lbl">Fixed Columns</span></a></li>
	                <li><a href="datatables-reorder-rows.html"><span class="lbl">Reorder Rows</span></a></li>
	                <li><a href="datatables-reorder-columns.html"><span class="lbl">Reorder Columns</span></a></li>
	                <li><a href="datatables-resize-columns.html"><span class="lbl">Resize Columns</span></a></li>
	                <li><a href="datatables-mobile.html"><span class="lbl">Mobile</span></a></li>
	                <li><a href="datatables-filter-control.html"><span class="lbl">Filters</span></a></li>-->
<!--	            </ul>
	        </li>-->
<!--	        <li class="green with-sub">
	            <span>
	                <i class="font-icon font-icon-widget"></i>
	                <span class="lbl">Components</span>
	            </span>
	            <ul>
	                <li><a href="widgets.html"><span class="lbl">Widgets</span></a></li>
	                <li><a href="elements.html"><span class="lbl">Bootstrap UI</span></a></li>
	                <li><a href="ui-datepicker.html"><span class="lbl">Date and Time Pickers</span></a></li>
	                <li><a href="components-upload.html"><span class="lbl">Upload</span></a></li>
	                <li><a href="sweet-alerts.html"><span class="lbl">SweetAlert</span></a></li>
	                <li><a href="tabs.html"><span class="lbl">Tabs</span></a></li>
	                <li><a href="panels.html"><span class="lbl">Panels</span></a></li>
	                <li><a href="notifications.html"><span class="lbl">Notifications</span></a></li>
	                <li><a href="range-slider.html"><span class="lbl">Sliders</span></a></li>
	                <li><a href="editor-summernote.html"><span class="lbl">Editors</span></a></li>
	                <li><a href="nestable.html"><span class="lbl">Nestable</span></a></li>
	                <li><a href="blockui.html"><span class="lbl">BlockUI</span></a></li>
	                <li><a href="alerts.html"><span class="lbl">Alerts</span></a></li>
	                <li><a href="player.html"><span class="lbl">Players</span></a></li>
	            </ul>
	        </li>-->
	     <!--   <li class="gold">
	            <a href="#">
	                <i class="font-icon font-icon-speed"></i>
	                <span class="lbl">Performance</span>
	            </a>
	        </li>-->
<!--	        <li class="pink-red">
	            <a href="activity.html">
	                <i class="font-icon font-icon-zigzag"></i>
	                <span class="lbl">Activity</span>
	            </a>
	        </li>-->
<!--	        <li class="blue with-sub">
	            <span>
	                <i class="font-icon font-icon-user"></i>
	                <span class="lbl">Profile</span>
	            </span>
	            <ul>
	                <li><a href="profile.html"><span class="lbl">Version 1</span></a></li>
	                <li><a href="profile-2.html"><span class="lbl">Version 2</span></a></li>
	            </ul>
	        </li>-->
<!--	        <li class="orange-red with-sub">
	            <span>
	                <i class="font-icon font-icon-help"></i>
	                <span class="lbl">Support</span>
	            </span>
	            <ul>
	                <li><a href="documentation.html"><span class="lbl">Docs (example)</span></a></li>
	                <li><a href="faq.html"><span class="lbl">FAQ Simple</span></a></li>
	                <li><a href="faq-search.html"><span class="lbl">FAQ Search</span></a></li>
	            </ul>
	        </li>-->
<!--	        <li class="red">
	            <a href="contacts.html" class="label-right">
	                <i class="font-icon font-icon-contacts"></i>
	                <span class="lbl">Contacts</span>
	                <span class="label label-custom label-pill label-danger">35</span>
	            </a>
	        </li>
	        <li class="magenta opened">
	            <a href="scheduler.html">
	                <i class="font-icon font-icon-calend"></i>
	                <span class="lbl">Calendar</span>
	            </a>
	        </li>
	        <li class="grey with-sub">
	            <span>
	                <span class="glyphicon glyphicon-duplicate"></span>
	                <span class="lbl">Pages</span>
	            </span>
	            <ul>
	                <li><a href="email_templates.html"><span class="lbl">Email Templates</span></a></li>
	                <li><a href="blank.html"><span class="lbl">Blank</span></a></li>
	                <li><a href="empty.html"><span class="lbl">Empty List</span></a></li>
	                <li><a href="prices.html"><span class="lbl">Prices</span></a></li>
	                <li><a href="typography.html"><span class="lbl">Typography</span></a></li>
	                <li><a href="sign-in.html"><span class="lbl">Login</span></a></li>
	                <li><a href="sign-up.html"><span class="lbl">Register</span></a></li>
	                <li><a href="reset-password.html"><span class="lbl">Reset Password</span></a></li>
	                <li><a href="new-password.html"><span class="lbl">New Password</span></a></li>
	                <li><a href="error-404.html"><span class="lbl">Error 404</span></a></li>
	                <li><a href="error-500.html"><span class="lbl">Error 500</span></a></li>
	                <li><a href="cards.html"><span class="lbl">Cards</span></a></li>
	                <li><a href="avatars.html"><span class="lbl">Avatars</span></a></li>
	                <li><a href="ribbons.html"><span class="lbl">Ribbons</span></a></li>
	                <li><a href="icons-startui.html"><span class="lbl">Icons</span></a></li>
	                <li><a href="invoice.html"><span class="lbl">Invoice</span></a></li>
	                <li><a href="helpers.html"><span class="lbl">Helpers</span></a></li>
	            </ul>
	        </li>
	        <li class="blue-dirty">
	            <a href="list-tasks.html">
	                <i class="font-icon font-icon-notebook"></i>
	                <span class="lbl">Tasks</span>
	            </a>
	        </li>
	        <li class="aquamarine">
	            <a href="contacts-page.html">
	                <i class="font-icon font-icon-mail"></i>
	                <span class="lbl">Contact form</span>
	            </a>
	        </li>
	        <li class="blue">
	            <a href="files.html">
	                <i class="font-icon glyphicon glyphicon-paperclip"></i>
	                <span class="lbl">File Manager</span>
	            </a>
	        </li>
	        <li class="gold">
	            <a href="gallery.html">
	                <i class="font-icon font-icon-picture-2"></i>
	                <span class="lbl">Gallery</span>
	            </a>
	        </li>
	        <li class="red">
	            <a href="project.html">
	                <i class="font-icon font-icon-case-2"></i>
	                <span class="lbl">Project</span>
	            </a>
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <span class="font-icon font-icon-chart"></span>
	                <span class="lbl">Charts</span>
	            </span>
	            <ul>
	                <li><a href="charts-c3js.html"><span class="lbl">C3.js</span></a></li>
	                <li><a href="charts-peity.html"><span class="lbl">Peity</span></a></li>
	                <li><a href="charts-plottable.html"><span class="lbl">Plottable.js</span></a></li>
	            </ul>
	        </li>
	        <li class="grey with-sub">
	            <span>
	                <span class="font-icon font-icon-burger"></span>
	                <span class="lbl">Nested Menu</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Level 1</span></a></li>
	                <li><a href="#"><span class="lbl">Level 1</span></a></li>
	                <li class="with-sub">
	                    <span>
	                        <span class="lbl">Level 2</span>
	                    </span>
	                    <ul>
	                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
	                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
	                        <li class="with-sub">
	                            <span>
	                                <span class="lbl">Level 3</span>
	                            </span>
	                            <ul>
	                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
	                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
	                            </ul>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </li>-->
	    </ul>
	
<!--	    <section>
	        <header class="side-menu-title">Tags</header>
	        <ul class="side-menu-list">
	            <li>
	                <a href="#">
	                    <i class="tag-color green"></i>
	                    <span class="lbl">Website</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color grey-blue"></i>
	                    <span class="lbl">Bugs/Errors</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color red"></i>
	                    <span class="lbl">General Problem</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color pink"></i>
	                    <span class="lbl">Questions</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color orange"></i>
	                    <span class="lbl">Ideas</span>
	                </a>
	            </li>
	        </ul>
	    </section>-->
	</nav><!--.side-menu-->


<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-lg-push-3 col-md-12">
					<form class="box-typical">
						<input type="text" class="write-something" placeholder="Write a Review..."/>
						<div class="box-typical-footer">
							<div class="tbl">
								<div class="tbl-row">
									<div class="tbl-cell">
										<button type="button" class="btn-icon">
											<i class="font-icon font-icon-earth"></i>
										</button>
										<button type="button" class="btn-icon">
											<i class="font-icon font-icon-picture"></i>
										</button>
										<button type="button" class="btn-icon">
											<i class="font-icon font-icon-calend"></i>
										</button>
										<button type="button" class="btn-icon">
											<i class="font-icon font-icon-video-fill"></i>
										</button>
									</div>
									<div class="tbl-cell tbl-cell-action">
										<button type="submit" class="btn btn-rounded">Send</button>
									</div>
								</div>
							</div>
						</div>
					</form><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">
							Services
							<div class="slider-arrs">
								<button type="button" class="posts-slider-prev">
									<i class="font-icon font-icon-arrow-left"></i>
								</button>
								<button type="button" class="posts-slider-next">
									<i class="font-icon font-icon-arrow-right"></i>
								</button>
							</div>
						</header>
						<div class="posts-slider">
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-1.jpeg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">3 Myths That Confuse the D Myths That Confuse the D Myths That Confuse the D</a>
									</div>
									<div class="post-announce-date">Februrary 19, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-2.jpg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">How Much Do We Spend on How Much Do We Spend on How Much Do We Spend on </a>
									</div>
									<div class="post-announce-date">January 21, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-3.jpeg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">Good News You Might Have Good News You Might Have Good News You Might Have </a>
									</div>
									<div class="post-announce-date">December 30, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-1.jpeg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">3 Myths That Confuse the D Myths That Confuse the D Myths That Confuse the D</a>
									</div>
									<div class="post-announce-date">Februrary 19, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-2.jpg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">How Much Do We Spend on How Much Do We Spend on How Much Do We Spend on </a>
									</div>
									<div class="post-announce-date">January 21, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
							<div class="slide">
								<article class="post-announce">
									<div class="post-announce-pic">
										<a href="#">
											<img src="img/post-3.jpeg" alt="">
										</a>
									</div>
									<div class="post-announce-title">
										<a href="#">Good News You Might Have Good News You Might Have Good News You Might Have </a>
									</div>
									<div class="post-announce-date">December 30, 2016</div>
									<ul class="post-announce-meta">
										<li>
											<i class="font-icon font-icon-eye"></i>
											18
										</li>
										<li>
											<i class="font-icon font-icon-heart"></i>
											5K
										</li>
										<li>
											<i class="font-icon font-icon-comment"></i>
											3K
										</li>
									</ul>
								</article>
							</div><!--.slide-->
						</div><!--.posts-slider-->
					</section><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">Organization Information</header>
						<article class="profile-info-item">
							<header class="profile-info-item-header">
								<i class="font-icon font-icon-notebook-bird"></i>
								Summary
							</header>
							<div class="text-block text-block-typical">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
							</div>
						</article><!--.profile-info-item-->

<!--						<article class="profile-info-item">
							<header class="profile-info-item-header">
								<i class="font-icon font-icon-case"></i>
								Experience
							</header>
							<ul class="exp-timeline">
								<li class="exp-timeline-item">
									<div class="dot"></div>
									<div class="tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<div class="exp-timeline-range">2000 President</div>
												<div class="exp-timeline-status">Co-founder, Chairman</div>
												<div class="exp-timeline-location"><a href="#">Company</a></div>
											</div>
											<div class="tbl-cell tbl-cell-logo">
												<img src="img/logo-2.png" alt="">
											</div>
										</div>
									</div>
								</li>
								<li class="exp-timeline-item">
									<div class="dot"></div>
									<div class="tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<div class="exp-timeline-range">1992–1999</div>
												<div class="exp-timeline-status">Senior Developer</div>
												<div class="exp-timeline-location"><a href="#">YouTube</a></div>
											</div>
											<div class="tbl-cell tbl-cell-logo">
												<img src="img/logo-2.png" alt="">
											</div>
										</div>
									</div>
								</li>
								<li class="exp-timeline-item">
									<div class="dot"></div>
									<div class="tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<div class="exp-timeline-range">2000 President</div>
												<div class="exp-timeline-status">Co-founder, Chairman</div>
												<div class="exp-timeline-location"><a href="#">Company</a></div>
											</div>
											<div class="tbl-cell tbl-cell-logo">
												<img src="img/logo-2.png" alt="">
											</div>
										</div>
									</div>
								</li>
							</ul>
						</article>.profile-info-item

						<article class="profile-info-item">
							<header class="profile-info-item-header">
								<i class="font-icon font-icon-award"></i>
								Edication
							</header>
							<ul class="exp-timeline">
								<li class="exp-timeline-item">
									<div class="dot"></div>
									<div class="tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<div class="exp-timeline-range">1973 – 1975</div>
												<div class="exp-timeline-status">Harvard University</div>
												<div class="exp-timeline-location"><a href="#">BS Computer Science</a></div>
											</div>
											<div class="tbl-cell tbl-cell-logo">
												<img src="img/logo-2.png" alt="">
											</div>
										</div>
									</div>
								</li>
								<li class="exp-timeline-item">
									<div class="dot"></div>
									<div class="tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<div class="exp-timeline-range">1960 – 1973</div>
												<div class="exp-timeline-status">Lakeside Scool, Seattle</div>
											</div>
											<div class="tbl-cell tbl-cell-logo">
												<img src="img/logo-2.png" alt="">
											</div>
										</div>
									</div>
								</li>
							</ul>
						</article>.profile-info-item

						<article class="profile-info-item">
							<header class="profile-info-item-header">
								<i class="font-icon font-icon-lamp"></i>
								Skills
							</header>

							<section class="skill-item tbl">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-num">
										<div class="skill-circle skill-circle-num">74</div>
									</div>
									<div class="tbl-cell tbl-cell-txt">Social Media Marketing</div>
									<div class="tbl-cell tbl-cell-users">
										<img class="skill-user-photo" src="img/avatar-1-64.png" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-3.jpg" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-4.jpg" alt=""/>
										<div class="skill-circle skill-circle-users">+74</div>
									</div>
								</div>
							</section>.skill-item

							<section class="skill-item tbl">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-num">
										<div class="skill-circle skill-circle-num">67</div>
									</div>
									<div class="tbl-cell tbl-cell-txt">Web Development</div>
									<div class="tbl-cell tbl-cell-users">
										<img class="skill-user-photo" src="img/avatar-2-64.png" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-2.jpg" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-3.jpg" alt=""/>
										<div class="skill-circle skill-circle-users">+82</div>
									</div>
								</div>
							</section>.skill-item

							<section class="skill-item tbl">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-num">
										<div class="skill-circle skill-circle-num">25</div>
									</div>
									<div class="tbl-cell tbl-cell-txt">Search Engine Optimization</div>
									<div class="tbl-cell tbl-cell-users">
										<img class="skill-user-photo" src="img/avatar-3-64.png" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-1.jpg" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-2.jpg" alt=""/>
										<div class="skill-circle skill-circle-users">+4</div>
									</div>
								</div>
							</section>.skill-item

							<section class="skill-item tbl">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-num">
										<div class="skill-circle skill-circle-num">20</div>
									</div>
									<div class="tbl-cell tbl-cell-txt">User Experience Design</div>
									<div class="tbl-cell tbl-cell-users">
										<img class="skill-user-photo" src="img/photo-64-3.jpg" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-4.jpg" alt=""/>
										<img class="skill-user-photo" src="img/photo-64-1.jpg" alt=""/>
										<div class="skill-circle skill-circle-users">+13</div>
									</div>
								</div>
							</section>.skill-item
						</article>.profile-info-item-->

						<article class="profile-info-item">
							<header class="profile-info-item-header">
								<i class="font-icon font-icon-star"></i>
								Tags
							</header>
							<div class="profile-interests">
								<a href="#" class="label label-light-grey">Interest</a>
								<a href="#" class="label label-light-grey">Example</a>
								<a href="#" class="label label-light-grey">One more</a>
								<a href="#" class="label label-light-grey">Here is example interest</a>
								<a href="#" class="label label-light-grey">Interest</a>
								<a href="#" class="label label-light-grey">Example</a>
								<a href="#" class="label label-light-grey">One more</a>
								<a href="#" class="label label-light-grey">Here is example interest</a>
								<a href="#" class="label label-light-grey">Interest</a>
								<a href="#" class="label label-light-grey">Example</a>
								<a href="#" class="label label-light-grey">One more</a>
								<a href="#" class="label label-light-grey">Here is example interest</a>
							</div>
						</article><!--.profile-info-item-->
					</section><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">
							Recomendations
							<div class="slider-arrs">
								<button type="button" class="recomendations-slider-prev">
									<i class="font-icon font-icon-arrow-left"></i>
								</button>
								<button type="button" class="recomendations-slider-next">
									<i class="font-icon font-icon-arrow-right"></i>
								</button>
							</div>
						</header>
						<div class="recomendations-slider">
							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-3.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->

							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-1.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->

							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->

							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-4.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->

							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->

							<div class="slide">
								<div class="citate-speech-bubble">
									<i class="font-icon-quote"></i>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-4.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Molly Bridjet</a></p>
											<p class="user-card-row-status"><a href="#">PatchworkLabs</a></p>
										</div>
									</div>
								</div>
							</div><!--.slide-->
						</div><!--.recomendations-slider-->
					</section><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">Following</header>
						<div class="profile-following">
							<div class="profile-following-grid">
								<div class="col">
									<article class="follow-group">
										<div class="follow-group-logo">
											<a href="#" class="follow-group-logo-in"><img src="img/logo-2.png" alt=""></a>
										</div>
										<div class="follow-group-name">
											<a href="#">KIPP Foundation</a>
										</div>
										<div class="follow-group-link">
											<a href="#">
												<span class="plus-link-circle"><span>&plus;</span></span>
												Follow
											</a>
										</div>
									</article>
								</div>
								<div class="col">
									<article class="follow-group">
										<div class="follow-group-logo">
											<a href="#" class="follow-group-logo-in"><img src="img/logo-2.png" alt=""></a>
										</div>
										<div class="follow-group-name">
											<a href="#">KIPP Foundation</a>
										</div>
										<div class="follow-group-link">
											<a href="#">
												<span class="plus-link-circle"><span>&plus;</span></span>
												Follow
											</a>
										</div>
									</article>
								</div>
								<div class="col">
									<article class="follow-group">
										<div class="follow-group-logo">
											<a href="#" class="follow-group-logo-in"><img src="img/logo-2.png" alt=""></a>
										</div>
										<div class="follow-group-name">
											<a href="#">KIPP Foundation</a>
										</div>
										<div class="follow-group-link">
											<a href="#">
												<span class="plus-link-circle"><span>&plus;</span></span>
												Follow
											</a>
										</div>
									</article>
								</div>
								<div class="col">
									<article class="follow-group">
										<div class="follow-group-logo">
											<a href="#" class="follow-group-logo-in"><img src="img/logo-2.png" alt=""></a>
										</div>
										<div class="follow-group-name">
											<a href="#">KIPP Foundation</a>
										</div>
										<div class="follow-group-link">
											<a href="#">
												<span class="plus-link-circle"><span>&plus;</span></span>
												Follow
											</a>
										</div>
									</article>
								</div>
							</div>
							<a href="#" class="btn btn-rounded btn-primary-outline">See all (20)</a>
						</div><!--.profile-following-->
					</section><!--.box-typical-->
				</div><!--.col- -->

				<div class="col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">
					<section class="box-typical">
						<div class="profile-card">
							<div class="profile-card-photo">
								<img src="img/photo-220-1.jpg" alt=""/>
							</div>
							<div class="profile-card-name">Sarah Sanchez</div>
							<div class="profile-card-status">Company Founder</div>
							<div class="profile-card-location">Greater Seattle Area</div>
							<button type="button" class="btn btn-rounded">Follow</button>
							<div class="btn-group">
								<button type="button"
										class="btn btn-rounded btn-primary-outline dropdown-toggle"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false">
									Connect
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
								</div>
							</div>
						</div><!--.profile-card-->

						<div class="profile-statistic tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<b>200</b>
									Connections
								</div>
								<div class="tbl-cell">
									<b>1.9M</b>
									Followers
								</div>
							</div>
						</div>

						<ul class="profile-links-list">
							<li class="nowrap">
								<i class="font-icon font-icon-earth-bordered"></i>
								<a href="#">example.com</a>
							</li>
							<li class="nowrap">
								<i class="font-icon font-icon-fb-fill"></i>
								<a href="#">facebook.com/example</a>
							</li>
							<li class="nowrap">
								<i class="font-icon font-icon-vk-fill"></i>
								<a href="#">vk.com/example</a>
							</li>
							<li class="nowrap">
								<i class="font-icon font-icon-in-fill"></i>
								<a href="#">linked.in/example</a>
							</li>
							<li class="nowrap">
								<i class="font-icon font-icon-tw-fill"></i>
								<a href="#">twitter.com/example</a>
							</li>
							<li class="divider"></li>
							<li>
								<i class="font-icon font-icon-pdf-fill"></i>
								<a href="#">Export page as PDF</a>
							</li>
						</ul>
					</section><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">
							Friends
							&nbsp;
							<a href="#" class="full-count">268</a>
						</header>
						<div class="friends-list">
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name status-online"><a href="#">Dan Cederholm</a></p>
											<p class="user-card-row-location">New York</p>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-1.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Oykun Yilmaz</a></p>
											<p class="user-card-row-location">Los Angeles</p>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-3.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Bill S Kenney</a></p>
											<p class="user-card-row-location">Cardiff</p>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-4.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
											<p class="user-card-row-location">Dusseldorf</p>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Dan Cederholm</a></p>
											<p class="user-card-row-location">New York</p>
										</div>
									</div>
								</div>
							</article>
						</div>
					</section><!--.box-typical-->
				</div><!--.col- -->

				<div class="col-lg-3 col-md-6 col-sm-6">
					<section class="box-typical">
						<header class="box-typical-header-sm">People also viewed</header>
						<div class="friends-list stripped">
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name status-online"><a href="#">Dan Cederholm</a></p>
											<p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
										</div>
										<div class="tbl-cell tbl-cell-action">
											<a href="#" class="plus-link-circle"><span>&plus;</span></a>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-1.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Oykun Yilmaz</a></p>
											<p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
										</div>
										<div class="tbl-cell tbl-cell-action">
											<a href="#" class="plus-link-circle"><span>&plus;</span></a>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-3.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Bill S Kenney</a></p>
											<p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
										</div>
										<div class="tbl-cell tbl-cell-action">
											<a href="#" class="plus-link-circle"><span>&plus;</span></a>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-4.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Maggy Smith</a></p>
											<p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
										</div>
										<div class="tbl-cell tbl-cell-action">
											<a href="#" class="plus-link-circle"><span>&plus;</span></a>
										</div>
									</div>
								</div>
							</article>
							<article class="friends-list-item">
								<div class="user-card-row">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-photo">
											<a href="#">
												<img src="img/photo-64-2.jpg" alt="">
											</a>
										</div>
										<div class="tbl-cell">
											<p class="user-card-row-name"><a href="#">Susan Andrews</a></p>
											<p class="user-card-row-status">Co-founder of <a href="#">Company</a></p>
										</div>
										<div class="tbl-cell tbl-cell-action">
											<a href="#" class="plus-link-circle"><span>&plus;</span></a>
										</div>
									</div>
								</div>
							</article>
						</div>

						<div class="see-all">
							<a href="#">See All (300)</a>
						</div>

						<section>
							<header class="box-typical-header-sm">More Influencer</header>
							<div class="profile-card-slider">
								<div class="slide">
									<div class="profile-card">
										<div class="profile-card-photo">
											<img src="img/photo-220-1.jpg" alt=""/>
										</div>
										<div class="profile-card-name">Jackie Tran</div>
										<div class="profile-card-status">Company Founder</div>
										<button type="button" class="btn btn-rounded btn-primary-outline">Follow</button>
									</div><!--.profile-card-->
								</div><!--.slide-->
								<div class="slide">
									<div class="profile-card">
										<div class="profile-card-photo">
											<img src="img/avatar-1-256.png" alt=""/>
										</div>
										<div class="profile-card-name">Jackie Tran</div>
										<div class="profile-card-status">Company Founder</div>
										<button type="button" class="btn btn-rounded btn-primary-outline">Follow</button>
									</div><!--.profile-card-->
								</div><!--.slide-->
								<div class="slide">
									<div class="profile-card">
										<div class="profile-card-photo">
											<img src="img/avatar-2-256.png" alt=""/>
										</div>
										<div class="profile-card-name">Sarah Sanchez</div>
										<div class="profile-card-status">Longnameexample<br/>corporation</div>
										<button type="button" class="btn btn-rounded btn-primary-outline">Follow</button>
									</div><!--.profile-card-->
								</div><!--.slide-->
								<div class="slide">
									<div class="profile-card">
										<div class="profile-card-photo">
											<img src="img/avatar-3-256.png" alt=""/>
										</div>
										<div class="profile-card-name">Sarah Sanchez</div>
										<div class="profile-card-status">Longnameexample<br/>corporation</div>
										<button type="button" class="btn btn-rounded btn-primary-outline">Follow</button>
									</div><!--.profile-card-->
								</div><!--.slide-->
							</div><!--.profile-card-slider-->
						</section>
					</section><!--.box-typical-->

					<section class="box-typical">
						<header class="box-typical-header-sm">People you may know</header>
						<div class="people-rel-list">
							<div class="people-rel-list-name"><a href="#">Jackie Tran Anh</a>  /  Designer</div>
							<ul class="people-rel-list-photos">
								<li><a href="#"><img src="img/photo-92-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/avatar-1-128.png" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/avatar-2-128.png" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/avatar-3-128.png" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="img/photo-92-1.jpg" alt=""></a></li>
							</ul>
							<form class="site-header-search">
								<input type="text" placeholder="Search for people"/>
								<button type="submit">
									<span class="font-icon-search"></span>
								</button>
								<div class="overlay"></div>
							</form>
						</div>
					</section><!--.box-typical-->
				</div><!--.col- -->
			</div><!--.row-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<!--<div class="control-panel-container">
            <ul>
	        <li class="tasks">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-tasks"></span>
	                </a>
	                <span class="text">Task list</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <div class="control-item-content-text">You don't have pending tasks.</div>
	            </div>
	        </li>
	        <li class="sticky-note">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-file"></span>
	                </a>
	                <span class="text">Sticky Note</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <div class="control-item-content-text">
	                    StartUI – a full featured, premium web application admin dashboard built with Twitter Bootstrap 4, JQuery and CSS
	                </div>
	            </div>
	        </li>
	        <li class="emails">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-envelope"></span>
	                </a>
	                <span class="text">Recent e-mails</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <section class="control-item-actions">
	                    <a href="#" class="link">My e-mails</a>
	                    <a href="#" class="mark">Mark visible as read</a>
	                </section>
	                <ul class="control-item-lists">
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                </ul>
	            </div>
	        </li>
	        <li class="add">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle no-caret">
	                    <span class="icon fa fa-plus"></span>
	                </a>
	            </div>
	        </li>
	    </ul>
	    <a class="control-panel-toggle">
	        <span class="fa fa-angle-double-left"></span>
	    </a>
	</div>-->
        
        <script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="js/lib/tether/tether.min.js" type="text/javascript"></script>

	
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        

	<script src="js/lib/salvattore/salvattore.min.js"></script>

        
        
        
        
        
        
        
        
        
        
        
        
	<script>
		$(document).ready(function() {
			$('.panel').lobiPanel({
				sortable: true
			});

			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var dataTable = new google.visualization.DataTable();
				dataTable.addColumn('string', 'Day');
				dataTable.addColumn('number', 'Values');
				// A column for custom tooltip content
				dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
				dataTable.addRows([
					['MON',  130, ' '],
					['TUE',  130, '130'],
					['WED',  180, '180'],
					['THU',  175, '175'],
					['FRI',  200, '200'],
					['SAT',  170, '170'],
					['SUN',  250, '250'],
					['MON',  220, '220'],
					['TUE',  220, ' ']
				]);

				var options = {
					height: 314,
					legend: 'none',
					areaOpacity: 0.18,
					axisTitlesPosition: 'out',
					hAxis: {
						title: '',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						textPosition: 'out'
					},
					vAxis: {
						minValue: 0,
						textPosition: 'out',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						baselineColor: '#16b4fc',
						ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
						gridlines: {
							color: '#1ba0fc',
							count: 15
						},
					},
					lineWidth: 2,
					colors: ['#fff'],
					curveType: 'function',
					pointSize: 5,
					pointShapeType: 'circle',
					pointFillColor: '#f00',
					backgroundColor: {
						fill: '#008ffb',
						strokeWidth: 0,
					},
					chartArea:{
						left:0,
						top:0,
						width:'100%',
						height:'100%'
					},
					fontSize: 11,
					fontName: 'Proxima Nova',
					tooltip: {
						trigger: 'selection',
						isHtml: true
					}
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
				chart.draw(dataTable, options);
			}
			$(window).resize(function(){
				drawChart();
				setTimeout(function(){
				}, 1000);
			});

			$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel){
				$('.dahsboard-column').matchHeight();
			});
		});
	</script>
        
        <!--scrpit-messenger-->
        <script>
    $(function() {
        $('.chat-settings .change-bg-color label').on('click', function() {
            var color = $(this).data('color');

            $('.messenger-message-container.from').each(function() {
                $(this).removeClass(function (index, css) {
                    return (css.match (/(^|\s)bg-\S+/g) || []).join(' ');
                });

                $(this).addClass('bg-' + color);
            });
        });
    });
</script>


<script src="js/app.js"></script>
</body>
</html>