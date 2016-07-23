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
							<h3>23 Reports</h3>
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
									<th>Name</th>
									<th>Description</th>
									<th class="table-icon-cell">
										<i class="font-icon font-icon-heart"></i>
									</th>
									<th class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
									</th>
									<th>Date Created</th>
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
										<i class="font-icon font-icon-heart"></i>
										5
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									<td class="table-date">6 minets ago <i class="font-icon font-icon-clock"></i></td>
									<td class="table-photo">
										<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-2"/>
											<label for="table-check-2"></label>
										</div>
									</td>
									<td>
										Expenses in 2013
										<span class="hint-circle red"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Sample tips with long text into multiple lines. Sample tips with long text into multiple lines.">?</span>
									</td>
									<td class="color-blue-grey-lighter"></td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-heart"></i>
										5
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									<td class="table-date">2 hours ago <i class="font-icon font-icon-clock"></i></td>
									<td class="table-photo">
										<img src="img/photo-64-2.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Todd<br/>Fox">
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-3"/>
											<label for="table-check-3"></label>
										</div>
									</td>
									<td>
										Accounting
										<span class="hint-circle green"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey-lighter">Lorem ipsum dolor sit amet</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-heart"></i>
										5
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									<td class="table-date">5 hour ago <i class="font-icon font-icon-clock"></i></td>
									<td class="table-photo">
										<img src="img/photo-64-3.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Raina<br/>Cabrera">
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="table-check-4"/>
											<label for="table-check-4"></label>
										</div>
									</td>
									<td>
										Srtarbucks orders
										<span class="hint-circle blue"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
										<span class="hint-circle orange"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
										<span class="hint-circle purple"
											  data-toggle="tooltip"
											  data-placement="top"
											  title="Help">?</span>
									</td>
									<td class="color-blue-grey-lighter">Ut euismod augue ut nulla aliquam? eu congue ipsum eusmod</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-heart"></i>
										5
									</td>
									<td class="table-icon-cell">
										<i class="font-icon font-icon-comment"></i>
										24
									</td>
									<td class="table-date">12 hours ago <i class="font-icon font-icon-clock"></i></td>
									<td class="table-photo">
										<img src="img/photo-64-4.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Lilian<br/>Leon">
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