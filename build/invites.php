<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//$wicSelected = (filter_var($_POST ['id']));
$msg = '';
?>			
<div class="page-content">
    <div class="container-fluid">
<section class="box-typical">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>Invites</h3>
						</div>
						<div class="tbl-cell tbl-cell-action-bordered">
							<button type="button" class="action-btn"><i class="font-icon font-icon-pencil"></i></button>
						</div>
						<div class="tbl-cell tbl-cell-action-bordered">
							<button type="button" class="action-btn"><i class="font-icon font-icon-re"></i></button>
						</div>
						<div class="tbl-cell tbl-cell-action-bordered">
							<button type="button" class="action-btn"><i class="font-icon font-icon-trash"></i></button>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-head"/>
											<label for="table-check-head"></label>
										</div>
									</th>
									<th> User Name</th>
									<th> Service Name</th>
									<th> Email</th>
									<th class="table-icon-cell">
										<i class="font-icon font-icon-del"></i>
									</th>
									
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-1"/>
											<label for="table-check-1"></label>
										</div>
									</td>
									<td>
										Last quarter revene
										<span class="hint-circle"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
									
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-1"/>
											<label for="table-check-1"></label>
										</div>
									</td>
									<td>
										Last quarter revene
										<span class="hint-circle"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
									
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-1"/>
											<label for="table-check-1"></label>
										</div>
									</td>
									<td>
										Last quarter revene
										<span class="hint-circle"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey-lighter">Revene for last quarter in state America for year 2013, whith...</td>
									
									<td class="table-icon-cell">
										<i class="font-icon font-icon-mail"></i>
										24
									</td>
									
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			</section><!--.box-typical-->
                        
    </div>
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