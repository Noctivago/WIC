<?php
include_once '../db/conn.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WIC - Permissions</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <script src="RolePermission.js" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/img/backgrounds/logo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body  onload="readRolePermission()" >
        <div class="inner-bg">
            <div class="container">
                <div class="container">








                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">

                        <div class="form-box">
                            <div class="form-bottom">
                                <p>Role description:</p>
                                <div class="form-group">
                                    <h4 <?php echo $msg; ?></h4>
                                    <input type="text" id = "role" name="role" placeholder="type Role description..." class="form-username form-control" id="permissiondescription" required autofocus>
                                </div>
                                <button type="submit" class="btn" name="addRole" onclick="addRole()">Add Role!</button>
                            </div>
                            <br>
                            <div class="form-bottom">
                                <p>Permission description:</p>
                                <div class="form-group">
                                    <h4 <?php echo $msg; ?></h4>
                                    <input type="text" id = "permission" name="permission" placeholder="type Permission description..." class="form-username form-control" id="permissiondescription" required autofocus>
                                </div>
                                <!--< N BUSCA VALOR -->
                                <select class="form-control" name="Org" id="Org" required="required">
                                    <option value="OP">Organization Permission</option>
                                    <option value="RP">Role Permission</option>
                                </select>


                                <!--<input type="checkbox" id = "permissionOrg" name="permissionOrg" value="1" /> Organization Permission?-->
                                <br>
                                <button type="submit" class="btn" name="addPermission" onclick="addPermission()">Add permission!</button>
                            </div>
                        </div>
                    </div>
                    <!--                        <div class="col-sm-1 middle-border"></div>-->
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">
                        <div>
                            <p>Available Roles</p>
                            <div id="loadRole">LOAD ROLE</div>
                        </div>
                        <div>
                            <p>Available Permissions</p>
                            <div id="loadPermission"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer -->


    <!-- Javascript -->
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.backstretch.min.js"></script>
    <script src="../assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
        <script src="assets/js/placeholder.js"></script>
    <![endif]-->

</body>


</html>