<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/img/favicon.png">

        <title>WIC Landing Page</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/main.css" rel="stylesheet">

        <!-- Fonts from Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

        <!-- REGISTED -->
        <script src="https://use.fontawesome.com/76d6fd4de3.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b><img src="./assets/img/logo.png" class="img-responsive" alt="logo" style="width:72px;height:72px;"></b></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Already a member?</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div id="headerwrap">
            <!-- <img src="./assets/img/icons/" class="img-responsive" alt="Responsive image">-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>BOOK EVENT<br>PLANNING SERVICES.</h1>	
                        <h5 class="subtitle" style="color:white;">The bigest platform of events industry, with thousands of suppliers around the world!<br>
                            Chat, deal and plan the event of your dreams. No RFP's, No Get-a-Quote.</h5>
                        <img src="./assets/img/icons/1.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">	
                        <img src="./assets/img/icons/2.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">	
                        <img src="./assets/img/icons/3.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">		
                        <img src="./assets/img/icons/4.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">		
                        <img src="./assets/img/icons/5.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">	
                        <img src="./assets/img/icons/6.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">	
                        <img src="./assets/img/icons/7.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">		
                        <img src="./assets/img/icons/8.png" class="fa" alt="Responsive image" style="width:48px;height:48px;border:0px;">		
                    </div><!-- /col-lg-6 -->
                    <div class="col-lg-4">
                        <h1><br></h1>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <input type="input" class="form-control" id="userInput" placeholder="YOUR CITY" required="required" style="width:400px;">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <br>
                                <button type="submit" class="btn btn-warning btn-lg" style="background-color:green; width:400px;">START PLANNING</button>
                            </div>
                        </form>	
                        <div class="col-xs-12">
                            <br>
                            <a href="http://facebook.com/"><i class="fa fa-facebook" style="color:white"></i></a>
                            <a href="http://linkedin.com/"><i class="fa fa-linkedin" style="color:white"></i></a>
                            <a href="http://twitter.com/"><i class="fa fa-twitter" style="color:white"></i></a>
                            <a href="http://plus.google.com/"><i class="fa fa-google-plus" style="color:white"></i></a>
                            <a href="http://instagram.com/"><i class="fa fa-instagram" style="color:white"></i></a>		
                        </div>	
                        <?php

                        /*
                        require_once './db/pdo.php';
                        require_once './dao/TestDAO.php';
                        require_once './model/Test.php';

                        $test = new Test();
                        $test->setTitle('TITULO');
                        $test->setContent('CONTENT');

                        $testDAO = new TestDao($pdo);
                        $testDAO->insert($test);
                        */

                        function OpenConnection(){  
                        $server = "wicsqlserver.database.windows.net";
                        $port = "1433";
                        $pass = '#$youcandoit2017$#';
                        $user = "wic";
                        $db = "wicoplannerdb";
                        try  
                        {  
                        $conn = new PDO("sqlsrv:server=$server; Database=$db", "$user", "$pass");
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        if($conn == false) {
                        echo "Ups!";
                        } else {
                        echo "Connected!";
                        }
                        }  
                        catch(Exception $e)  
                        {  
                        echo("Error -> IP NOT ALLOWED!");  
                        }  
                        }
                        OpenConnection();	
                        ?>
                        <div>
                        </div>
                        </div><!-- /col-lg-6 -->

                        </div><!-- /row -->

                        </div><!-- /container -->
                        </div><!-- /headerwrap -->


                        <!-- Bootstrap core JavaScript
                        ================================================== -->
                        <!-- Placed at the end of the document so the pages load faster -->
                        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        </body>
                        </html>
