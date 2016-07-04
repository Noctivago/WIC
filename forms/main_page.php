
<?php
 include("default_elements/header_default.php");

?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include ("default_elements/NavigationBar.php");
        ?>
            <!-- Top Menu Items -->
            <?php
            include ("default_elements/TopMenu.php");
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
            include ("default_elements/sideBar.php");
            
            ?>

            <!-- /.navbar-collapse -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
            <?php
                include("default_elements/pageHeading.php");
             ?>
        <!-- /.row -->

        <!-- Projects Row -->
         <?php
        include ("default_elements/images_rows.php");
        ?>
        <!-- /.row -->

        <!-- Projects Row -->
        
       
        <!-- Projects Row -->
        
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <?php
        include ("default_elements/pagination.php");
        ?>
        
        <!-- /.row -->

        
                <!-- /.row -->
              

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="../assets/assets_main/js/jquery.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/assets_main/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Morris Charts JavaScript -->

    
    <script src="../assets/assets_main/js/plugins/morris/raphael.min.js" type="text/javascript"></script>
    <script src="../assets/assets_main/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="../assets/assets_main/js/plugins/morris/morris-data.js" type="text/javascript"></script>
</body>

</html>
