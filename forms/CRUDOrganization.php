<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
?>

<?
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
?>

 <?php
                                    $userid = $_SESSION['id'];
                                    if (isset($_POST['addOrg']) && !empty($_POST['address']) && !empty($_POST['orgEmail'])) {
                                        $msg = '';
                                        try {
                                            $d = getDateToDB();
                                            $orgId = (filter_var($_POST ['Org'], FILTER_SANITIZE_NUMBER_INT));
                                            $name = (filter_var($_POST ['name'], FILTER_SANITIZE_STRING));
                                            $phone = (filter_var($_POST ['phone'], FILTER_SANITIZE_STRING));
                                            $mobile = (filter_var($_POST ['mobile'], FILTER_SANITIZE_STRING));
                                            $address = (filter_var($_POST ['address'], FILTER_SANITIZE_STRING));
                                            $facebook = (filter_var($_POST ['facebook'], FILTER_SANITIZE_STRING));
                                            $twitter = (filter_var($_POST ['twitter'], FILTER_SANITIZE_STRING));
                                            $linkdin = (filter_var($_POST ['linkdin'], FILTER_SANITIZE_STRING));
                                            $orgEmail = (filter_var($_POST ['orgEmail'], FILTER_SANITIZE_EMAIL));
                                            $website = (filter_var($_POST ['website'], FILTER_SANITIZE_STRING));
                                            $msg = DB_addOrganization($pdo, $userid,$orgId, $name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $d);
                                        } catch (Exception $ex) {
                                            $msg = "ERROR!";
                                        }
                                    }
                                    ?>	

                                   
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NEW ORGANIZATION</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        
        <!-- javascripto-->
        <script src="../js/organization.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>    function readDataOrganization(){
    var orgId = $("#org-sel").val();
    alert(orgId);
    var arg = 'viewAllUsersInOrganization';
    var dataString = 'arg=' +arg + '&orgId=' + orgId;
    var response;
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
           if(result){
            var resultado = eval(result);
            alert(resultado);
        }else{
            alert('error');
        }
            }
        });
}
 </script>      
    </head>
<!---->
<body>
        

        <!-- Top content -->
        
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 ><strong>Organization</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>
                                            <select class="form-username form-control" name="org" id="org-sel" onchange="readDataOrganization()">
                                                <?= DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="ORGANIZATION NAMEkkkkkkkkkk" class="form-username form-control" id="name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="ORGANIZATION PHONE" class="form-password form-control" id="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" placeholder="ORGANIZATION MOBILE" class="form-password form-control" id="mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" placeholder="ORGANIZATION ADDRESS" class="form-password form-control" id="address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="facebook" placeholder="ORGANIZATION FACEBOOK" class="form-password form-control" id="facebook" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="twitter" placeholder="ORGANIZATION TWITTER" class="form-password form-control" id="twitter" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="linkdin" placeholder="ORGANIZATION LINKDIN" class="form-password form-control" id="linkdin" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="orgEmail" placeholder="ORGANIZATION EMAIL" class="form-password form-control" id="orgEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="website" placeholder="ORGANIZATION WEBSITE" class="form-password form-control" id="website" required>
                                        </div>
                                        <button type="submit" id="addOrg" class="btn" name="addOrg" style="display: true;">New organization</button>
                                        <button type="submit" id="update" class="btn" name="addOrg" style="display: none;"> Save</button>
                                        <button type="submit" id="delete" class="btn" onclick="removeOrganization()" style="display: none;"> Delete </button>
                                        <button type="submit" id="cancel" class="btn" onclick="cleanInformation()" style="display: none;"> Cancel </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <div class="col-sm-1" ></div>

                        <div class="col-sm-5" id="orgresp">
                            <br>
                            <br>
                            <!--?= DB_readOrganizationAsTable($pdo, $_SESSION['id']); ?-->
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/scripts.js" type="text/javascript"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>


</html>
