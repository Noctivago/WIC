<?php
include ("includes/head_sideMenu.php");
?>

<div class="page-content">
		<div class="container-fluid">
			<div class="box-typical box-typical-padding">
				<h1 class="text-center">F.A.Q.</h1>
				<br/>
				
		           </div>
                </div>				<div class="col-md-12">
                                                     <section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
						<article class="panel">
							<div class="panel-heading" role="tab" id="headingOne">
								<a data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseOne"
								   aria-expanded="true"
								   aria-controls="collapseOne">
									What is WiC?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
											
											</div>
										</div>
									</div>
                                                                    <p>WiC is the first events and entertainment global brand.<br></p>
                                                  
                                                                    <p>WiC is an online platform that helps you plan your event. In just a few steps, look for the services you need and talk with our suppliers using a web chat where you can send text messages and bargain the price of the service on the go.</p>
							</div>
							</div>
						</article>
						<article class="panel">
							<div class="panel-heading" role="tab" id="headingTwo">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseTwo"
								   aria-expanded="false"
								   aria-controls="collapseTwo">
									How can I join WiC community?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
											
											</div>
											<div class="tbl-cell">
											
											</div>
										</div>
									</div>
								    <p>If you’re a supplier: Register here (link here)<br></p>
                                                                    <p>If you’re a user: Register here (link here)<br></p>
                                                                    <p>You can use your email address to register or login using your Facebook account.</p>
						</div>
							</div>
						</article>
						<article class="panel">
							<div class="panel-heading" role="tab" id="headingThree">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseThree"
								   aria-expanded="false"
								   aria-controls="collapseThree">
									Collapsible Group Item #3
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>teste</p>
								</div>
							</div>
						</article>
					</section>
                                                </div>
             
                                    
					
	<script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
        <script src="js/lib/jquery/jquery.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/lib/select2/select2.full.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	<script src="js/lib/ladda-button/spin.min.js"></script>
	<script src="js/lib/ladda-button/ladda.min.js"></script>
	<script src="js/lib/ladda-button/ladda-button-init.js"></script>
	<script type="text/javascript" src="js/lib/jquery-contextmenu/jquery.contextMenu.min.js"></script>
	<script type="text/javascript" src="js/lib/jquery-contextmenu/jquery.ui.position.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.panel').lobiPanel({
				sortable: true
			});

			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var dataTable = new google.visualization.DataTable();
				dataTable.addColumn('string', 'Day');
				dataTable.addColumn('number', 'Values');
				// A column for custom tooltip content
				dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
				dataTable.addRows([
					['MON',  130, ' '],
					['TUE',  130, '130'],
					['WED',  180, '180'],
					['THU',  175, '175'],
					['FRI',  200, '200'],
					['SAT',  170, '170'],
					['SUN',  250, '250'],
					['MON',  220, '220'],
					['TUE',  220, ' ']
				]);

				var options = {
					height: 314,
					legend: 'none',
					areaOpacity: 0.18,
					axisTitlesPosition: 'out',
					hAxis: {
						title: '',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						textPosition: 'out'
					},
					vAxis: {
						minValue: 0,
						textPosition: 'out',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						baselineColor: '#16b4fc',
						ticks: [0,25,50,75,100,125,150,175,200,225,250,275,300,325,350],
						gridlines: {
							color: '#1ba0fc',
							count: 15
						},
					},
					lineWidth: 2,
					colors: ['#fff'],
					curveType: 'function',
					pointSize: 5,
					pointShapeType: 'circle',
					pointFillColor: '#f00',
					backgroundColor: {
						fill: '#008ffb',
						strokeWidth: 0,
					},
					chartArea:{
						left:0,
						top:0,
						width:'100%',
						height:'100%'
					},
					fontSize: 11,
					fontName: 'Proxima Nova',
					tooltip: {
						trigger: 'selection',
						isHtml: true
					}
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
				chart.draw(dataTable, options);
			}
			$(window).resize(function(){
				drawChart();
				setTimeout(function(){
				}, 1000);
			});

			$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel){
				$('.dahsboard-column').matchHeight();
			});
		});
	</script>
        
        <!--scrpit-messenger-->
        <script>
    $(function() {
        $('.chat-settings .change-bg-color label').on('click', function() {
            var color = $(this).data('color');

            $('.messenger-message-container.from').each(function() {
                $(this).removeClass(function (index, css) {
                    return (css.match (/(^|\s)bg-\S+/g) || []).join(' ');
                });

                $(this).addClass('bg-' + color);
            });
        });
    });
</script>


<script src="js/app.js"></script>
</body>
</html>