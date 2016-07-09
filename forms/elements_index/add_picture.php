
<main class="cd-main-content">
<div class="content-wrapper">

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">


                    <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top">
                                <h1 style="color:darkgray">UPLOAD A PHOTO</h1>
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
                                    <div class = "form-group"><h4> <?php echo $msg; ?></h4>
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" class="login-form">
                                            Select image to upload:
                                            <input type="file" name="fileToUpload" id="fileToUpload" required="">
                                            <input type="submit" value="Upload Image" name="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>

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

        <!-- Javascript -->
        <script src="../../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery.backstretch.min.js"></script>
        <script src="../../assets/js/scripts.js"></script>
        <script src="../../assets/js/scripts.js" type="text/javascript"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
  

