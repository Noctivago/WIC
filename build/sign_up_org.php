<!DOCTYPE html>

<?php
include_once 'includes/head_singleforms.php';
include_once '../build/db/dbconn.php';
//include_once '../build/db/functions.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>
<body>
    <?php
    if (isset($_POST['signup']) && !empty($_POST['Orgname']) && !empty($_POST['email']) && !empty($_POST['citySelect']) && !empty($_POST['pw1']) && !empty($_POST['pw2'])) {
        $secret = "6LdypyQTAAAAAPaex4p6DqVY6W62Ihld7DDfCMDm";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $_POST['g-recaptcha-response']);
        $response = json_decode($response, true);
        if ($response["success"] === true) {
            $nameOrg = (filter_var($_POST ['Orgname'], FILTER_SANITIZE_STRING));
            $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
            $city = (filter_var($_POST ['citySelect'], FILTER_SANITIZE_NUMBER_INT));
            $pw1 = (filter_var($_POST ['pw1'], FILTER_SANITIZE_STRING));
            $pw2 = (filter_var($_POST ['pw2'], FILTER_SANITIZE_STRING));
            if ($city === 0) {
                $msg = '<span class="label label-pill label-danger"> PLEASE CHOOSE A CITY!</span>';
            } else {
                if ($pw1 != $pw2) {
                    $msg =  '<span class="label label-pill label-danger"> PASSWORD & RETYPE PASSWORD DOES NOT MATCH!</span>';
                } else {
                    if (DB_checkIfUserExists($pdo, $email)) {
                        $msg = '<span class="label label-pill label-danger"> EMAIL [' . $email . '] ALREADY REGISTED!</span>';
                    } else {
                        $hashPassword = hash('whirlpool', $pw1);
                        try {
                            $code = generateActivationCode();
                            $msg = DB_addOrg($pdo, $hashPassword, $email, $nameOrg, $code, $city);
                            $msg .= '<span class="label label-pill label-danger"> Please check your email to activate your account.</span>';
                        } catch (Exception $ex) {
                            echo "ERROR!";
                        }
                    }
                }
            }
        }
    } else {
        $msg = "You are a robot";
    }
    ?>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Sign Up</header>
                    <div class="form-group">
                        <input type="text" id="Orgname" name="Orgname" class="form-control" placeholder="Organization Name" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <section class="card box-typical-full-height">
                        <div class="card-block">
                            <h8 class="with-border m-t-lg">Address</h8>
                            <div class="row">
                                <div>
                                    <select id = "countrySelect" class="bootstrap-select bootstrap-select-arrow" placeholder="Country"  onchange="myFunction()" required>
                                        <option value="0">Country</option>
                                        <?= DB_getCountryAsSelect($pdo); ?>
                                    </select>
                                </div>
                                <div class="states">

                                </div>
                                <div class="cities">

                                </div>
                            </div><!--.row-->
                        </div>
                    </section>
                    <div class="form-group">
                        <input type="password" id="pw1" name = "pw1" class="form-control" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                        <input type="password" id="pw2" name = "pw2" class="form-control" placeholder="Repeat password" required/>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" class="form-control" data-sitekey="6LdypyQTAAAAACjs5ZFCy67r2JXYJUcudQvstby6"></div>
                    </div>
                    <p class="sign-note">  <?= $msg; ?> </p>
                    <button type="submit" name="signup" class="btn btn-rounded btn-success sign-up">Sign up</button>
                    <p class="sign-note">Already have an account? <a href="sign_in.php">Sign in</a></p>
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

    <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
    <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
    <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="js/lib/select2/select2.full.min.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>


    <script>
                                        $(function () {
                                            $('#tags-editor-textarea').tagEditor();
                                        });
    </script>

    <script src="js/app.js"></script>

    <script>
                                        function myFunction() {
                                            var x = document.getElementById("countrySelect").value;
                                            if (x === '0') {

                                            } else {
                                                loadState(x);
                                            }
                                        }
                                        function myFunctionC() {
                                            var x = document.getElementById("stateSelect").value;
                                            if (x === '0') {

                                            } else {
                                                loadCity(x);
                                            }
                                        }
                                        function loadState(Country) {
                                            var Country_Id = Country;
                                            $.ajax({
                                                url: '../build/ajax/get_state.php',
                                                method: 'post',
                                                data: {con: Country_Id},
                                                success: function (data) {
                                                    $('.states').html(data);
                                                }
                                            });
                                        }
                                        function loadCity(State) {
                                            var State_Id = State;
                                            $.ajax({
                                                url: '../build/ajax/get_city.php',
                                                method: 'post',
                                                data: {con: State_Id},
                                                success: function (data) {
                                                    $('.cities').html(data);
                                                }
                                            });
                                        }
    </script>


</body>
</html>
