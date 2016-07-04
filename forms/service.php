<?php
include_once ('session.php');
include_once ('../db/conn.inc.php');
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SERVICE PAGE</title>

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

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>SERVICE ADD</strong> </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-bottom">
                                    <?php
                                    if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                        $msg = '';
                                        try {
                                            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                                            $password = (filter_var($_POST ['password'], FILTER_SANITIZE_STRING));
                                            $hashPassword = hash('whirlpool', $password);
                                            if (DB_checkIfUserExists($pdo, $email)) {
                                                $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? and [Account_Enabled] = ?", array($email, '1'), "rows");
                                                $msg = 'EMAIL FOUND';
                                                foreach ($rows as $row) {
                                                    if ($row['Email'] == $email && $row['Password'] == $hashPassword) {
                                                        //ADICIONAR PASSWORD
                                                        $_SESSION['valid'] = true;
                                                        $_SESSION['timeout'] = time();
                                                        $_SESSION['id'] = $row['Id'];
                                                        $_SESSION['username'] = $row['Username'];
                                                        $_SESSION['email'] = $row['Email'];
                                                        $_SESSION['password'] = $row['Password'];
                                                        $msg = 'Welcome ' . $row['Username'];
                                                        //SET [Login_failed] = 0
                                                        if (DB_setLoginFailed($pdo, $email)) {
                                                            header('Location: profile.php');
                                                        }
                                                    } else {
                                                        //INC TO BLOCK;
                                                        //SET
                                                        $val = DB_getLoginFailedValue($pdo, $email);
                                                        if ($val < 3) {
                                                            $value = $val + 1;
                                                            DB_setLoginFailed($pdo, $email, $value);
                                                            $msg = 'Wrong username or password';
                                                        } else {
                                                            //BLOCK ACCOUNT
                                                            DB_setLoginFailed($pdo, $email);
                                                            DB_setBlockAccount($pdo, $email);
                                                            $msg = 'Account blocked!';
                                                        }
                                                    }
                                                }
                                            } else {
                                                $msg = 'Wrong username or password';
                                            }
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>	

                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group"><h4> <?php echo $msg; ?></h4>

                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="text" name="name" placeholder="youremail@email.com" class="form-username form-control" id="form-name" required autofocus>

                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">DESCRIPTION</label>
                                            <input type="text" name="description" placeholder="Password" class="form-password form-control" id="description" required>
                                        </div>
                                        <div class='form-group'>
                                            <select class="form-control" name="subCategory" id="subCategory" required="required" onchange="">
                                                <?= DB_getSubCategoryAsSelect($pdo) ?> 
                                            </select>
                                        </div>
                                        <button type="submit" class="btn" name="login">Add Service!</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <!--                        <div class="col-sm-1 middle-border"></div>-->
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="footer-border"></div>
                        <p>Made by <a href="http://google.pt" target="_blank"><strong>Easy Solutions</strong></a> 
                            having a lot of fun. <i class="fa fa-smile-o"></i></p>
                    </div>

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
