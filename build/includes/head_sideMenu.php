<!DOCTYPE html>
<?php
//include_once '../includes/head_singleforms.php';
include '../build/db/dbconn.php';
include '../build/db/functions.php';
include '../build/db/session.php';
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
    </head>
    <body class="with-side-menu control-panel control-panel-compact">
        <?php
        //SE TIVER QUERY STRING

        $selfUrl = 'http://' . $_SERVER['HTTP_HOST'] . 'build/index.php';
        $getValues = array();
        foreach ($_GET as $key => $value) {
            array_push($getValues, $key . "=" . $value);
        }
        if (count($getValues) > 0) {
            $selfUrl .= "?" . implode('&', $getValues);
        } else {
            $selfUrl .= "?";   
        }
        ?>
        <header class="site-header">
            <div class="container-fluid">
                <a href="index.php" class="site-logo">

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
                                <a href="#"
                                   class="header-alarm  "
                                   id="dd-messages"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-plus" <input Type="button" Value="Teste" ondblclick="window.location.href = 'my_wicplanner.php'"> </i>
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
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/avatar-2-64.png" alt="">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <?php
                                    $user = $_SESSION['id'];
                                    $org = DB_GetOrgIdByUserBossId2($pdo, $user);
                                    $idOrg = $org['Id'];

//                                    echo 'iii'.DB_GetOrgIdByUserBossId2($pdo, $user);
                                    if ($_SESSION['role'] == 'organization') {
                                        echo ' <a class="dropdown-item" href="profile_org.php?Organization=' . $idOrg . '"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>';
                                        echo ' <a class="dropdown-item" href="edit_profile_org.php"><span class="font-icon glyphicon glyphicon-cog"></span>Edit Profile</a>';
                                        echo ' <a class="dropdown-item" href="add_service.php"><span class="font-icon glyphicon glyphicon-cog"></span>New Service</a>';
                                        echo ' <a class="dropdown-item" href="invites.php"><span class="font-icon glyphicon glyphicon-cog"></span>My Team</a>';
                                    } else {
                                        echo '<a class="dropdown-item" href="profile_user.php"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                    <a class="dropdown-item" href="edit_profile_user.php"><span class="font-icon glyphicon glyphicon-cog"></span>Edit Profile</a>';
                                    }
                                    ?>

                                    <a class="dropdown-item" href="new_password.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>Change password</a>
                                    <a class="dropdown-item" href="faq.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>FAQ</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                                </div>
                            </div>
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
                                    <br>
                                    <br>

                                </div>
                                <div class="site-header-search-container" style="width: 250px;">
                                    <form class="site-header-search opened" action="<?php $selfUrl; ?>">
                                        <input type="text" placeholder="Choose your City.."
                                               id="categories"
                                               class="form-control"
                                               name="name"
                                               type="text"
                                               autocomplete="on"/>
                                        <button type="submit">
                                            <span class="font-icon-pin-2"></span>
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
                <!--TESTE PESQUISA POR NOME -> ADICIONEI FORM TAG-->
                <header class="side-menu-title">Advanced search.</header>

                <form action="<?php echo $selfUrl; ?>">
                    <div class="col-md-10">
                        <div class="typeahead-container">
                            <div class="typeahead-field">
                                <span class="typeahead-query">
                                    <input id="qParam"
                                           class="form-control"
                                           required="required"
                                           name="qParam"
                                           type="search"
                                           autocomplete="on">
                                </span>
                                <span class="typeahead-button">
                                    <button type="submit">
                                        <span class="font-icon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <br>

                <header class="side-menu-title">Start Planning</header>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=1' ?>"><i class="font-icon font-icon-earth-bordered"></i> Space</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=2' ?>"><i class="fa fa-spoon"></i> Food</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=3' ?>"><i class="fa fa-film"></i> Entertainment</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=4' ?>"><i class="fa fa-tree"></i>Decoration</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=5' ?>"><i class="font-icon font-icon-users-group"></i>Staff</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=6' ?>"><i class="font-icon glyphicon glyphicon-film"></i> Audio Visual</a>
                </li>
                <li class="gold with-sub">
                    <a class="lbl" href="<?= $selfUrl . '&Category=7' ?>"><i class="font-icon font-icon-cam-photo"></i>Reportage Photo & Video</a>
                </li>

                <?php
                $userId = $_SESSION['id'];
                if ($_SESSION['role'] === 'organization') {
                    echo '<div class="container-fluid">
                 <form class="sign-box" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                        <div class="sign-avatar">
                            <img src="img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title">Invite to my services</header>
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
                        $subject = "WIC #INVITATION";
                        $body = "Hi! <br>"
                                . "You have been invited to be part of an Organization.<br>"
                                . "To do that you must sign up at: http://www.wic.club/<br>"
                                . "Best regards,<br>"
                                . "WIC<br><br>"
                                . "Note: Please do not reply to this email! Thanks!";
                        sendEmail($to, $subject, $body);
                        ?>
                        <script>
                            window.location = "../build/invites.php";
                        </script>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav><!--.side-menu-->
        <script>
            function sendInvite() {
                var email = document.getElementById("email").value;
                var service = document.getElementById("service").value;

                $.post("../ajax/sendInviteUser.php", {email: email, serv: service}, function (result) {
                });

            }
        </script>
        <script src="js/lib/typeahead/jquery.typeahead.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
        <script src="js/lib/typeahead/typeahead-init.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>






