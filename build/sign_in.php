<!DOCTYPE html>
<?php
include_once 'includes/head_singleforms.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
ob_start();
session_start();

if (isset($_GET ['redUrl'])) {
    $url = (filter_var($_GET['redUrl'], FILTER_SANITIZE_URL));
    //$msg = $url;
}

if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] === 'organization') {
        //header("location: ../build/profile_org.php");
        $use = $_SESSION['id'];
        $idOg = DB_GetOrgIdByUserBossId2($pdo, $use);
        $idorga = $idOg['Id'];
        header("location: http://" . $_SERVER['HTTP_HOST'] . "/build/profile_org.php?Organization=$idorga");
    }
    if ($_SESSION['role'] === 'user') {
        //header("location: ../build/index.php");
        header("location: http://" . $_SERVER['HTTP_HOST'] . "/build/index.php");
    }
}
?>
<body>
    <?php
    if (isset($_POST['signin']) && !empty($_POST['email']) && !empty($_POST['pw'])) {
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
        $pw = (filter_var($_POST ['pw'], FILTER_SANITIZE_STRING));
        $hashPassword = hash('whirlpool', $pw);
        //1 verifica se user exist
        if (DB_checkIfUserExists($pdo, $email)) {
            //2 se existir verifica se enabled / CONTA N BLOQUEADA
            if (DB_checkIfUserEnabled($pdo, $email)) {
                $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? ", array($email), "rows");
                //SE EXISTIR
                foreach ($rows as $row) {
                    //SE ENCONTRAR USER
                    ob_start();
                    if ($row['Email'] == $email && $row['Password'] == $hashPassword) {
                        //ADICIONAR PASSWORD
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email'] = $row['Email'];
                        $_SESSION['password'] = $row['Password'];
                        $_SESSION['role'] = DB_getUserRole($pdo, $email);
                        //ATUALIZA LAST LOGIN DATE
                        DB_updateLastLoginDate($pdo, $email);
                        //$msg = 'Welcome ' . $row['Username'];
                        //SET [Login_failed] = 0
                        if (DB_setLoginFailed($pdo, $email)) {
                            //SE EXISTE URL REENCAMINHA
                            if (isset($_GET['redUrl'])) {
                                //$url = (filter_var($_GET['redUrl'], FILTER_SANITIZE_URL));
                                //header("location: http://$url");
                                $url = (filter_var($_GET['redUrl'], FILTER_SANITIZE_URL));
                                //$_SERVER['HTTP_HOST']
                                header("location: http://" . $_SERVER['HTTP_HOST'] . $url);
                            } else {
                                if ($_SESSION['role'] === 'organization') {
                                    $use = $_SESSION['id'];
                                    $idOg = DB_GetOrgIdByUserBossId2($pdo, $use);
                                    $idorga = $idOg['Id'];
                                    header("location: http://" . $_SERVER['HTTP_HOST'] . "/build/profile_org.php?Organization=$idorga");
                                }
                                if ($_SESSION['role'] === 'user') {
                                    header("location: http://" . $_SERVER['HTTP_HOST'] . "/build/index.php");
                                }
                            }
                        }
                    } else {
                        $val = DB_getLoginFailedValue($pdo, $email);
                        if ($val < 3) {
                            $value = $val + 1;
                            DB_setLoginFailed($pdo, $email, $value);
                            $msg = 'Wrong email or password <span class="label label-pill label-danger">Wrong password</span>';
                        } else {
                            //BLOCK ACCOUNT
                            DB_setLoginFailed($pdo, $email);
                            DB_setBlockAccount($pdo, $email);
                            //ENVIAR EMAIL COM INSTRUÇÔES DE DESBLOQUEIO
                            $msg = 'Account blocked! <span class="label label-pill label-danger">Wrong password</span> ';
                            $to = $email;
                            $subject = 'Account Blocked <span class="label label-pill label-danger">Wrong password</span> ';
                            $code = generateActivationCode();
                            DB_updateUserAccountActivationCode($pdo, $email, $code);
                            $link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $email . '&AC=' . $code . '';
                            $linkRP = 'http://' . $_SERVER['HTTP_HOST'] . '/build/reset_password.php';
                            $body = "Hello! <br>"
                                    . "Your account was blocked due several failed logins.<br>"
                                    . "Click on the following link to reactivate your account:" . $link . " <br>"
                                    . "After the previous step if you don't remember your password you can ask for a new one in: $linkRP <br>"
                                    . "Event your life ! You Can Event ! <br><br>"
                                    . "Note: Please do not reply to this email! Thanks!";
                            sendEmail($to, $subject, $body);
                        }
                    }
                }
            } else {
                //SE ENABLED = 0
                $msg = 'Your account is not activated or blocked!<span class="label label-pill label-danger">Wrong password</span>';
            }
        } else {
            //SE USER N EXISTS
            $msg = 'Wrong email or password! <span class="label label-pill label-danger">Wrong password</span> ';
        }
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <!--SE !ISSET REDURL TEM DE FAZER APENAS PHP_SELF-->
                <?php
                if (isset($_GET['redUrl'])) {
                    $url = (filter_var($_GET['redUrl'], FILTER_SANITIZE_URL));
                    echo '<form class="sign-box" action="' . $_SERVER['PHP_SELF'] . '?redUrl=' . $url . '" method="post">';
                } else {
                    echo '<form class="sign-box" action="' . $_SERVER['PHP_SELF'] . ' " method="post">';
                }
                ?>
                <div class="sign-avatar">
                    <img src="img/avatar-sign.png" alt="">
                </div>
                <header class="sign-title">Sign In</header>
                <div class="form-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="E-Mail" required/>
                </div>
                <div class="form-group">
                    <input type="password" id="pw" name="pw" class="form-control" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <div class="checkbox float-left">
                        <input type="checkbox" id="signed-in"/>
                        <label for="signed-in">Keep me signed in</label>
                    </div>
                    <div class="float-right reset">
                        <a href="reset_password.php">Reset Password</a>
                    </div>
                </div>
                <p class="sign-note"> <span class="label label-pill label-danger"> <?= $msg; ?></span> </p>
                <button type="submit" name="signin" class="btn btn-rounded">Sign in</button>
                <p class="sign-note">New to our website? <br><a href="sign_up_user.php">Sign up as a planner</a><br><a href="sign_up_org.php"> Sign up as a vendor</a></p>
                <!--<button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
</body>
</html>