<?php
                                    $msg = '';

// Check if image file is a actual image or fake image
                                    if (isset($_POST["submit"])) {
                                        $target_dir = "../pics/";
                                        #$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                        $target_file = $target_dir . basename($_FILES["fileToUpload"][$_SESSION['id']]);
                                        $uploadOk = 1;
                                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                        if ($check !== false) {
                                            echo "File is an image - " . $check["mime"] . ".";
                                            $uploadOk = 1;
                                        } else {
                                            echo "File is not an image.";
                                            $uploadOk = 0;
                                        }

// Check if file already exists
                                        if (file_exists($target_file)) {
                                            echo "Sorry, file already exists.";
                                            $uploadOk = 0;
                                        }
// Check file size
                                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                                            echo "Sorry, your file is too large.";
                                            $uploadOk = 0;
                                        }
// Allow certain file formats
                                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                            $uploadOk = 0;
                                        }
// Check if $uploadOk is set to 0 by an error
                                        if ($uploadOk == 0) {
                                            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                                        } else {
                                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }
                                    }
                                    ?>
<main class="cd-main-content">
<div class="content-wrapper">



<div class="top-content">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <!--        <link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
    <div class="inner-bg">
        <div class="container">


            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top">

                                
                                <h6 style="color:black">Upload a different photo...</h6>

                            </div>
                            <!--                            <div class="form-top-right">
                                                            <i class="fa fa-key"></i>
                                                        </div>-->
                        </div>

                        <div class="form-bottom">
                            <h3 style="color:black">  Edit Your Profle</h3>
                            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Select an Image to upload</label>
                                    <input type="file" name="fileToUpload"  class="form-username form-control" id="fileToUpload" required autofocus>
                                </div>
                                <button type="submit" class="btn" name="submit">Save Changes!</button>

                            </form>
                        </div>


                        <!--post modal-->
                        <!--<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                Update Status
                              </div>
                              <div class="modal-body">
                                  <form class="form center-block">
                                    <div class="form-group">
                                      <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
                                    </div>
                                  </form>
                              </div>
                              <div class="modal-footer">
                                  <div>
                                  <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
                                    <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                                          </div>	
                              </div>
                          </div>
                          </div>
                        </div>-->

                    </div>

                    <!--                        <div class="col-sm-1 middle-border"></div>-->
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">
                        <br>
                        <br>
                         <?= DB_readOrganizationServiceBookAsTable($pdo, $_SESSION['id']); ?>



                    </div>
                </div>

            </div>
        </div>

    </div>
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



