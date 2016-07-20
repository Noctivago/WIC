<!DOCTYPE html>
<?php
include("includes/head_singleforms.php");
?>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Confirm Your Account</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Validation Code" required/>
                    </div>
                    <!--                    <div class="form-group">
                                            <div class="checkbox float-left">
                                                <input type="checkbox" id="signed-in"/>
                                                <label for="signed-in">Keep me signed in</label>
                                            </div>
                                            <div class="float-right reset">
                                                <a href="reset-password.html">Reset Password</a>
                                            </div>
                                        </div>-->
                    <button type="submit" class="btn btn-rounded">Validate account</button>
                    <p class="sign-note">New to our website? <a href="sign_up.php">Sign up</a></p>
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