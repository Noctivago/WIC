<?php
include ("includes/head_sideMenu.php");
//include_once '../build/db/dbconn.php';
//include_once '../build/db/session.php';
?>

<!--    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">-->

<!--    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">-->
<!--    <link rel="stylesheet" href="css/main.css">-->
    
<div class="page-content">
    <div class="container-fluid">
        
                    <div class="box-typical box-typical-padding" style="height: 80px">
				<h1 class="text-center">Help</h1>
                    </div>
                    <div class="box-typical box-typical-padding" style="height: 100px">
                                <p>For any help contact :  <a href="mailto:support@wic.club" target="_top">support@wic.club</a></p>
                                <p>Support Line Center : US +1 646-564-5693 EU +351968 412 97 - +351 929 248 860</p>
                    </div>
				
		           </div>
               			
             
                       	
                </div>
                                                                                               
                                                    
        
<script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="js/lib/tether/tether.min.js" type="text/javascript"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>

<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script src="js/lib/salvattore/salvattore.min.js"></script>  

        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
<!--	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
	
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
