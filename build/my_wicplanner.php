<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>

	<div class="page-content">
		<div class="container-fluid" style="overflow: auto">
                    
                    			<section class="box-typical box-typical-max-280">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3>Bootstrap Table Examples</h3>
						</div>
					</div>
				</header>
				<div class="box-typical-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-1"/>
											<label for="tbl-check-1"></label>
										</div>
									</td>
									<td><a href="#">State</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-2"/>
											<label for="tbl-check-2"></label>
										</div>
									</td>
									<td><a href="#">Value</a></td>
									<td>Revene for last quarter in state America.</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-no-margin" value="50" max="100">50%</progress>
											<div class="progress-with-amount-number">50%</div>
										</div>
									</td>
									<td nowrap="nowrap">27.051<span class="caret caret-up color-green"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td colspan="2" width="40%">
										<div class="bar-chart-wrapper">
											<span class="bar-chart">2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,1</span>
											<div class="val left">0</div>
											<div class="val right">1,57 м</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-3"/>
											<label for="tbl-check-3"></label>
										</div>
									</td>
									<td><a href="#">Assignee</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-danger progress-no-margin" value="75" max="100">75%</progress>
											<div class="progress-with-amount-number">75%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-4"/>
											<label for="tbl-check-4"></label>
										</div>
									</td>
									<td><a href="#">Data Create</a></td>
									<td>Revene for last quarter in state America.</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-info progress-no-margin" value="15" max="100">15%</progress>
											<div class="progress-with-amount-number">15%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td colspan="2">
										<div class="bar-chart-wrapper">
											<span class="bar-chart">2,5,3,6,2,1,2,1,2,1,2,5,3,1,2,1,4,1,2,1,2,5,3,6,2,1,1,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,1,1,2,1,4,1,2,1,2,1,1,1,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,1</span>
											<div class="val left">0</div>
											<div class="val right">1,57 м</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-5"/>
											<label for="tbl-check-5"></label>
										</div>
									</td>
									<td><a href="#">In Progress</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
								<tr class="table-active">
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-6"/>
											<label for="tbl-check-6"></label>
										</div>
									</td>
									<td><a href="#">State</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
								<tr class="table-success">
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-7"/>
											<label for="tbl-check-7"></label>
										</div>
									</td>
									<td><a href="#">Value</a></td>
									<td>Revene for last quarter in state America.</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td colspan="2">
										<div class="bar-chart-wrapper">
											<span class="bar-chart">2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,1</span>
											<div class="val left">0</div>
											<div class="val right">1,57 м</div>
										</div>
									</td>
								</tr>
								<tr class="table-warning">
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-8"/>
											<label for="tbl-check-8"></label>
										</div>
									</td>
									<td><a href="#">Assignee</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
								<tr class="table-danger">
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-9"/>
											<label for="tbl-check-9"></label>
										</div>
									</td>
									<td><a href="#">Data Create</a></td>
									<td>Revene for last quarter in state America.</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td colspan="2">
										<div class="bar-chart-wrapper">
											<span class="bar-chart">2,5,3,6,2,1,2,1,2,1,2,5,3,1,2,1,4,1,2,1,2,5,3,6,2,1,1,6,2,1,2,5,3,6,2,1,4,6,2,1,2,5,1,1,2,1,4,1,2,1,2,1,1,1,2,1,4,6,2,1,2,5,3,6,2,1,4,6,2,1,2,1</span>
											<div class="val left">0</div>
											<div class="val right">1,57 м</div>
										</div>
									</td>
								</tr>
								<tr class="table-info">
									<td class="table-check">
										<div class="checkbox checkbox-only">
											<input type="checkbox" id="tbl-check-10"/>
											<label for="tbl-check-10"></label>
										</div>
									</td>
									<td><a href="#">In Progress</a></td>
									<td>Text</td>
									<td width="150">
										<div class="progress-with-amount">
											<progress class="progress progress-success progress-no-margin" value="25" max="100">25%</progress>
											<div class="progress-with-amount-number">25%</div>
										</div>
									</td>
									<td nowrap="nowrap">12.423<span class="caret color-red"></span></td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">NULL</div>
										0%
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Unique values</div>
										72
									</td>
									<td>
										<div class="font-11 color-blue-grey-lighter uppercase">Most commons</div>
										Florida (13%)
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			</section><!--.box-typical-->
                    
			
                    <div class=".col-xs-12 .col-sm-6 .col-lg-8">

                        <table id="table-edit" class="table table-bordered table-hover" >
				<thead>
				<tr>
					<th width="1">
						ID
					</th>
					<th>Name</th>
					<th width="120">Date Created</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Last quarter revene</td>
						
						<td class="table-date">6 minets ago</td>
						<td class="table-photo">
							<img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
						</td>
					</tr>
				</tbody>
			</table>
                    </div>
                    
                    
                    
                    
                    

		</div><!--.container-fluid-->
	</div><!--.page-content-->
        
        
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
</body>
</html>