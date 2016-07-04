<?php
include_once '../db/conn.inc.php';
?>
<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Account Confirmation </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/img/backgrounds/logo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Confirm your Account</strong> </h1>
                            <div class="description">
                            	<p>
	                            	Ative a sua conta e realize o seu evento de sonho já!  A vida é uma celebração
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                       
                        
                        
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">

                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<p>Confirm!!</p>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
<?php
            if (isset($_POST['activate']) && !empty($_POST['activateText']) && !empty($_POST['email'])) {
                $msg = '';
                $forgotPassword = '';
                $code = (filter_var($_POST ['activateText'], FILTER_SANITIZE_SPECIAL_CHARS));
                $email = (filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL));
                //SE EMAIL EXISTE
                if (DB_checkIfUserExists($pdo, $email)) {
                    //VERIFICA SE O ACTIVATION CODE PERTENCE AO EMAIL
                    if (DB_compareActivationCode($pdo, $email, $code)) {
                        //SE TRUE ATIVA CONTA
                        if (DB_activateUserAccount($pdo, $email)) {
                            header('Location: login.php');
                            $msg = 'ACCOUNT SUCESSUFULY ACTIVATED';
                        } else {
                            //SENAO
                            $msg = 'AN ERROR OCCURED WHILE ACTIVATING ACCOUNT';
                        }
                    } else {
                        //SENAO INFORMA
                        $msg = 'WRONG ACTIVATION CODE!';
                    }
                } else {
                    //SENAO INFORMA
                    $msg = 'INCORRECT DATA. PLEASE TRY AGAIN!';
                }
            }
            ?>
				                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="registration-form">
				                    	<div class="form-group"<h4><?php echo $msg; ?></h4>>
				                    		<label class="sr-only" for="form-first-name">Username</label>
                                                                <input type="text" name="activateText" placeholder="Place your Ativation code here" class="form-first-name form-control" id="form-first-name" required autofocus>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
                                                                <input type="email" name="email" placeholder="youremail@email.com" class="form-email form-control" id="form-email"required>
				                        </div>
                                                        <button type="submit" class="btn" name="activate">Activate Account</button>
                                                        <h2><?php echo $forgotPassword; ?></h2>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by  <a href="http://google.pt" target="_blank"><strong>Easy Solutions</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>