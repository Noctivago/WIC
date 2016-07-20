
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

                            <div class="dropdown dropdown-notification add-customers-screen-user">
                                <a href="#"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-plus"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
                                    <div class="dropdown-menu-messages-header">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   data-toggle="tab"
                                                   href="messenger.php"
                                                   role="tab">
                                                    Wic Planner
                                                    <!--<span class="label label-pill label-danger"></span>-->
                                                </a>
                                            </li>

                                        </ul>
                                        <button type="button" class="create">
                                            <i class="font-icon font-icon-pen-square" alt="Create a new Wic Planner"></i>
                                        </button>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                            <div class="dropdown-menu-messages-list">
                                               

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
                                        <a href="wicPlanner.php">See My Wic Planners</a>
                                    </div>
                                </div>
                            </div>
                            


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
                                    <i class="font-icon-comments"></i>
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
                                    <a class="dropdown-item" href="logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
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


                <header class="side-menu-title">Start Planning</header>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="font-icon font-icon-earth-bordered"></i> Space</a>
<!--	            <span>
                     <i class="font-icon font-icon-earth-bordered"></i>
                     <span class="lbl">Space</span>
                 </span>-->
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="fa fa-spoon"></i> Food</a>
<!--	            <span>
                     <i class="fa fa-spoon " ></i>
                     
                     <span class="lbl">Food</span>
                 </span>-->
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="fa fa-film"></i> Entertainement</a>
<!--	            <span>
                     <i class="fa fa-film"></i>
                     <span class="lbl">Entertainement</span>
                 </span>-->
                </li>

                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="fa fa-tree"></i>Decoration</a>
<!--	            <span>
                     <i class="fa fa-tree"></i>
                     <span class="lbl">Decoration</span>
                 </span>-->
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="font-icon font-icon-users-group"></i>Staff</a>
<!--	            <span>
                     <i class="font-icon font-icon-users-group"></i>
                     <span class="lbl">Staff</span>
                 </span>-->
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="font-icon glyphicon glyphicon-film"></i> Audio Visual</a>
<!--	            <span>
                     <i class="font-icon glyphicon glyphicon-film"></i>
                     <span class="lbl">Audio Visual</span>
                 </span>-->
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="contacts.php"><i class="font-icon font-icon-cam-photo"></i>Reportage Photo & Video</a>
<!--	            <span>
                     <i class="font-icon font-icon-cam-photo"></i>
                     <span class="lbl">Reportage Photo & Video</span>
                 </span>-->
                </li>
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





                <header class="side-menu-title">My Team</header>

                <li class="blue-dirty with-sub " >

                    <a class="lbl" href="contacts.php"><i class="font-icon font-icon-edit"></i> Members of my Team</a>
<!--	            <span>
                      <i class="font-icon font-icon-users-group"></i>
                      <span class="lbl"  >Members of my Team<a hidden="true" href="contacts.php"></a></span>
                  </span>-->

                </li>



                <li class="blue-dirty with-sub">

                    <a class="lbl" href="contacts.php"><i class="font-icon font-icon-edit"></i> My Organization</a>
<!--	            <span>
                    <i class="font-icon font-icon-edit"></i>
                    <a class="lbl" href="contacts.php"> My Organization</a>
                    <span class="lbl"> My Organization</span>
                </span>-->

                </li>


                <div class="container-fluid">

                    <form class="sign-box">
                        <div class="sign-avatar">
                            <img src="img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title">Invite Members</header>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-Mail"/>
                        </div>

                        <div class="form-group" >
                            <!--<select class="bootstrap-select bootstrap-select-arrow" >-->
                            <select class="form-control">
                                <option>MY WIcPlanner 1</option>
                                <option>MY WIcPlanner 2</option>
                                <option>MY WIcPlanner 3</option>
                                <option>MY WIcPlanner 4</option>
                            </select>
                        </div>


                        <!--.row-->


                        <div class="form-group">

                            <button type="submit" class="btn btn-rounded">Invite</button>

                            <!--                    <button type="button" class="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>-->
                        </div>
                    </form>
                </div>










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

