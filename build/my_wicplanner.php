<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>

	<div class="page-content">
		<div class="container-fluid">
			
                    <div class="col-lg-3 ">

                        <table id="table-edit" class="table table-bordered table-hover" style="overflow: auto">
				<thead>
				<tr>
					<th width="1">
						#
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