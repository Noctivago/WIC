<!DOCTYPE html>
<?php
//include_once '../includes/head_singleforms.php';
include '../build/db/dbconn.php';
include '../build/db/functions.php';
//include '../build/db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
ob_start();
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] === 'organization') {
        header("location: /build/sign_in.php");
    }
    if ($_SESSION['role'] === 'user') {
        header("location: /build/sign_in.php");
    }
} else {
    //header("location: /build/indexPub.php");
}
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

    </head>
    <body class="with-side-menu control-panel control-panel-compact" >
        <?php
        //SE TIVER QUERY STRING
        $selfUrl = '/build/indexPub.php';
        ?>
        <header class="site-header">
            <div class="container-fluid">
                <a href="indexPub.php" class="site-logo">
                    <img class="hidden-md-down" src="img/wic_logo.png" alt="">
                    <img class="hidden-lg-up" src="img/wic_logo.png" alt="">
                </a>
                <button class="hamburger hamburger--htla">
                    <span>toggle menu</span>
                </button>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="site-header-shown">
                            <div class="dropdown dropdown-notification  add-customers-screen-user">
                                <a href="sign_in.php?redUrl=/build/index.php"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-plus" <input Type="button" Value="Teste" onclick="window.location.href = 'my_wicplanner.php'"> </i>
                                </a>
                            </div>
                            <div class="dropdown dropdown-notification messages">
                                <a href="../build/sign_in.php?redUrl=/build/index.php"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-comments" <input Type="button" Value="Teste"></i>
                                </a>
                            </div>
                            <div class="dropdown user-menu">
                                
                                   <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"  aria-haspopup="true"  aria-expanded="false">
                                        <img src="img/avatar-2-64.png" alt="">
                                    </button>
                                <a href="../build/sign_in.php?redUrl=/build/index.php">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <a class="dropdown-item" href="sign_in.php"><span class="font-icon glyphicon glyphicon-user"></span>Sign In</a>
                                    <a class="dropdown-item" href="http://youcanevent.com"><span class="font-icon glyphicon glyphicon-thumbs-up"></span>Our Blog</a>
                                    <a class="dropdown-item" href="faqPub.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>FAQ</a>
                                    <a class="dropdown-item" href="helpPub.php"><span class="font-icon glyphicon glyphicon-earphone"></span>Help</a>
                                </div>     
                            </div>
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
                                    <br>
                                    <br>
                                </div>
                                <div class="site-header-search-container" style="width: 250px;">
                                    <form class="site-header-search opened" action="<?php echo $selfUrl; ?>">
                                    <!--<input type="text" placeholder="Choose your City.."-->
                                        <input type="text"
                                        <?php
                                        if (isset($_GET ['name'])) {
                                            echo 'value = ' . (filter_var($_GET ['name']));
                                        } else {
                                            echo 'placeholder="Choose your City.."';
                                        }
                                        ?>
                                               id="name"
                                               class="form-control"
                                               name="name"
                                               type="text"
                                               autocomplete="on"/>
                                        <!--<button type="submit">-->
                                        <button id= "btnName" onclick="getCitySearchValue()">
                                            <span class="font-icon-pin-2"></span>
                                        </button>
                                        <div class="overlay"></div>
                                    </form>
                                </div>
                                
                                <div class="help-dropdown">
	                            <button type="button">
                                        <i  class="fa fa-question-circle " style="color: darkolivegreen"></i>
	                            </button>
	                            <div class="help-dropdown-popup">
	                                <div class="help-dropdown-popup-side">
<!--	                                    <ul>
                                                <li><a href="#" class="font-icon font-icon-calend">Start Planning</a></li>
	                                        <li><a href="#" class="active font-icon font-icon-pin-2">Chose your City</a></li>
                                                <li><a class="font-icon font-icon-plus-1" href="#" id="3">Wic Planner</a></li>
	                                        <li><a href="#" >Inbox</a></li>
	                                        <li><a href="#">Importing data</a></li>
	                                        <li><a href="#">Exporting data</a></li>
                                                <li><a>First guide into WiC</a>
                                                    <span class="describe">Start Planning, and realize the Event of you life</span></li>
	                                    </ul>-->
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
	                                            <a href="#" class="help-dropdown-popup-item glyphicon glyphicon-thumbs-up">
	                                                Blog
	                                                <span class="describe">Take a look on the latest and fresh ideas about the events industry on WiC's official blog</span>
	                                            </a>
 
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div><!--.help-dropdown-->
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-menu-left-overlay"></div>
        <nav class="side-menu">
            <ul class="side-menu-list">
                <header class="side-menu-title">Advanced Search</header>
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

                <header class="side-menu-title">Start Planning</header>
                <!--updateQueryStringParameter(uri, key, value)-->  
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
            </ul>
        </nav>
        <script>
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
                    //alert(card_type);
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
                var x = document.getElementById('qParam').value;
                updateQueryStringParameter('qParam', x);
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
                if (uri.indexOf('indexPub.php') >= 0) {
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
                    //alert('<?= $_SERVER['HTTP_HOST'] . '/build/indexPub.php'; ?>' + str);
                    uri = 'http://<?= $_SERVER['HTTP_HOST'] . '/build/indexPub.php'; ?>';
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
