<!DOCTYPE html>
<?php
    include("includes/head_singleforms.php");
?>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Sign Up</header>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Repeat password" required/>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Sign up</button>
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
<script src="js/app.js"></script>
</body>
</html>