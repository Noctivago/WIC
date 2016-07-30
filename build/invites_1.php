<?php
//include_once 'includes/head_sideMenu.php';
//include_once '../build/db/functions.php';
//include_once '../build/db/dbconn.php';
//include_once '../build/db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//$wicSelected = (filter_var($_POST ['id']));

include ("includes/head_sideMenu.php");
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
$msg = '';
?>			
<div class="page-content">
    <div class="container-fluid">
        <section class="box-typical">
            <header class="box-typical-header">
                <div class="tbl-row">
                    <div class="tbl-cell tbl-cell-title">
                        <h3>My team</h3>
                    </div>
                    <!-- Botoes edit-->
<!--                    	<div class="tbl-cell tbl-cell-action-bordered">
                                    <button type="button" class="action-btn"><i class="font-icon font-icon-pencil"></i></button>
                                </div>
                                <div class="tbl-cell tbl-cell-action-bordered">
                                     <button type="button" class="action-btn"><i class="font-icon font-icon-trash"></i></button>
                                 </div>-->
                </div>
            </header>
            <div class="box-typical-body">

                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th> Name </th>
                                <th> Service Name</th>
                                <th> Role Service Management</th>
                                <th> Edit </th>
                                <th> Remove </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userId = $_SESSION['id'];
                            DB_BuildInvitesTable($pdo, $userId);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div><!--.box-typical-body-->
        </section><!--.box-typical-->

    </div>
    <!--9234-->
</div>
<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/lib/table-edit/jquery.tabledit.min.js"></script>
	<script>
		$(function () {
			$('#table-edit').Tabledit({
				url: 'example.php',
				columns: {
					identifier: [0, 'id'],
					editable: [[1, 'name'], [2, 'description']]
				}
			});
		});
	</script>

<script src="js/app.js"></script>





