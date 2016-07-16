<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">

        <div class="top-content">
            <div class="col-lg-12">
                <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Organization </h1> <h4 style="color: darkgray"> <?php echo $msg; ?></h4>

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
                                <form role="form" class="login-form">
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-username">Company Name:</label>-->
                                        <input type="text" name="name" placeholder="ORGANIZATION NAME" class="form-username form-control" id="name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Telephone:</label>-->
                                        <input type="text" name="phone" placeholder="ORGANIZATION PHONE" class="form-password form-control" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Mobile Number:</label>-->
                                        <input type="text" name="mobile" placeholder="ORGANIZATION MOBILE" class="form-password form-control" id="mobile" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Adress:</label>-->
                                        <input type="text" name="address" placeholder="ORGANIZATION ADDRESS" class="form-password form-control" id="address">
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Facebook:</label>-->
                                        <input type="text" name="facebook" placeholder="ORGANIZATION FACEBOOK" class="form-password form-control" id="facebook" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Twitter:</label>-->
                                        <input type="text" name="twitter" placeholder="ORGANIZATION TWITTER" class="form-password form-control" id="twitter" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-username">Linkedin</label>-->
                                        <input type="text" name="linkdin" placeholder="ORGANIZATION LINKDIN" class="form-password form-control" id="linkdin" required>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Email of Organization:</label>-->
                                        <input type="email" name="orgEmail" placeholder="ORGANIZATION EMAIL" class="form-password form-control" id="orgEmail" required>
                                    </div>

                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">WebSite:</label>-->
                                        <input type="text" name="website" placeholder="ORGANIZATION WEBSITE" class="form-password form-control" id="website" required>
                                    </div>
                                    <div class="form-inline">
                                        <button type="submit" id="update" class="btn" name="update" onclick="updateDataOrganization()">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--        </div>-->

        </div>
    </div>
</main>
<!--<script src="../../assets/assests_sidebar/js/js_main/bootstrap.min_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/jquery_1.11.1_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/backstretch.min_main.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/js/js_main/scripts_main.js" type="text/javascript"></script>-->


<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>

<script src="../../js/organization.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script> window.onload = function(){
    readDataOrganization();
}
    </script>