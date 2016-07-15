
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

                                <div class="form-bottom" >
                                
                                    
                                    <h4 align="center"> Category owners</h4>
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <div class="form-group">
                                            <select class="form-username form-control" name="org1" id="org1" onchange="fill_Users_Category()" >
                                                <?php DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="category" id="category" >
                                                <?php DB_readCategoryAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="userOrg1" id="userOrg1" disabled>
                                                <option id="user" value='0'> Choose a User</option>
                                            </select>
                                        </div>
                                        <button type="submit" id="addCategory" class="btn" name="addCategory" visible="true">Add Category Owner</button>
                                    </form>
                                </div>
                            </div>

                            <div id="title-1" style = "Display: none">
                                <table class="col-md-12 table-bordered table-striped table-condensed cf " id="table1" style = "Display: none">
                                    <thead class="cf">
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
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
                                <!--div class="form-top">
                                    <div class="form-top-left"></div>
                                    <div class="form-top-right">
                                    </div>

                                </div-->

                                <div class="form-bottom">
                                    <h4 align="center"> Sub Category owners</h4>
                                    <form role="form" action="" method="post" class="login-form">
                                        <div class="form-group">
                                            <select class="form-username form-control" name="org2" id="org2" onchange="fill_Users_Sub_Category()">
                                                <?php DB_readOrganizationAsSelect($pdo, $_SESSION['id']) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="Sub_Category" id="Sub_Category" >
                                                <?php DB_readSubCategoryAsSelect($pdo) ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-username form-control" name="userOrg2" id="userOrg2" disabled>
                                                <option id ='user' value='0'> Choose a User</option>
                                            </select>
                                        </div>
                                        <button type="submit" id="request" class="btn" name="request" visible="true">Add Sub Category Owner</button>
                                    </form>
                                </div>
                            </div>
                            <div id="title-2" style="Display: none">
                                <table class="col-md-12 table-bordered table-striped table-condensed cf " style = "Display: none" id="table2">
                                    <thead class="cf">
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Remove</th>
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
<script src="../../js/OrganizationUsers.js" type="text/javascript"></script>



