<!DOCTYPE html>
<?php
//include_once '../includes/head_singleforms.php';
include '../build/db/dbconn.php';
include '../build/db/functions.php';
include '../build/db/session.php';

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
?>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>WiC - Event your Life</title>

        <link href="img/w_logo.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
        <link href="img/w_logo.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
        <link href="img/w_logo.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
        <link href="img/w_logo.png" rel="apple-touch-icon" type="image/png">
        <link href="img/w_logo.png" rel="icon" type="image/png">
        <link href="img/w_logo.png" rel="shortcut icon">



        <link href="css/lib/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>



        <!--BACKUP-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                var id = '#dialog';

                //Get the screen height and width
                var maskHeight = $(document).height();
                var maskWidth = $(window).width();

                //Set heigth and width to mask to fill up the whole screen
                $('#mask').css({'width': maskWidth, 'height': maskHeight});

                //transition effect		
                $('#mask').fadeIn(1000);
                $('#mask').fadeTo("slow", 0.8);

                //Get the window height and width
                var winH = $(window).height();
                var winW = $(window).width();

                //Set the popup window to center
                $(id).css('top', winH / 2 - $(id).height() / 0.51);
                $(id).css('left', winW / 2 - $(id).width() / 2);

                //transition effect
                $(id).fadeIn(2000);

                //if close button is clicked
                $('.window .close').click(function (e) {
                    //Cancel the link behavior
                    e.preventDefault();

                    $('#mask').hide();
                    $('.window').hide();
                });

                //if mask is clicked
                $('#mask').click(function () {
                    $(this).hide();
                    $('.window').hide();
                });

            });

        </script>




        <style type="text/css">
            /*body {
            font-family:verdana;
            font-size:15px;
            }
            
            a {color:#333; text-decoration:none}
            a:hover {color:#ccc; text-decoration:none}*/

            #mask {
                position:absolute;
                left:0;
                top:0;
                z-index:9000;
                background-color:#000;
                display:none;
            }  
            #boxes .window {
                position:absolute;
                left:0;
                top:0;
                width:440px;
                height:200px;
                display:none;
                z-index:9999;
                padding:20px;
            }
            #boxes #dialog {
                width:450px; 
                height:600px;
                padding:10px;
                background-color:#ffffff;
            }
        </style>









        <!--COISAS CHAT-->

<!--        <script src="chat/fwebsocket.js"></script>
        <script>
            var Server;

            function send(text) {
                Server.send('message', text);
            }

            $(document).ready(function () {
                console.log('Connecting...');
                //40.117.188.29/chatwic.eastus.cloudapp.azure.com
                Server = new fWebSocket('ws://chatwic.eastus.cloudapp.azure.com:9000');

                //Let the user know we're connected
                Server.bind('open', function () {
                    //log("Connected.");
                    console.log("Connected.");
                });

                //OH NOES! Disconnection occurred.
                Server.bind('close', function (data) {
                    //log("Disconnected.");
                    console.log("Disconnected.");
                });

                //Log any messages sent from server
                Server.bind('message', function (payload) {
                    //log(payload);
                    console.log("payload.");
                });

                Server.connect();
            });
        </script>-->
        <!--COISAS CHAT-->


        <!--FIM BACKUP-->





    </head>

    <div id="fb-root"></div>
<!--    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>-->


    <body class="with-side-menu control-panel control-panel-compact">





        <div id="boxes" class="card-typical window" >
            <div  id="dialog" class=" card-typical window">
                <!--                <div class="card-typical-section">
                                    <div class="user-card-row">
                                        atum
                                    </div>
                                </div>
                                <div class="card-typical-content">Welcome to Wic
                                    <div class="photo">
                                        <img src="img/wic_logo.png" style="max-width:80px;">
                                    </div>
                                
                                
                                <header class="title"> Welcome TO Wic</header>
                                <p>Simple Modal Window | </p>
                                </div>-->

                <article class="card-typical">
                    <div class="card-typical-section">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <!--									<div class="tbl-cell tbl-cell-photo">
                                                                                                                <a href="#">
                                                                                                                    <img src="img/wic_logo.png"style="max-width: 80px" alt="">
                                                                                                                </a>
                                                                                                        </div>-->
                                <div class="tbl-cell">
                                    <p class="user-card-row-name"><h3>Welcome to WiC</h3></p>
                                        <!--<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>-->
                                </div>
                                <div class="tbl-cell tbl-cell-status">

                                    <a href="#">
                                        <img src="img/wic_logo.png"style="max-width: 80px" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-typical-section card-typical-content">


                        <header class="title">Hello Super, Exclusive, Fantastic, Special Guest ! :)</header>
                        <br>                                
                        <p>Did you ever heard something about WiC? We are a Social Network for Events that gathers vendors to planners around the world. Basically you can search, Chat and deal with the best vendors for yours: Social Events, Meet ups, Brand activations, product launch, Fashion shows, Fast meetings, executive breakfasts, coffee breaks, business dinners, galas, corporate parties and a lot more.</p>
                        <br>
                        <p>Enjoy the biggest community of events and entertainment:</p>

                        <p >&emsp;&emsp;&ordm;&emsp;4000+ services for events around the world</p>

                        <p> &emsp;&emsp;&ordm;&emsp;700+ vendors</p>

                        <p> &emsp;&emsp;&ordm;&emsp;And an amazing Notepad, called WiCplanner for you event management.</p>
                        <br>
                        <p>This is not a marketplace. The transaction or any type of sale is responsability for the Planner and Vendor. </p>
                        <br>
                        <p>Because each event is unique and there is no customized prices for any type of service provided.</p>
                        <br>

                    </div>
                    <!--<div class="card-typical-section">-->
                    <div class="card-typical-linked"><a class="btn btn-rounded btn-success close" style="font-size: xx-large;margin: 10px auto auto 100px; display: table-row-group;">Start Planning</a>

                        <p >You Can Event!</p>
                        <br><p >WiC&copy; All rights reserved 2016</p></div>


                    <!--							<a href="#" class="card-typical-likes">
                                                                                    <i class="font-icon font-icon-heart"></i>
                                                                                    123
                                                                            </a>-->

                    <!--</div>-->
                </article><!--.card-typical-->


                <!--<a href="#" class="close">Close it</a>-->

                <!--            <div class="box-typical-footer">
                            <button class="btn btn-rounded btn-primary close"> Start Planning</button>
                            
                            </div>-->

            </div>
            <!-- Mask to cover the whole screen -->
            <div style=" display: none; opacity: 0.8;" id="mask"></div>
        </div>     









        <?php
        //SE TIVER QUERY STRING

        $selfUrl = '/build/index.php';
//        $getValues = array();
//        foreach ($_GET as $key => $value) {
//            array_push($getValues, $key . "=" . $value);
//        }
//        if (count($getValues) > 0) {
//            $selfUrl .= "?" . implode('&', $getValues);
//        } else {
//            $selfUrl .= "?";
//        }
        ?>
        <header class="site-header">
            <div class="container-fluid">
                <a href="index.php" class="site-logo">

                    <img class="hidden-md-down" src="img/wic_logo.png" alt="">
                    <img class="hidden-lg-up" src="img/wic_logo.png" alt="">

                </a>
                <button class="hamburger hamburger--htla">
                    <span style="background-color: coral;">toggle menu</span>
                </button>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="site-header-shown">
                            <!--                            <div class="dropdown dropdown-lang open"  >
                            
                            
                                                            
                                                            
                                                            <button type="button"
                                                                            class="btn btn-inline btn-rounded btn-info"
                                                                            title="Help"
                                                                            data-container="body"
                                                                            data-toggle="popover"
                                                                            data-placement="bottom"
                                                                            data-content=" WiC planner:  WiC planner is a notepad for event planners. You create the event and when you close the deal with the vendor you should adress the service to the events created. Don't forget that you need everything planned by the day of the event;
                                                                            -Inbox: Here you can take a look on the latest conversations with the suppliers;
                                                                            -Profile: Change the password, the name of your account, clarify your doubts and ask for help when needed."
                                                                            style="width: 21px;height: 21px; padding-top: 0px;padding-bottom: 0px; padding-left: 0px;padding-right: 0px;border-top-width: 0px;margin-top: 5px;border-top-width: 1px;"><i class="font-icon font-icon-lamp"></i>
                                                
                                                            </button>
                                                        
                            
                                                    </div>-->

                            <div class="dropdown dropdown-notification add-customers-screen-user"  >
                                <a href="#"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-plus" <input Type="button" Value="Teste" title="My Wic Planner" ondblclick="window.location.href = 'my_wicplanner.php'"> </i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages" alt="WIC Planner">
                                    <div class="dropdown-menu-messages-header" >
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   data-toggle="tab"
                                                   href="messenger.php"
                                                   role="tab">
                                                    Wic Planner
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
                                                <?= db_getWicsForHeader($pdo, $_SESSION['id']); ?>
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
                                        <a href="my_wicplanner.php">See My Wic Planners</a>
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
                                    <i class="font-icon-comments" <input Type="button" Value="Teste" ondblclick="window.location.href = 'messenger.php'"></i>
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
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                            <div class="dropdown-menu-messages-list">
                                                <a href="#" class="mess-item">
                                                    <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
                                                    <span class="mess-item-name">Tim Collins</span>
                                                    <span class="mess-item-txt">Morgan was bothering about something!</span>
                                                </a>
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




                            <div class="dropdown user-menu">
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"  aria-haspopup="true"  aria-expanded="false">
                                    <img src="img/avatar-2-64.png" alt="">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <?php
                                    $user = $_SESSION['id'];
                                    $org = DB_GetOrgIdByUserBossId2($pdo, $user);
                                    $idOrg = $org['Id'];
                                    $userProfile = DB_getUserProfile($pdo, $user);

                                    //echo 'iii'.DB_GetOrgIdByUserBossId2($pdo, $user);
                                    if ($_SESSION['role'] == 'organization') {
                                        echo ' <a class="dropdown-item" href="profile_org.php?Organization=' . $idOrg . '"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>';
                                        echo ' <a class="dropdown-item" href="edit_profile_org.php"><span class="font-icon glyphicon glyphicon-cog"></span>Edit Profile</a>';
                                        echo ' <a class="dropdown-item" href="add_service.php"><span class=" font-icon glyphicon glyphicon-send"></span>Add new Service</a>';
                                        echo ' <a class="dropdown-item" href="invites.php"><span class="font-icon glyphicon glyphicon-cog"></span>My Team</a>';
                                    } else {
                                        echo '<a class="dropdown-item" href="profile_user.php"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                    <a class="dropdown-item" href="edit_profile_user.php"><span class="font-icon glyphicon glyphicon-cog"></span>Edit Profile</a>';
                                    }
                                    ?>

                                    <a class="dropdown-item" href="new_password.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>Change password</a>
                                    <a class="dropdown-item" href="faq.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>FAQ</a>
                                    <a class="dropdown-item" href="help.php"><span class="font-icon glyphicon glyphicon-earphone"></span>Help</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://youcanevent.com"><span class="font-icon glyphicon glyphicon-thumbs-up"></span>Our Blog</a>
                                    <a class="dropdown-item" href="logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>

                                </div>
                            </div>
                            <!--                                                        <div class="dropdown dropdown-lang open"  >
                            
                                                            <button type="button"
                                                                            class="btn btn-inline btn-rounded btn-success-outline"
                                                                            title="Profile help"
                                                                            data-container="body"
                                                                            data-toggle="popover"
                                                                            data-placement="left"
                                                                            data-content="My Team: That is the place where you can watch the people that you invited to be part of your events on wic planner. It's awesome for your teammates that are planning the event with you to be always on the same page knowing the latest incomes. 
                            
                            Blog: Take a look on the latest and fresh ideas about the events industry on WiC's official blog."
                                                                            style="width: 21px;height: 21px; padding-top: 0px;padding-bottom: 0px; padding-left: 0px;padding-right: 0px;border-top-width: 0px;margin-top: 5px;border-top-width: 1px;"><i class="font-icon font-icon-lamp"></i>
                                                
                                                            </button>
                                                                                        
                                 
                            
                            
                                                    </div>-->
                            <button type="button" class="burger-right">
                                <i class="font-icon-pin-2"></i>
                            </button>
                        </div>

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
                                    <a class="header" id="dd-header-marketing" data-target="#" href="#" >
                                        <span style="color: darkgray; width: 200px;">You can event, event your life! &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                    </a>
                                  <div class="help-dropdown">
                               <button type="button" style="margin-top: -5px;">
                                        <i  class="fa fa-info-circle"><span style="font-family: 'Proxima Nova';font-size: 17px;color: darkgray;">Users Guide</span></i>
                                    </button>
                                    <div class="help-dropdown-popup">
                                        <div class="help-dropdown-popup-side">
                                            	                                    <ul>
                                                                                            <li><a href="#" class="font-icon font-icon-calend">Start Planning</a></li>
                                                                                            <li><a href="#" class="active font-icon font-icon-pin-2">Chose your City</a></li>
                                                                                            <li><a class="font-icon font-icon-plus-1" href="#" id="3">Wic Planner</a></li>
                                                                                            <li><a href="#" >Inbox</a></li>
                                                                                            <li><a href="#">Importing data</a></li>
                                                                                            <li><a href="#">Exporting data</a></li>
                                                                                            <li><a>First guide into WiC</a>
                                                                                                <span class="describe">Start Planning, and realize the Event of you life</span></li>
                                                                                        </ul>
                                            <a><h3 style="color: coral;">First guide into WiC</h3></a><br> <br>
                                            <span class="describe"><h5>Start exploring, and plan the Event of you life</h5></span>
                                        </div>
                                        <div class="help-dropdown-popup-cont">
                                            <div class="help-dropdown-popup-cont-in">
                                                <div class="jscroll">
                                                    <a href="#" for="3" class="help-dropdown-popup-item font-icon font-icon-calend">
                                                        <i style="color: coral"></i>Start Planning
                                                        <span class="describe font-icon " for="3">Here you can find all the needs for your event clicking 
                                                            separately on each category or by doing an advanced search
                                                            of what you want. Example search for: Coffee break or Ballrooms</span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item font-icon font-icon-pin-2">
                                                        Chose your City
                                                        <span class="describe ">You should write down the city of where you wanna do the event to find the best vendors
                                                            that fit your needs.</span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item font-icon font-icon-plus">
                                                        Wic Planner
                                                        <span class="describe">WiC planner is a notepad for event planners. You create the event and when you close the deal with the vendor you should adress the service to the events created. Don't forget that you need everything planned by the day of the event </span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item font-icon font-icon-comments">
                                                        Inbox
                                                        <span class="describe">Here you can take a look on the latest conversations with the suppliers</span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item"><img style="width: 32px;" src="img/avatar-2-64.png">
                                                        Profile
                                                        <span class="describe">Change the password, the name of your account, clarify your doubts and ask for help when needed. </span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item font-icon font-icon-users-group">
                                                        My Team
                                                        <span class="describe">That is the place where you can watch the people that you invited to be part of your events on wic planner. It's awesome for your teammates that are planning the event with you to be always on the same page knowing the latest incomes.</span>
                                                    </a>
                                                    <a href="#" class="help-dropdown-popup-item fa fa-thumbs-o-up">
                                                        Blog
                                                        <span class="describe">Take a look on the latest and fresh ideas about the events industry on WiC's official blog</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                </div>
                                
                                
                            
                                
                                
                                
                                <div class="site-header-search-container" style="width: 250px;">

                                    <select class="bootstrap-select">
<!--                                        <option disabled data-content='<span class="font-icon font-icon-pin-2"></span>Choose your City'>MAMAS</option>-->

                                        <optgroup label="Portugal">
                                            <option onclick="setCityValue(this.value)">Braga</option>
                                            <option  onclick="setCityValue(this.value)">Porto</option>
                                            <option onclick="setCityValue(this.value)">Lisboa</option>
                                        </optgroup>

                                        <optgroup label="EUA">
                                            <option onclick="setCityValue(this.value)">Los Angeles</option>
                                            <option data-content='<span class="font-icon font-icon-dots"></span>Choose your City' disabled>New York</option>
                                            <option disabled>Orlando</option>
                                            <option disabled>Austin</option>
                                            <option disabled>Chicago</option>
                                            <option disabled>Las Vegas</option>
                                            <option disabled>San Francisco</option>
                                            <option disabled>San Diego</option>
                                            <option disabled>Washington DC</option>
                                            <option disabled>Miami</option>
                                            <option disabled >Houston</option>
                                            <option disabled>Seattle</option>
                                        </optgroup>

                                        <optgroup label="England">
                                            <option onclick="setCityValue(this.value)">London</option>
                                        </optgroup>

                                        <optgroup label="France">
                                            <option disabled>Paris</option>
                                            <option disabled>Lyon</option>
                                        </optgroup>

                                        <optgroup label="Belgium">
                                            <option disabled>Brussels</option>
                                        </optgroup>
                                        <optgroup label="Sweden">
                                            <option disabled>Stockholm</option>
                                        </optgroup>
                                        <optgroup label="Denmark">
                                            <option disabled>Copenhagen</option>
                                        </optgroup>
                                        <optgroup label="Netherlands">
                                            <option disabled>Amsterdam</option>
                                        </optgroup>
                                        <optgroup label="Brasil">
                                            <option disabled>Rio de Janeiro</option>
                                            <option disabled>São Paulo</option>
                                            <option disabled>Porto Alegre</option>
                                            <option disabled>Florianopolis</option>
                                            <option disabled>Brasilia</option>
                                        </optgroup>
                                        <optgroup label="Canada">
                                            <option disabled>Toronto</option>
                                            <option disabled>Vancouver</option>
                                        </optgroup>

                                        <optgroup label="China">
                                            <option disabled>Hong Kong</option>
                                        </optgroup>
                                        <optgroup label="United Arab Emirates">
                                            <option disabled>Dubai</option>
                                        </optgroup>
                                        <optgroup label="Singapore">
                                            <option disabled>London</option>
                                        </optgroup>
                                        <optgroup label="Australia">
                                            <option disabled>Sydney</option>
                                        </optgroup>
                                    </select>


                                    <!--                                    
                                                                        <form class="site-header-search opened" action="<?php echo $selfUrl; ?>">
                                                                        <input type="text" placeholder="Choose your City.."
                                                                            <input type="text"
                                    <?php
//                                        if (isset($_GET ['name'])) {
//                                            echo 'value = ' . (filter_var($_GET ['name']));
//                                        } else {
//                                            echo 'placeholder="Choose your City.."';
//                                        }
                                    ?>
                                                                                   id="name"
                                                                                   class="form-control"
                                                                                   name="name"
                                                                                   type="text"
                                                                                   autocomplete="on"/>
                                                                            <button type="submit">
                                                                            <button id= "btnName" onclick="getCitySearchValue()">
                                                                                <span class="font-icon-pin-2"></span>
                                                                            </button>
                                                                            <div class="overlay"></div>
                                                                        </form>-->
                                </div>

                              
                                <!--                                <div class="dropdown dropdown-menu-right" >
                                                                <button type="button"
                                                                                class="btn btn-rounded btn-inline btn-info font-icon-lamp "
                                                                                title="Choose your city"
                                                                                data-container="body"
                                                                                data-toggle="popover"
                                                                                data-placement="bottom"
                                                                                data-content="You should write down the city of where you wanna do the event to find the best vendors that fit your needs. "
                                                                                style="width: 21px;height: 21px; padding-top: 0px;padding-bottom: 0px; padding-left: 0px;padding-right: 0px;border-top-width: 0px;margin-top: 5px;border-top-width: 1px;">
                                                    
                                                                </button>
                                                                </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-menu-left-overlay"></div>

        <nav class="side-menu">
            <ul class="side-menu-list">
                <!--                <div class="header">
                                    <div class="help-dropdown">
                                        <button type="button">
                                            <i  class="fa fa-question-circle " style="color: darkolivegreen"></i>
                                        </button>
                                        <div class="help-dropdown-popup">
                                            <div class="help-dropdown-popup-side">
                                                                                            <ul>
                                                                                                <li><a href="#" class="font-icon font-icon-calend">Start Planning</a></li>
                                                                                                <li><a href="#" class="active font-icon font-icon-pin-2">Chose your City</a></li>
                                                                                                <li><a class="font-icon font-icon-plus-1" href="#" id="3">Wic Planner</a></li>
                                                                                                <li><a href="#" >Inbox</a></li>
                                                                                                <li><a href="#">Importing data</a></li>
                                                                                                <li><a href="#">Exporting data</a></li>
                                                                                                <li><a>First guide into WiC</a>
                                                                                                    <span class="describe">Start Planning, and realize the Event of you life</span></li>
                                                                                            </ul>
                                                <a><h3 style="color: coral;">First guide into WiC</h3></a><br> <br>
                                                <span class="describe"><h5>Start exploring, and plan the Event of you life</h5></span>
                                            </div>
                                            <div class="help-dropdown-popup-cont">
                                                <div class="help-dropdown-popup-cont-in">
                                                    <div class="jscroll">
                                                        <a href="#" for="3" class="help-dropdown-popup-item font-icon font-icon-calend">
                                                            <i style="color: coral"></i>Start Planning
                                                            <span class="describe font-icon " for="3">Here you can find all the needs for your event clicking 
                                                                separately on each category or by doing an advanced search
                                                                of what you want. Example search for: Coffee break or Ballrooms</span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item font-icon font-icon-pin-2">
                                                            Chose your City
                                                            <span class="describe ">You should write down the city of where you wanna do the event to find the best vendors
                                                                that fit your needs.</span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item font-icon font-icon-plus">
                                                            Wic Planner
                                                            <span class="describe">WiC planner is a notepad for event planners. You create the event and when you close the deal with the vendor you should adress the service to the events created. Don't forget that you need everything planned by the day of the event </span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item font-icon font-icon-comments">
                                                            Inbox
                                                            <span class="describe">Here you can take a look on the latest conversations with the suppliers</span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item"><img style="width: 32px;" src="img/avatar-2-64.png">
                                                            Profile
                                                            <span class="describe">Change the password, the name of your account, clarify your doubts and ask for help when needed. </span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item font-icon font-icon-users-group">
                                                            My Team
                                                            <span class="describe">That is the place where you can watch the people that you invited to be part of your events on wic planner. It's awesome for your teammates that are planning the event with you to be always on the same page knowing the latest incomes.</span>
                                                        </a>
                                                        <a href="#" class="help-dropdown-popup-item fa fa-thumbs-o-up">
                                                            Blog
                                                            <span class="describe">Take a look on the latest and fresh ideas about the events industry on WiC's official blog</span>
                                                        </a>
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>.help-dropdown
                                </div>-->



                <!--TESTE PESQUISA POR NOME -> ADICIONEI FORM TAG-->
                <?php
                if ($_SESSION['role'] === 'organization') {

                    echo '<header class="side-menu-title">My Services search</header>';
                } else {
                    echo '<header class="side-menu-title">Advanced Search</header>';
                }
                ?>
                <!--<header class="side-menu-title">Advanced search</header>-->
                <!--<form action="<?php echo $selfUrl; ?>">-->
                <div class="col-md-10">

                    <div class="typeahead-container">
                        <div class="typeahead-field">
                            <span class="typeahead-query">
                                <input id="qParam"
                                       class="form-control"
                                       required="required"
                                       name="qParam"
                                       type="search"
                                       autocomplete="on"
                                       <?php
                                       if (isset($_GET ['qParam'])) {
                                           echo 'value = ' . (filter_var($_GET ['qParam']));
                                       } else {
                                           echo 'placeholder="Ex: Catering...">';
                                       }
                                       ?>
                            </span>
                            <span class="typeahead-button">
                                <!--<button type="submit">-->
                                <button id= "btnQparam" onclick="getAdvancedSearchValue()">
                                    <span class="font-icon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!--</form>-->
                <br>

                <header class="side-menu-title"> Start Planning
                    <!--                                     <button type="button"
                                                                    class="btn btn-inline btn-rounded "
                                                                    title="Muita parra pouca uva"
                                                                    data-container="body"
                                                                    data-toggle="popover"
                                                                    data-placement="right"
                                                                    data-content="Comer e o coçar o mal é começar "
                                                                    style="margin: 0px auto auto 150px; display: block; width: 21px;height: 21px; padding-top: 0px;padding-bottom: 0px; padding-left: 0px;padding-right: 0px;border-top-width: 0px;"><i class="">?</i>
                                        
                                                    </button>-->


                </header>




                <!--updateQueryStringParameter(uri, key, value)-->  
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '1');"><i class="fa fa-bank"></i> Space</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '2');"><i class="fa fa-cutlery"></i> Food</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '3');"><i class="fa fa-music"></i> Entertainment</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '4');"><i class="fa fa-star"></i>Decoration</a>
                </li>
                <!--                <li class="gold with-sub">
                                    <a class="lbl" onclick="updateQueryStringParameter('Category', '5');"><i class="font-icon font-icon-users-group"></i>Staff</a>
                                </li>-->
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '6');"><i class="font-icon glyphicon glyphicon-film"></i> Audio Visual</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '7');"><i class="fa fa-camera-retro"></i>Reportage Photo & Video</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '8');"><i class="fa fa-diamond"></i>Original</a>
                </li>
                <li class="coral with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '9');"><i class="font-icon font-icon-users-group"></i>Team Building</a>
                </li>

                <?php
                
                $userId = $_SESSION['id'];
                
                if ($_SESSION['role'] === 'organization') {
                    echo '<div class="form-group" >'
                    . '<select class="bootstrap-select bootstrap-select-arrow" id="invites" name="invites" onChange="inviteChange()">'
                    . '<option value="1">Wic</option>'
                            . '<option value="2">Service</option>'
                            . '</select>'
                            . '</div>';
                    echo '<div class="container-fluid" id="invite_Service" style="Display: none">
                 <form class="sign-box" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                        <div class="sign-avatar">
                            <img src="img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title">Invite people to manage my services</header>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail" required/>
                        </div>';
                    $rows = sql($pdo, "SELECT [Service].[Id], [Service].[Name]
                    FROM [dbo].[Service]
                    join [Organization]
                    on [Organization].[Id] = [Service].[Organization_id]
                    where [Organization].[User_Boss] = ? and [Organization].[Enabled] = 1 and [Service].[Enabled] = 1", array($userId), "rows");
                    echo '<div class="form-group" >';
                    echo '<select class="bootstrap-select bootstrap-select-arrow" id="service" name="service">';
                    foreach ($rows as $row) {
                        echo '<option  value ="' . $row['Id'] . '">' . $row['Name'] . '</option>';
                    }
                    echo ' </select> ';
                    echo '</div>';
//                    DB_GetServicesAsSelect($pdo, $userId);
                    echo '<div class="form-group">
                            <button type="submit" name="sendInvite" id="sendInvite" class="btn btn-rounded">Invite</button>
                        </div>
                        </div>
                        </form>';
                }
                if (isset($_POST['sendInvite']) && !empty($_POST['email']) && !empty($_POST['service'])) {

                    $email = $_POST['email'];
                    $serviceId = $_POST['service'];
                    $service = DB_GetServiceInformation($pdo, $serviceId);
                    if (DB_checkIfUserExists($pdo, $email)) {
                        $idUser = DB_checkUserByEmail($pdo, $email);
                        if (DB_checkIfUserInService($pdo, $idUser, $serviceId, 1)) {
                            echo 'User is already in service';
                        } else {
                            if (DB_checkIfUserInService($pdo, $idUser, $serviceId, 0)) {
                                sql($pdo, "UPDATE [dbo].[User_Service]
                                SET [Enabled] = 0
                                   ,[Validate] = 0
                              WHERE [User_Id] = ? and [Service_id] = ?", array($idUser, $serviceId));
                                ?>
                                <script>
                                    window.location = "../build/invites.php";
                                </script>
                                <?php
                            } else {
                                sql($pdo, "INSERT INTO [dbo].[User_Service]
                                ([Service_Id],[User_Id],[Enabled],[Validate],[Role_id])
                                    VALUES
                                (?,?,0,0,2)", array($serviceId, $idUser));

                                $to = $email;
                                $subject = "WiC - Invitation";
                                $body = "You have been invited by ".$org['Name']." to manage the service ".$service['Name']."."
                                        . "Only people like you with a lots of skills and hability could manage a service like that ;)."
                                        . "Just go for the front door and give your name on the sign up at: https.//wic.club"
                                        . "Best Regards,<br>"
                                        . "WiC<br><br>"
                                        . "Note: Please do not Reply to this email ! Thanks !";
                                sendEmail($to, $subject, $body);
                                ?>
                                <script>
                                    window.location = "../build/invites.php";
                                </script>
                                <?php
                            }
                        }
                    } else {

                        //insert in organization invite
                        sql($pdo, "INSERT INTO [dbo].[Organization_Invites]
                                ([Email]
                                ,[Enabled]
                                ,[Service_Id])
                          VALUES
                                (?
                                ,0
                                ,?)", array($email, $serviceId));
                        $to = $email;
                        $subject = "WiC - Invitation";
                        $body = "You have been invited by " . $org['Name'] . " to manage the service " . $service['Name'] . "<br>"
                                . "How is possible such a talented and professional person like you never been on WiC.Club ? <br>"
                                . "You are that kind of special guest that everyone wanna have.<br>"
                                . "Please register at : Just go for the front door and give your name on the sign up at: https.//wic.club <br>"
                                . " Best Regards,<br><br>"
                                . "WiC<br>"
                                . "Note: Please do not Reply to this email ! Thanks !";
                        sendEmail($to, $subject, $body);
                        ?>
                        <script>
                            window.location = "../build/invites.php";
                        </script>
                        <?php
                    }
                }
                ?>


                <!--invite members to my wic planner-->
                <?php
                $userId = $_SESSION['id'];
                if ($_SESSION['role'] === 'user' || $_SESSION['role'] === 'organization') {
                    echo '<div class="container-fluid" id="invite_Wic" style="Display: true">
                 <form class="sign-box" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                        <div class="sign-avatar">
                            <img src="img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title">Invite to my Wic Planner</header>
                        <div class="form-group">
                            <input type="email" id="emailWP" name="emailWP" class="form-control" placeholder="E-Mail" required/>
                        </div>';
                    $rows = sql($pdo, "SELECT [Id]
                        ,[Name]
                    FROM [dbo].[WIC_Planner]
                    WHERE [Enabled] = 1
                    AND [User_Id] = ?", array($userId), "rows");
                    echo '<div class="form-group" >';
                    echo '<select class="bootstrap-select bootstrap-select-arrow" id="wicplanner" name="wicplanner">';
                    foreach ($rows as $row) {
                        echo '<option  value ="' . $row['Id'] . '">' . $row['Name'] . '</option>';
                    }
                    echo ' </select> ';
                    echo '</div>';
//                    DB_GetServicesAsSelect($pdo, $userId);
                    echo '<div class="form-group">
                            <button type="submit" name="sendInviteWP" id="sendInviteWP" class="btn btn-rounded">Invite</button>
                        </div>
                        </div>
                        </form>';
                }
                if (isset($_POST['sendInviteWP']) && !empty($_POST['emailWP']) && !empty($_POST['wicplanner'])) {
                    $email = $_POST['emailWP'];
                    $wiki = $_POST['wicplanner'];
                    $wicEvent = DB_getWicPlannerName($pdo, $wiki);
                    if (DB_checkIfUserExists($pdo, $email)) {
                        $idUser = DB_getUserId($pdo, $email);
                        if (DB_checkifUserInWicPlanner($pdo, $idUser, $wiki)) {
                            // atualiza validate para 0
                            sql($pdo, "UPDATE [dbo].[WIC_Planner_User]
      SET [Enabled] = 0
      ,[Validate] = 0
 WHERE [User_Id] = ? and [Wic_Planner_Id] = ?", array($idUser, $wiki));
                            //falta enviar o email para o user
//                            

                            if ($_SESSION['role'] === 'organization') {
                                //email org
                                $to = $email;
                                $subject = "WiC - Invitation";
                                $body = "Hi!<br>"
                                        . $org['Name'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                        . "You are one of our favorite guests... You know, just give your name on the sign up, and take a look on the Event ;)<br>"
                                        . "Thanks a lot.<br>"
                                        . "Best Regards,<br>"
                                        . "WiC<br><br>"
                                        . "Note: Please do not reply to this email! Thanks";
                                sendEmail($to, $subject, $body);
                            } else {
                                //email user
                                $to = $email;
                                $subject = "WiC - Invitation";
                                $body = "Hi!<br>"
                                        . $userProfile['First'] . " " . $userProfile['Last'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                        . "You are one of our favorite guests... You know, just give your name on the sign up, and take a look on the Event ;)<br>"
                                        . "Thanks a lot.<br>"
                                        . "Best Regards,<br>"
                                        . "WiC<br><br>"
                                        . "Note: Please do not reply to this email! Thanks";
                                sendEmail($to, $subject, $body);
                            }
                        } else {
                            //insere em wicplanner user o id do user e do wicplanner
                            sql($pdo, "INSERT INTO [dbo].[WIC_Planner_User]
           ([User_Id]
           ,[Wic_Planner_Id]
           ,[Enabled]
           ,[Validate])
     VALUES
           (?
           ,?
           ,0
           ,0)", array($idUser, $wiki));


//falta enviar email para o user se for org envia um email X se for user envia email Y
                            if ($_SESSION['role'] === 'organization') {
                                //email org
                                $to = $email;
                                $subject = "WiC - Invitation";
                                $body = "Hi!<br>"
                                        . $org['Name'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                        . "You are one of our favorite guests... You know, just give your name on the sign up, and take a look on the Event ;)<br>"
                                        . "Thanks a lot.<br>"
                                        . "Best Regards,<br>"
                                        . "WiC<br><br>"
                                        . "Note: Please do not reply to this email! Thanks";
                                sendEmail($to, $subject, $body);
                            } else {
                                //email user
                                $to = $email;
                                $subject = "WiC - Invitation";
                                $body = "Hi!<br>"
                                        . $userProfile['First'] . " " . $userProfile['Last'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                        . "You are one of our favorite guests... You know, just give your name on the sign up, and take a look on the Event ;)<br>"
                                        . "Thanks a lot.<br>"
                                        . "Best Regards,<br>"
                                        . "WiC<br><br>"
                                        . "Note: Please do not reply to this email! Thanks";
                                sendEmail($to, $subject, $body);
                            }
                        }
                    } else {
                        //insere na tabela wicplannerinvites
                        sql($pdo, "INSERT INTO [dbo].[Wic_Planner_Invites]
           ([Email]
           ,[Enabled]
           ,[Wic_Planner_Id])
     VALUES
           (?
           ,0
           ,?)", array($email, $wiki));
                        //enviar email para se registar
                        if ($_SESSION['role'] === 'organization') {
                            //email org
                            $to = $email;
                            $subject = "WiC - Invitation";
                            $body = "Hi!<br>"
                                    . $org['Name'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                    . "I know that you wanna be part of this memorable celebration but first we need to put your name on the guestlist ;)<br>"
                                    . "Can you register <a href='https://wic.club/build/sign_up_user.php'> here </a><br>"
                                    . "Thanks a lot.<br>"
                                    . "Best Regards,<br>"
                                    . "WiC<br><br>"
                                    . "Note: Please do not reply to this email! Thanks!";
                            sendEmail($to, $subject, $body);
                        } else {
                            //email user
                            $to = $email;
                            $subject = "WiC - Invitation";
                            $body = "Hi!<br>"
                                    . $userProfile['First'] . " " . $userProfile['Last'] . " have been invited to be part of event " . $wicEvent['Name'] . ".<br>"
                                    . "I know that you wanna be part of this memorable celebration but first we need to put your name on the guestlist ;)<br>"
                                    . "Can you register <a href='https://wic.club/build/sign_up_user.php'> here </a><br>"
                                    . "Thanks a lot.<br>"
                                    . "Best Regards,<br>"
                                    . "WiC<br><br>"
                                    . "Note: Please do not reply to this email! Thanks!";
                            sendEmail($to, $subject, $body);
                        }
                    }
                }
                ?>
            </ul>
        </nav>
        <script>
            function inviteChange(){
                var reader = document.getElementById("invites").value;
                if(reader === '1'){
                    document.getElementById("invite_Service").style.display = "none";
                    document.getElementById("invite_Wic").style.display ="inline";
                }else{
                    document.getElementById("invite_Wic").style.display = "none";
                    document.getElementById("invite_Service").style.display = "inline";
                }
                
            }
            
            function sendInvite() {
                var email = document.getElementById("email").value;
                var service = document.getElementById("service").value;

                $.post("../ajax/sendInviteUser.php", {email: email, serv: service}, function (result) {
                });
            }
            function getURLParameter(name) {
                return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
            }

            function changeUrlParam(param, value) {
                var currentURL = window.location.href + '&';
                var change = new RegExp('(' + param + ')=(.*)&', 'g');
                var newURL = currentURL.replace(change, '$1=' + value + '&');

                if (getURLParameter(param) !== null) {
                    try {
                        window.history.replaceState('', '', newURL.slice(0, -1));
                    } catch (e) {
                        console.log(e);
                    }
                } else {
                    var currURL = window.location.href;
                    if (currURL.indexOf("?") !== -1) {
                        window.history.replaceState('', '', currentURL.slice(0, -1) + '&' + param + '=' + value);
                    } else {
                        window.history.replaceState('', '', currentURL.slice(0, -1) + '?' + param + '=' + value);
                    }
                }
            }

            function getSubCategoryValue() {
                if ($("input[type='radio'].SubCat").is(':checked')) {
                    var card_type = $("input[type='radio'].SubCat:checked").val();
                    //$_GET CATEGORY > CHANGEURLPARAM
                    changeUrlParam('PageNum', 0);
                    updateQueryStringParameter('SubCategory', card_type);
                }
            }

            function bindKeysBTN() {
                var CityArea = $('#name')
                CityArea.bind('keydown', function (event) {
                    // Check if enter is pressed without pressing the shiftKey
                    if (event.keyCode === 13 && event.shiftKey === false) {
                        getCitySearchValue();
                    }
                });

                var SearchArea = $('#qParam')
                SearchArea.bind('keydown', function (event) {
                    // Check if enter is pressed without pressing the shiftKey
                    if (event.keyCode === 13 && event.shiftKey === false) {
                        getAdvancedSearchValue();
                    }
                });
            }
            function getAdvancedSearchValue() {
                changeUrlParam('PageNum', 0);
                var x = document.getElementById('qParam').value;
                updateQueryStringParameter('qParam', x);
            }

            function setCityValue(x) {
                updateQueryStringParameter('name', x);
            }

            function getCitySearchValue() {
                var x = document.getElementById('name').value;
                updateQueryStringParameter('name', x);
            }
            function setPage(Page) {
                var x = Page;
                updateQueryStringParameter('PageNum', x);
            }
            //FALTA COLOCAR PageNum,0 quando troca algum criterio de pesquisa
            function updateQueryStringParameter(key, value) {
                var uri = window.location.href;
                //alert(uri);
                if (uri.indexOf('index.php') >= 0) {
                    var re = new RegExp("([?|&])" + key + "=.*?(&|#|$)", "i");
                    if (uri.match(re)) {
                        window.location.assign(uri.replace(re, '$1' + key + "=" + value + '$2'));
                    } else {
                        var hash = '';
                        if (uri.indexOf('#') !== -1) {
                            hash = uri.replace(/.*#/, '#');
                            uri = uri.replace(/#.*/, '');
                        }
                        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                        window.location.assign(uri + separator + key + "=" + value + hash);
                    }
                } else {
                    //var str = uri;
                    //str = /.php(.+)/.exec(str)[1];
                    //alert('<?= $_SERVER['HTTP_HOST'] . '/build/index.php'; ?>' + str);
                    uri = 'http://<?= $_SERVER['HTTP_HOST'] . '/build/index.php'; ?>';
                    var re = new RegExp("([?|&])" + key + "=.*?(&|#|$)", "i");
                    if (uri.match(re)) {
                        window.location.assign(uri.replace(re, '$1' + key + "=" + value + '$2'));
                        //updateQueryStringParameter('PageNum', 0);
                        //window.location = (uri.replace(re, '$1' + key + "=" + value + '$2'));
                        //return uri.replace(re, '$1' + key + "=" + value + '$2');
                    } else {
                        var hash = '';
                        if (uri.indexOf('#') !== -1) {
                            hash = uri.replace(/.*#/, '#');
                            uri = uri.replace(/#.*/, '');
                        }
                        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                        //return uri + separator + key + "=" + value + hash;
                        //window.location = (uri + separator + key + "=" + value + hash);
                        window.location.assign(uri + separator + key + "=" + value + hash);
                        //updateQueryStringParameter('PageNum', 0);
                    }
                }
            }

        </script>
        <script src="js/lib/typeahead/jquery.typeahead.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
        <script src="js/lib/typeahead/typeahead-init.js"></script>

        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
