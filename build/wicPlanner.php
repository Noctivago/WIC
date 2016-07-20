<?php
include ("includes/head_sideMenu.php");

?>
<link rel="stylesheet" href="css/lib/bootstrap-table/bootstrap-table.min.css">
	<div class="page-content">
		<div class="container-fluid">

			<section class="box-typical">
				<div id="toolbar">
					<button id="remove" class="btn btn-danger remove" enabled>
						<i class="font-icon font-icon-close-2"></i> Delete WIC
					</button>
				</div>
				<div class="table-responsive">
					<table id="table"
						   class="table table-striped"
						   data-toolbar="#toolbar"
						   data-search="true"
						   data-show-refresh="true"
						   data-show-toggle="true"
						   data-show-columns="true"
						   data-show-export="true"
						   data-detail-view="true"
						   data-detail-formatter="detailFormatter"
						   data-minimum-count-columns="2"
						   data-show-pagination-switch="true"
						   data-pagination="true"
						   data-id-field="id"
						   data-page-list="[10, 25, 50, 100, ALL]"
						   data-show-footer="false"
						   data-response-handler="responseHandler">
					</table>
				</div>
			</section><!--.box-typical-->

		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/lib/bootstrap-table/bootstrap-table.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table-export.min.js"></script>
	<script src="js/lib/bootstrap-table/tableExport.min.js"></script>
        <!--TABELA AQUI-->
	<script src="js/lib/bootstrap-table/bootstrap-table-init.js"></script>

<script src="js/app.js"></script>
</body>
</html>