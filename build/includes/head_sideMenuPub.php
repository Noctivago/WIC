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
        <title>WIC</title>

        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
        <link href="img/wic_logo.png" rel="apple-touch-icon" type="image/png">
        <link href="img/wic_logo.png" rel="icon" type="image/png">
        <link href="img/wic_logo.png" rel="shortcut icon">

        <link href="css/lib/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/lib/bootstrap-sweetalert/sweetalert.css"/>

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

                            <div class="dropdown dropdown-notification add-customers-screen-user"  >
                                <a href="../build/sign_in.php?redUrl=/build/my_wicplanner.php"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-plus" <input Type="button" Value="Teste"> </i>
                                </a>
                            </div>

                            <div class="dropdown dropdown-notification messages">
                                <a href="../build/sign_in.php?redUrl=/build/index.php"
                                   class="header-alarm dropdown-toggle active"
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-comments" <input Type="button" Value="Teste"></i>
                                </a>
                            </div>

                            <div class="dropdown user-menu">
                                <a href="../build/sign_in.php?redUrl=/build/index.php">
                                    <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"  aria-haspopup="true"  aria-expanded="false">
                                        <img src="img/avatar-2-64.png" alt="">
                                    </button>
                                </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-menu-left-overlay"></div>
        <nav class="side-menu">
            <ul class="side-menu-list">
                <header class="side-menu-title">Advanced Search.</header>
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
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '1');"><i class="fa fa-bank"></i> Space</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '2');"><i class="fa fa-cutlery"></i> Food</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '3');"><i class="fa fa-music"></i> Entertainment</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '4');"><i class="fa fa-star"></i>Decoration</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '5');"><i class="font-icon font-icon-users-group"></i>Staff</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '6');"><i class="font-icon glyphicon glyphicon-film"></i> Audio Visual</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '7');"><i class="fa fa-camera-retro"></i>Reportage Photo & Video</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '8');"><i class="fa fa-diamond"></i>Original</a>
                </li>
                <li class="brown with-sub">
                    <a class="lbl" onclick="updateQueryStringParameter('Category', '9');"><i class="font-icon font-icon-users-group"></i>Team Building</a>
                </li>
            </ul>
        </nav>
        <!--        <div data-role="main" class="ui-content">
                    <div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
                        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                        <form>
                            <div>
                                <h3>Login information</h3>
                                <input type="submit" data-inline="true" value="Log in">
                            </div>
                        </form>
                    </div>
                </div>-->
        <script>
            function getSubCategoryValue() {
                if ($("input[type='radio'].SubCat").is(':checked')) {
                    var card_type = $("input[type='radio'].SubCat:checked").val();
                    //alert(card_type);
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
                        //updateQueryStringParameter('PageNum', 0);
                        //return uri.replace(re, '$1' + key + "=" + value + '$2');
                    } else {
                        var hash = '';
                        if (uri.indexOf('#') !== -1) {
                            hash = uri.replace(/.*#/, '#');
                            uri = uri.replace(/#.*/, '');
                        }
                        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                        //return uri + separator + key + "=" + value + hash;
                        window.location.assign(uri + separator + key + "=" + value + hash);
                        //updateQueryStringParameter('PageNum', 0);
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
            bindKeysBTN();
        </script>
        <script src="js/lib/typeahead/jquery.typeahead.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
        <script src="js/lib/typeahead/typeahead-init.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
