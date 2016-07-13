
<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">

        <div class="top-content" style="height: 480px">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <link rel="stylesheet"   link href="../../assets/assests_sidebar/css/tabela.css" rel="stylesheet" type="text/css"/>
            <div class="container">
    <div class="row">
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
                           

                                                       </div>
                        
                            <div class="form-bottom">
                                <h4 align="center"> Category owners</h4>
                                <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                    <div class="form-group">
                                        <select class="form-username form-control" name="org" id="org" onchange="viewAllUsersInOrganization()">
                                            <h4> <?php echo $msg; ?></h4>
                                            <?php DB_readOrganizationAsSelect($pdo, $userId) ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Adress:</label>
                                        <input type="text" style="height: 40px" name="password" placeholder="Last Name" class="form-password form-control" id="form-password" required>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    
                     <div id="no-more-tables" >
                                <table class="col-md-12 table-bordered table-striped table-condensed cf " id="table1" style = "Display: true">
                                    <thead class="cf">
                                        <tr>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Remove</th>	
                                        </tr>
                                    </thead>
                                    <tbody id="body1">
                                    </tbody>
                                </table>
                            </div>
                    
                    
                    
                    
                    </div>
                
<div class="col-sm-1"></div>
                        
                        <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left"></div>
                            <div class="form-top-right">
</div>
                               
                        </div>

                            <div class="form-bottom">
                                <h4 align="center"> Sub Category owners</h4>
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <select class="form-username form-control" name="org" id="org" onchange="">
                                            <?php DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-username form-control" name="org" id="category" onchange="">
                                            <?php DB_readCategoryAsSelect($pdo) ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-username form-control" name="org" id="user" onchange="">
                                            <?php DB_User_In_Organization($pdo, 23) ?>
                                        </select>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                                <div id="no-more-tables" >
                            <table class="col-md-12 table-bordered table-striped table-condensed cf " style = "Display: true" id="table2">
                                <thead class="cf">
                                    <tr>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                    </tr>
                                </thead>
                                <tbody id="body2">
                                </tbody>
                            </table>
                        </div>
                            </div>
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



