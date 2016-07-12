
<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">

        <div class="top-content">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <link rel="stylesheet"   link href="../../assets/assests_sidebar/css/tabela.css" rel="stylesheet" type="text/css"/>
            <div class="container">

                <div class="col-sm-8 col-lg-offset-2 text">
                </div>
                <div class="row">

                    <div class="col-sm-5">

                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">

                                </div>
                                <div class="form-top-right">
                                </div>
                              
                               <!-- <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                               -->
                            </div>


                            <div class="form-bottom">
                                <?php
                                            if ((isset($_POST['invite']) && isset($_POST['form-email'])) && !empty($_POST['OrgId'])) {
                                                $msg = '';
                                                try {
                                                    $email = (filter_var($_POST['form-email'], FILTER_SANITIZE_STRING));
                                                    $orgId = (filter_var($_POST ['OrgId'], FILTER_SANITIZE_STRING));
                                                    $msg = DB_addUserInOrganization($pdo, $email, $orgId);
                                                    echo $msg;
                                                } catch (Exception $ex) {
                                                    $msg = "ERROR!";
                                                }
                                            }else if(isset ($_POST['delete'])){
                                            }
                                            ?>    

                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group" id="OrgId">
                                        <!--label class="sr-only" for="form-password">Adress:</label>
                                        <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required-->
                                    <?php DB_readOrganizationAsSelect($pdo, $userId) ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="height: 40px" name="email" placeholder="First Name" class="form-username form-control" id="form-email" required autofocus>
                                    </div>
                                    <button type="submit" id="invite" class="btn" name="invite" visible="true">Send Invite</button>
                                </form>
                            </div>
                        </div>
                    </div>
                

                    <!--<div class="col-sm-1"></div>-->

                    <div class="col-sm-5">


<!--                        <div class="container">-->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center">
                                        Users in organization
                                    </h4>

                                </div>
                                <div id="no-more-tables" >
                                    <table class="col-md-12 table-bordered table-striped table-condensed cf ">
                                        <thead class="cf">
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Remove</th>	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                    <h4 class="text-center">
                                       Waiting for response
                                    </h4>

                                </div>
                                <div id="no-more-tables">
                                    <table class="col-md-12 table-bordered table-striped table-condensed cf " style="display: none;">
                                        <thead class="cf">
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th></th>	
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
<!--                            </div>-->
                    </div>
                                
                        </div>


                    </div>

       
                </div>
            </div>
 
</main>

<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>
<script src="../../js/OrganizationUsers.js" ></script>


