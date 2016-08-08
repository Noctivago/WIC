<html>
<?php
include ("includes/testhead.php");
?>
    
    

   
  
 

	<div class="page-content">
		<div class="container-fluid">
                    <div id="boxes" class="card-typical window" >
            <div  id="dialog" class=" card-typical window">
<!--                <div class="card-typical-section">
                    <div class="user-card-row">
                        atum
                    </div>
                </div>
                <div class="card-typical-content">Welcome to Wic
                    <div class="photo">
                        <img src="img/wic_logo.png" style="max-width:80px;">
                    </div>
                
                
                <header class="title"> Welcome TO Wic</header>
                <p>Simple Modal Window | </p>
                </div>-->
                
                		<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
<!--									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
                                                                                    <img src="img/wic_logo.png"style="max-width: 80px" alt="">
										</a>
									</div>-->
									<div class="tbl-cell">
                                                                            <p class="user-card-row-name"><h3>Welcome to WiC</h3></p>
										<!--<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>-->
									</div>
									<div class="tbl-cell tbl-cell-status">
                                                                            
										<a href="#">
                                                                                    <img src="img/wic_logo.png"style="max-width: 80px" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title">Search, Chat and Deal with the best vendors for yours:</header>
                                                        <br>                                
<p>Social Events, Meet ups, Brand activations, product launch, Fashion shows, Fast meetings, executive breakfasts, coffee breaks, business dinners, galas, corporate parties and a lot more.</p>
<br>
<p>Enjoy the biggest community of events and entertainment:</p>

<p >&emsp;&emsp;&ordm;&emsp;4000+ services for events around the world</p>

<p> &emsp;&emsp;&ordm;&emsp;700+ vendors</p>

<p> &emsp;&emsp;&ordm;&emsp;The best tools and support for your event management.</p>
<br>
<p>This is not a marketplace. The transaction or any type of sale is responsible for the Planner and Vendor. </p>
<br>
<p>Each event is unique and there is no customized prices for any type of service provided.</p>
<br>

						</div>
						<!--<div class="card-typical-section">-->
                                                <div class="card-typical-linked"><a class="btn btn-rounded btn-success close" style="font-size: xx-large;margin: 10px auto auto 100px; display: table-row-group;">Start Planning</a>
                                                
                                                    <p >Event Your Life !</p>
                                                <br><p >WiC&copy; All rights reserved 2016</p></div>
<!--							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>-->
                                                     
						<!--</div>-->
					</article><!--.card-typical-->
            
            
            <!--<a href="#" class="close">Close it</a>-->
            
<!--            <div class="box-typical-footer">
            <button class="btn btn-rounded btn-primary close"> Start Planning</button>
            
            </div>-->
            
            </div>
            <!-- Mask to cover the whole screen -->
            <div style=" display: none; opacity: 0.8;" id="mask"></div>
            </div>
                    
                     <div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
			<div class="cards-grid" data-columns>
				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-2.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<div class="photo">
								<img src="img/gall-img-1.jpg" alt="">
							</div>
                                                    <header class="title"><a href="service_profile.php">TESTE GALERIA!!!!!</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow!</p>
						</div>
						<div class="card-typical-section">
                                                    <div class="card-typical-linked">
                                                        
								<i  class="font-icon font-icon-plus" alt="Add to my Wic Planner"></i>
                                                        </div>
                                                        
                                                        
                                                        
							<a href="#" class="card-typical-likes">
								
                                                            <button class="btn btn-warning " style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onmouseover="InfoBox info('Add to Wic')"></button>
                                                            <button class="btn btn-warning " style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onmouseover="InfoBox info('Add to Wic')"></button>
                                                                
								
							</a>
                                                    
						</div>
                                            <div class="card-typical-section">
                                                <div class="card-typical-linked">

                                                </div>

                                                <div class="card-typical-likes">

                                                <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
                                                <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>


                                                </div>>
                                            </div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-1-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-2-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<div class="photo">
								<img src="img/gall-img-4.jpg" alt="">
							</div>
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow!</p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-3.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-4.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-3-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<div class="photo">
								<img src="img/gall-img-5.jpg" alt="">
							</div>
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow!</p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-2.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-1-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-2.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<div class="photo">
								<img src="img/gall-img-6.jpg" alt="">
							</div>
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow!</p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-2-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/photo-64-3.jpg" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star active"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow! </p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

				<div class="card-grid-col">
					<article class="card-typical">
						<div class="card-typical-section">
							<div class="user-card-row">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-photo">
										<a href="#">
											<img src="img/avatar-3-64.png" alt="">
										</a>
									</div>
									<div class="tbl-cell">
										<p class="user-card-row-name"><a href="#">Tim Colins</a></p>
										<p class="color-blue-grey-lighter">3 days ago - 23 min read</p>
									</div>
									<div class="tbl-cell tbl-cell-status">
										<a href="#" class="font-icon font-icon-star"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-typical-section card-typical-content">
							<div class="photo">
								<img src="img/gall-img-7.jpg" alt="">
							</div>
							<header class="title"><a href="#">The Jacobs Ladder of coding</a></header>
							<p>That’s a great idea! I’m sure we could start this project as soon as possible. Let’s meet tomorow!</p>
						</div>
						<div class="card-typical-section">
							<div class="card-typical-linked">in <a href="#">Coders Life</a></div>
							<a href="#" class="card-typical-likes">
								<i class="font-icon font-icon-heart"></i>
								123
							</a>
						</div>
					</article><!--.card-typical-->
				</div><!--.card-grid-col-->

			</div><!--.card-grid-->
			<div class="clear"></div>

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

        <!--<script src="js/app.js"></script>-->
        
        
        
        
        
        
        
        
        
        
        
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
<script src="js/app.js"></script>

        <script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
	<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
	<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="js/lib/select2/select2.full.min.js"></script>
        
               	<script>
		$(function() {
			$('#tags-editor-textarea').tagEditor();
		});
	</script>


</body>
</html>










<article class = "card-typical">
<div class = "card-typical-section">
<div class = "user-card-row">
<div class = "tbl-row">
<div class = "tbl-cell tbl-cell-photo">
<a href = "profile_org.php?Organization=' . $row['OID'] . '">
<img src = "' . $row['OPP'] . '" alt = "Avatar">
</a>
</div>
<div class = "tbl-cell">
<p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
</div>
</div>
</div>
</div>
<div class = "card-typical-section card-typical-content">
<div class = "photo">
<img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
</div>
<header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
<p>' . $row['SDE'] . '</p>
</div>
<div class = "card-typical-section">
<input type = button onClick = window.open("./ajax/getMyWicsPopup.php?id=' . $row['SID'] . '", "AddToWiC", "width=550,height=500,left=30,top=30,toolbar=0,status=0,");
value = "+">
<button type = button onClick = window.open("./ajax/getMyWicsPopup.php?id=' . $row['SID'] . '", "AddToWiC", "width=550,height=500,left=30,top=30,toolbar=0,status=0,");
        value = "+"> </button>
</div>
</article>
</div>';

<article class = "card-typical">
<div class = "card-typical-section">
<div class = "user-card-row">
<div class = "tbl-row">
<div class = "tbl-cell tbl-cell-photo">
<a href = "profile_org.php?Organization=' . $row['OID'] . '">
<img src = "' . $row['OPP'] . '" alt = "Avatar">
</a>
</div>
<div class = "tbl-cell">
<p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
</div>
</div>
</div>
</div>
<div class = "card-typical-section card-typical-content">
<div class = "photo">
<img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
</div>
<header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
<p>' . $row['SDE'] . '</p>
</div>

<div class="card-typical-section">
<div class="card-typical-linked">
<button class="btn btn-warning font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = window.open("./ajax/getMyWicsPopup.php?id='.$row['SID'].'","AddToWiC","width=550,height=500,left=30,top=30,toolbar=0,status=0,");  > </button>
</div>
<a  class="card-typical-likes">
<button class="btn btn-warning font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;" type = button onClick = window.open("./ajax/getMyWicsPopup.php?id=' . $row['SID'] . '", "AddToWiC", "width=550,height=500,left=30,top=30,toolbar=0,status=0,");  > </button>
</a>
</div>
<div class = "card-typical-section">
<input type = button onClick = window.open("./ajax/getMyWicsPopup.php?id=' . $row['SID'] . '", "AddToWiC", "width=550,height=500,left=30,top=30,toolbar=0,status=0,"); >
    
<input type = button onClick = window.open("./ajax/getMyWicsPopup.php?id=' . $row['SID'] . '", "AddToWiC", "width=550,height=500,left=30,top=30,toolbar=0,status=0,");
value = "+">
</div>

</article>
</div>';