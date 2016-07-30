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
<!--                        <tbody>
                            //<?php
//                            $userId = $_SESSION['id'];
//                            DB_BuildInvitesTable($pdo, $userId);
//                            ?>

                        </tbody>-->
                    </table>
                </div>
            </div><!--.box-typical-body-->
        </section><!--.box-typical-->
        
        
        
         <section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>My Team</h3>
						</div>
<!--						<div class="tbl-cell tbl-cell-action-bordered">
							<button type="button" class="action-btn"><i class="font-icon font-icon-pencil"></i></button>
						</div>
						<div class="tbl-cell tbl-cell-action-bordered">
							<button type="button" class="action-btn"><i class="font-icon font-icon-re"></i></button>
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
                                                                    <th> User</th>
									<th>Name</th>
									<th>Service Name</th>
									<th>Role Permission Management</th>
									<th class="table-icon-cell">
                                                                            
										 Save
                                                                                
									</th>
									<th class="table-icon-cell">
										 Remove
									</th>
									
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
									<td>
										Last quarter revene
										<span class="hint-circle"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey">
                                                                        cagalhoes secos
                                                                        
                                                                        </td>
									<td class="color-blue-grey-lighter">
                                                                        <div class="checkbox checkbox-only">
                                                                                    <input type="checkbox" id="table-check-8"/>
                                                                                    <label for="table-check-8" style="width: 174px" title="Edit Service" >Edit service</label>
										</div>
                                                                            <br>
										<div class="checkbox checkbox-only">
                                                                                    <input type="checkbox" id="table-check-8"/>
                                                                                    <label for="table-check-8" style="width: 174px">Talk with customers</label>
										</div>
                                                                        
                                                                        </td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-folder"></i>
										
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-trash"></i>
										
									</td>
									
									
								</tr>
								<tr>
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
									<td>
										Last quarter revene
										<span class="hint-circle"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey">
                                                                        cagalhoes secos
                                                                        
                                                                        </td>
									<td class="color-blue-grey-lighter">
                                                                        <div class="checkbox checkbox-only">
                                                                                    <input type="checkbox" id="table-check-8"/>
                                                                                    <label for="table-check-8" style="width: 174px" title="Edit Service" >Edit service</label>
										</div>
                                                                            <br>
										<div class="checkbox checkbox-only">
                                                                                    <input type="checkbox" id="table-check-8"/>
                                                                                    <label for="table-check-8" style="width: 174px">Talk with customers</label>
										</div>
                                                                        
                                                                        </td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-folder"></i>
										
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-trash"></i>
										
									</td>
									
								</tr>
								


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
        
        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
<script src="js/lib/select2/select2.full.min.js"></script>

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





