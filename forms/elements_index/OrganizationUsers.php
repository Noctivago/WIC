<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">

        <div class="top-content">
            <div class="col-lg-12">
                <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Manage organization users </h1> <h4 style="color: darkgray"> <?php echo $msg; ?></h4>

            </div>
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
            <!--    <div class="inner-bg" style="padding-top: 0px">-->
            <div class="container">

                <!--            <div class="row">-->
                <div class="col-sm-8 col-lg-offset-2 text">
                    <!--            </div>-->
                </div>
                <div class="row">

                    <div class="col-sm-8 col-lg-offset-2 text-center">

                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">

                                </div>
                                <div class="form-top-right">
                                </div>
                                <!--                            <div class="form-top-right">
                                                                <i class="fa fa-key"></i>-->
    <!--                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                    <input style="color: black;" class="form-username form-control" type="file">-->
                                <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->

                            </div>

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
</main>
    <!-- Footer >
    <footer>
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer-->

    <!-- Javascript -->
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.backstretch.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/scripts.js" type="text/javascript"></script>
    <!--[if lt IE 10]>
        <script src="assets/js/placeholder.js"></script>
    <![endif]-->
