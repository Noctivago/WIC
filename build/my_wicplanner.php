<?php
include_once 'includes/head_sideMenu.php';
include_once '../build/db/functions.php';
include_once '../build/db/dbconn.php';
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$msg = '';
?>


<div class="page-content" style="height: 817px;">
		<div class="container-fluid">
			<div class="row" style="
    height: 700px;
">
				
                            <div class="col-lg-6">
                            
                            <!--<div class="col-lg-6 col-lg-push-3 col-md-12">-->
                                    
                                                            <section class="box-typical box-typical-max-280">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
							<h3> My Events - Wic Planner</h3>
						</div>
                                            <a class="font-icon font-icon-plus" href="add_wicplanner.php">	</a>
					</div>
				</header>
                                <div class="box-typical-body" style="overflow: hidden; padding: 0px; height: 700px; width: 504px;">
					<div class="table-responsive">
						<table class="table table-hover">
                                                    
                                                    <thead>
								<tr>
									<th >
										Event name
									</th>
									<th>Date</th>
									<th>User</th>
									
								
									<th></th>
									<th></th>
								</tr>
                                                    </thead>
                  
							<tbody>
								
								
								
								
								
								<tr class="table-check">
									
									<td><a href="#">Nome</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
                                                                        <td class="table-photo">
                                                                            
                                                                                <a href="#" class="font-icon font-icon-pencil">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                            

                                                                        </td>
                                                                        <td class="table-photo">
 
                                                                            
                                                                                <a href="#" class="font-icon font-icon-del">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                        </td>
                                                                        
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">Nome</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>

                                                                        <td class="table-photo">
                                                                            
                                                                                <a href="#" class="font-icon font-icon-pencil">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                            

                                                                        </td>
                                                                        <td class="table-photo">
 
                                                                            
                                                                                <a href="#" class="font-icon font-icon-del">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                        </td>
                                                                       
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">Nome</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
                                                                        <td class="table-photo">
                                                                            
                                                                                <a href="#" class="font-icon font-icon-pencil">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                            

                                                                        </td>
                                                                        <td class="table-photo">
 
                                                                            
                                                                                <a href="#" class="font-icon font-icon-del">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
                                                                        <td>
                                                                            <div class="tbl-cell tbl-cell-action">
                                                                                <a href="#" class="plus-link-circle"><span>&cross;</span></a>
										</div>
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
                                                                        <td>
                                                                            <div class="tbl-cell tbl-cell-action">
                                                                                <a href="#" class="plus-link-circle"><span>&cross;</span></a>
										</div>
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">pareco</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
								
								</tr>
							
								
								
								
		
							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			</section>



					</section><!--.box-typical-->


				</div><!--.col- -->

                                
                                
                                
                                
                                
                                
                                <!--A PUTA COMEÇA AQUI-->
                                
                                
                                
                                
                                
                                
                                
                                <div class="col-lg-6">
				<!--<div class="col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">-->
					
                        <section class="box-typical box-typical-max-280">
				<header class="box-typical-header">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-title">
                                                    <h3> Services in "Event Name"</h3>
						</div>
					</div>
				</header>
				 <div class="box-typical-body" style="overflow: hidden; padding: 0px; height: 700px; width: 504px;">
					<div class="table-responsive">
						<table class="table table-hover">
                                                    <thead>
								<tr>
									<th >
										Event name
									</th>
									<th>Date</th>
									<th>User</th>
									
								
									<th></th>
									<th></th>
								</tr>
                                                    </thead>
                  
							<tbody>
								
								
								
								
								
								<tr class="table-check">
									
									<td><a href="#">Nome</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>
  
                                                                        <td class="table-photo">
                                                                            
                                                                                <a href="#" class="font-icon font-icon-pencil">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                            

                                                                        </td>
                                                                        <td class="table-photo">
 
                                                                            
                                                                                <a href="#" class="font-icon font-icon-del">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                        </td>
								
								</tr>
								<tr class="table-check">
									
									<td><a href="#">Nome</a></td>
									<td>Daata</td>
                                                                        <td class="table-photo">
                                                                                <img src="img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                                                                        </td>

                                                                        <td class="table-photo">
                                                                            
                                                                                <a href="#" class="font-icon font-icon-pencil">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                            

                                                                        </td>
                                                                        <td class="table-photo">
 
                                                                            
                                                                                <a href="#" class="font-icon font-icon-del">
                                                                                    </a>
                                                                                    <!--<span>&cross;</span></a>-->
										
                                                                        </td>
								
								</tr>
	
							
								
								
								
		
							</tbody>
						</table>
					</div>
				</div><!--.box-typical-body-->
			</section><!--.box-typical-->


				</div><!--.col- -->

<!--				<div class="col-lg-3 col-md-6 col-sm-6">

				</div>.col- -->
			</div><!--.row-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<!--<div class="control-panel-container">
            <ul>
	        <li class="tasks">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-tasks"></span>
	                </a>
	                <span class="text">Task list</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <div class="control-item-content-text">You don't have pending tasks.</div>
	            </div>
	        </li>
	        <li class="sticky-note">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-file"></span>
	                </a>
	                <span class="text">Sticky Note</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <div class="control-item-content-text">
	                    StartUI – a full featured, premium web application admin dashboard built with Twitter Bootstrap 4, JQuery and CSS
	                </div>
	            </div>
	        </li>
	        <li class="emails">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle">
	                    <span class="caret-down fa fa-caret-down"></span>
	                    <span class="icon fa fa-envelope"></span>
	                </a>
	                <span class="text">Recent e-mails</span>
	                <div class="actions">
	                    <a href="#">
	                        <span class="fa fa-refresh"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-cog"></span>
	                    </a>
	                    <a href="#">
	                        <span class="fa fa-trash"></span>
	                    </a>
	                </div>
	            </div>
	            <div class="control-item-content">
	                <section class="control-item-actions">
	                    <a href="#" class="link">My e-mails</a>
	                    <a href="#" class="mark">Mark visible as read</a>
	                </section>
	                <ul class="control-item-lists">
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                    <li>
	                        <a href="#">
	                            <h6>Welcome to the Community!</h6>
	                            <div>Hi, welcome to the my app...</div>
	                            <div>
	                                Message text
	                            </div>
	                        </a>
	                        <a href="#" class="reply-all">Reply all</a>
	                    </li>
	                </ul>
	            </div>
	        </li>
	        <li class="add">
	            <div class="control-item-header">
	                <a href="#" class="icon-toggle no-caret">
	                    <span class="icon fa fa-plus"></span>
	                </a>
	            </div>
	        </li>
	    </ul>
	    <a class="control-panel-toggle">
	        <span class="fa fa-angle-double-left"></span>
	    </a>
	</div>-->
        
        <script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="js/lib/tether/tether.min.js" type="text/javascript"></script>

	
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        

	<script src="js/lib/salvattore/salvattore.min.js"></script>

        
        
        
        
        
        
        
        
        
        
        
        
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