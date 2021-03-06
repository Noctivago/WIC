<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
include_once ('../db/functions.php');
$msg = '';
?>

<?
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NEW ORGANIZATION SERVICE</title>

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
        <script src="../js/OrganizationUsers.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Users in organization</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['send-invite']) && !empty($_POST['email-user'])) {
                                        $msg = '';
                                        try {
                                            $idOrg = (filter_var($_POST ['org'], FILTER_SANITIZE_STRING));
                                            $email = (filter_var($_POST ['email-user'], FILTER_SANITIZE_EMAIL));
                                            $msg = DB_addUserInOrganization($pdo, $email, $idOrg);
                                            echo $msg;
                                        } catch (Exception $ex) {
                                            $msg = "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group">
                                            <h4> <?php echo $msg; ?></h4>
                                            <select class="form-username form-control" name="org" id="org" required="required">
                                                <?= DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email-user" placeholder="User email" class="form-password form-control" id="email-user" required>
                                        </div>
                                        <button type="submit" id="send-invite" class="btn" name="send-invite">Send invite to join organization</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-5">


                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="text-center">
                                        Nome tabela
                                    </h1>

                                </div>
                                <div id="no-more-tables">
                                    <table class="col-md-12 table-bordered table-striped table-condensed cf ">
                                        <thead class="cf">
                                            <tr>
                                                <th>Id</th>
                                                <th>Dia Semana</th>
                                                <th class="numeric">d-semana</th>	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-title="Code">1</td>
                                                <td data-title="Company">SEGUNDA</td>
                                                <td data-title="Day" class="numeric">seg-feira</td>

                                            </tr>
                                            <tr>
                                                <td data-title="Code">2</td>
                                                <td data-title="Company">TERCA</td>
                                                <td data-title="Day" class="numeric">ter-feira</td>

                                            </tr>
                                            <tr>
                                                <td data-title="Code">3</td>
                                                <td data-title="Company">QUARTA</td>
                                                <td data-title="Day" class="numeric">qua-feira</td>

                                            </tr>
                                            <tr>
                                                <td data-title="Code">4</td>
                                                <td data-title="Company">QUINTA</td>
                                                <td data-title="Day" class="numeric">qui-feira</td>

                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


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
