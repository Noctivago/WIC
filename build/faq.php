<?php
include ("includes/head_sideMenu.php");
//include_once '../build/db/dbconn.php';
include_once '../build/db/session.php';
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
				<h1 class="text-center">F.A.Q.</h1>
				<br/>
				
		           </div>
               			<div class="col-md-12">
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
                                                           <?php alteraFirst($pdo)?>
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
								    <p>If you’re a supplier: Register <a href="sign_up_org.php">here</a><br></p>
                                                                    <p>If you’re a user: Register <a href="sign_up_user.php">here</a><br></p>
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
									How can you help me?
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
									
									<p>Send an email to <a href="mailto:support@wic.club" target="_top">support@wic.club</a> and our team will solve any problem within 24 hours.</p>
								</div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingFour">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseFour"
								   aria-expanded="false"
								   aria-controls="collapseFour">
									As a supplier, what are my benefits for joining WiC?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>Joining WiC’s platform brings you several benefits:</p>
                                                                        <br>
                                                                        <p>1.&nbsp;	More visibility</p>
                                                                        <p>2.&nbsp;	Easy communication with your clients using a web chat with:</p>
                                                                        <p>&nbsp;&nbsp;&nbsp;   a.	Text Messages</p>
                                                                        <p>&nbsp;&nbsp;&nbsp;   b.	Calls</p>
                                                                        <p>&nbsp;&nbsp;&nbsp;   c.	File Exchange</p>
                                                                        <p>3.&nbsp;	All your conversations/negotiations are saved, so that everything you deal with your client is registered.</p>
                                                                        <p>4.&nbsp;	Present your services to your clients in a simple and effective way</p>
                                                                        <p>5.&nbsp;	Increase your contact network with more clients and other event suppliers</p>
                                                                        <p>6.&nbsp;	Manage all your activity using just one platform</p>
								</div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingFive">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseFive"
								   aria-expanded="false"
								   aria-controls="collapseTwo">
									How can I join WiC community?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
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
							<div class="panel-heading" role="tab" id="headingSix">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseSix"
								   aria-expanded="false"
								   aria-controls="collapseSix">
									How do I cancel my account?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>If you want to cancel your WiC account, send an email to  <a href="mailto:support@wic.club" target="_top">support@wic.club</a> and we’ll cancel your account within 24 hours.</p>
								</div>
							</div>
						</article>
                                                	<article class="panel">
							<div class="panel-heading" role="tab" id="headingSeven">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseSeven"
								   aria-expanded="false"
								   aria-controls="collapseSeven">
									Is there any membership costs? Do I pay to use the platform?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>WiC is a free platform. There isn’t any kind of membership costs.</p>
								</div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingEight">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseEight"
								   aria-expanded="false"
								   aria-controls="collapseEight">
									What can I do if a supplier doesn’t reply on the chat?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>If a supplier isn’t answering your questions on the deadline he established, you can contact WiC Support team by sending an email to <a href="mailto:support@wic.club" target="_top">support@wic.club</a> and our team will help you get in touch with the supplier or to find a solution that fits all your needs with another of our suppliers.</p>
								</div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingNine">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseNine"
								   aria-expanded="false"
								   aria-controls="collapseNine">
									Do I have all the requirements to register as a supplier?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>To join the platform as a supplier there are no membership costs. If your company offers any of the services listed below, please feel free to join WiC:</p>
                                                                        <p>&nbsp;•	Space:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;o	Hotel<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;o	Venue<br>
                                                                           &nbsp;•	Food:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Restaurant<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o   Catering<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Bar<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Lounge<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Breakfast<br><br>
                                                                           &nbsp;•	Entertainment:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Entertainment<br><br>
                                                                           &nbsp;•	Decoration:<br><br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Decoration<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Furniture<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Inflatables<br><br>
                                                                           &nbsp;•	Team Building:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Team Building<br><br>
                                                                           &nbsp;•	Photographer & Videographer:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Photographer<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Videographer<br><br>
                                                                           &nbsp;•	Audiovisual:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Audio<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Visual<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Lighting<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     o	Infrastructures<br><br>
                                                                           &nbsp;•	Original<br>
                                                                         </p>
                                                                         <p>If you have any suggestion of any type of services, please send an email to <a href="mailto:support@wic.club" target="_top">support@wic.club</a></p>
                                                                </div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingTen">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseTen"
								   aria-expanded="false"
								   aria-controls="collapseTen">
									What are the reviews and how do they work?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>All the reviews are written by platform users (clients who hired services from our suppliers using the platform). So, all comments are based on the experience and quality of a supplier when providing a service to a user.</p>
                                                                        <p>Besides the written comments, users can evaluate suppliers using our star system, where 1 star means really bad and 5 stars means excellent.</p>
                                                                </div>
							</div>
						</article>      
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingEleven">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseEleven"
								   aria-expanded="false"
								   aria-controls="collapseEleven">
									How do I plan my event?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
                                                                        <b>&nbsp;&nbsp;   1.	Search</b>
                                                                        <p>WiC is a platform with suppliers from 10 countries and more than 20 cities around the world. All you have to do is tell us where your event is on the search box at the landing page to discover all the available services.</p>
                                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.	Tools to help you search: Each service has photos and descriptions, supplier profiles and reviews to help you select the perfect service for your event. Also on the left side of the screen, a set of icons help you filter the services by type (Space, Food, Entertainment, Decoration, Team Building, Photographer & Videographer, Audiovisual and Original) in order to easily find the right one for you.</p>
                                                                        <b>&nbsp;&nbsp;   2.	Contact suppliers to book the service</b>
                                                                        <p>After choosing the right service for your event, you can get in touch with the suppliers by clicking the chat button on the service page with a conversation balloon icon.</p>
                                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.	Tools to help you communicate with your suppliers: You can text chat the suppliers and bargain the prices instantaneously.</p>
                                                                        <b>&nbsp;&nbsp;   3.	WiC planner</b>
                                                                        <p>WiC planner is a tool that helps you organize all the services you need for your event, just like a notepad. You can save all the notes on your account, so you can check them in the future when organizing similar events.</p>

									
                                                                </div>
							</div>
						</article>
                                                <article class="panel">
							<div class="panel-heading" role="tab" id="headingTwelve">
								<a class="collapsed"
								   data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseTwelve"
								   aria-expanded="false"
								   aria-controls="collapseTwelve">
									How do I upload and edit my services as a supplier?
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												
											</div>
											<div class="tbl-cell">
												
											</div>
										</div>
									</div>
									
									<p>You can upload or edit your services on your account at the “Services” section.</p>
                                                                        <p>On the right side of your screen are all the necessary fields to upload or edit your service:</p>
                                                                        <p>1.	Service Name:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	What are you offering?<br><br><br>
                                                                           2.	Service description:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	Use 1 or 2 sentences to briefly describe your service.<br><br><br>
                                                                           3.	Service Type:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	Choose in witch category your service fits<br><br><br>
                                                                           4.	Service classification:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	Choose in witch sub-category your service fits.<br><br><br>
                                                                           5.	Upload photo:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	You can upload 1 or more photos that better represent what your service is. Be careful, a photo is worth a thousand words.<br><br><br>
                                                                           6.	Finalize:<br>
                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     a.	Just click the “Upload” button to post your service online or add more services by clicking the “Add more services” button.<br><br><br>
                                                                           <b> NOTE:</b> You can follow all the steps in real time on the center of your screen so you can preview the way the service will appear on the platform.
                                                                        </p>
							</div>
                                                        </div>
						</article>
					</section>
                                                </div>
             
                       	
                </div>
                                                    </div>                                                
                                                    
        
<script src="js/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="js/lib/tether/tether.min.js" type="text/javascript"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>

<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script src="js/lib/salvattore/salvattore.min.js"></script>  

        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
        <script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
        <script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="js/lib/select2/select2.full.min.js"></script>
<!--	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
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
