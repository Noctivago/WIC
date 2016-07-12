
<main class="cd-main-content">
<div class="content-wrapper" style="padding-left: 0%">
    
                 <div class="top-content">
             <div class="col-lg-12">
                 <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Change Your Password
                 </h1>
             </div>
             </div>

<div class="top-content">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
<!--    <div class="inner-bg" style="padding-top: 0px">-->
        <div class="container">

<!--            <div class="row">-->
                <div class="col-sm-8 col-lg-offset-2 text">
<!--            </div>-->
            </div>
            <div class="row">
           
                       <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">

                            </div>
                            <div class="form-top-right">
                            </div>
                            <!--                            <div class="form-top-right">
                                                            <i class="fa fa-key"></i>-->
                            <img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">
                                <input style="color: black;" class="form-username form-control" type="file">
                                <!--<h6 style="color:black">Upload a different photo...</h6>  width: 370px; align:center-left;   text-left center-block well well-sm-->

                                                       </div>
                        

                        <div class="form-bottom">
                            
                                                                <?php
                                    if (isset($_POST['changePassword']) && !empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newPassword2'])) {
                                        $msg = '';
                                        try {
                                            #$d = getDateToDB();
                                            $old = (filter_var($_POST ['oldPassword'], FILTER_SANITIZE_STRING));
                                            $new = (filter_var($_POST ['newPassword'], FILTER_SANITIZE_STRING));
                                            $new1 = (filter_var($_POST ['newPassword2'], FILTER_SANITIZE_STRING));
                                            $userId = $_SESSION['id'];
                                            //VERIFICAR SE NEW == NEW !
                                            if ($new === $new1) {
                                                $hashPassword = hash('whirlpool', $new);
                                                $password = hash('whirlpool', $old);
                                                //VERIFICAR SE OLD CORRETA
                                                if (DB_checkIfUserPasswordIsCorrect($pdo, $password, $userId)) {
                                                    if (DB_changeUserPassword($pdo, $userId, $hashPassword)) {
                                                        $msg = 'PASSWORD CHANGED!';
                                                    } else {
                                                        $msg = 'AN ERROR OCCURED! PLEASE TRY AGAIN!';
                                                    }
                                                } else {
                                                    $msg = 'THE CURRENT PASSWORD IS NOT CORRECT!';
                                                }
                                            } else {
                                                $msg = 'THE NEW PASSWORD DO NOT MATCH! PLEASE TRY AGAIN!';
                                            }
                                        } catch (Exception $ex) {
                                            echo "ERROR!";
                                        }
                                    }
                                    ?>
                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                <div class="form-group"> <h4 class="btn"> <?php echo $msg; ?></h4>
                                    <label class="sr-only" for="form-username">Old Password:</label>
                                    <input type="password" style="height: 40px" name="oldPassword" placeholder="Actual Password" class="form-username form-control" id="oldPassword" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">New Password:</label>
                                    <input type="password" style="height: 40px" name="newPassword" placeholder="New Password" class="form-password form-control" id="newPassword" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Confirm your new Password:</label>
                                    <input type="password" style="height: 40px" name="newPassword2" placeholder="Confirm your new password" class="form-password form-control" id="newPassword2" required>
                                </div>
                                <button type="submit" class="btn" name="changePassword">Save Changes</button>

                            </form>
                        </div>
</div>
</div>


                    
                           
                        <div class="col-sm-1 middle-border"  >
                        </div>                   
                        <div class="col-sm-1"></div>

                    <!--                        <div class="col-sm-1 middle-border"></div>-->
<!--                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">-->



                    
                </div>

            </div>
<!--        </div>-->

    </div>
</div>
</main>


    <script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
    <script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>



