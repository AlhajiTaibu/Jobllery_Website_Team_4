<?php  ob_start(); ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/jlogo.png">
	<link rel="stylesheet" type="text/css" href="css/index.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css"> 
</head>

<body>
<?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
		<!-- slideshow starts -->
	<div uk-slideshow="animation: fade" >

		<!-- Navbar starts from here -->
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar-container navibar" uk-navbar>

			    <div class="uk-navbar-left">
			        <ul class="uk-navbar-nav">
			            <li class="uk-active sitename" ><a href="index.php"><img class="sitelogo" src="images/jlogo.png"></a></li>
			        </ul>
			    </div>

			    <div class="uk-navbar-right">
			        <ul class="uk-navbar-nav">
                       <?php
                            if(isset($_SESSION['username'])){
                                if($_SESSION['user_role']=='client'){
                                  echo '<li class="uk-active"><a href="../client/index.php">'.$_SESSION['username'].'</a></li>';   
                                }elseif($_SESSION['user_role']=='freelancer'){
                                  echo '<li class="uk-active"><a href="../freelancer/index.php">'.$_SESSION['username'].'</a></li>';  
                                }else{
                                    
                                }
                               
                            }
                        ?>
                          
			            <li class="uk-active"><a href="../user_registration/login.php">LOG IN</a></li>
			            <li class="uk-active"><a href="../user_registration/register.php">SIGN UP</a></li>
			            <div class="uk-navbar-item">
			                <button class="uk-button uk-button-default navbutton"><a class="btns" href="../user_registration/login.php">Post a Job</a></button>
			        	</div>
			             <div class="uk-navbar-item">
			                <button class="uk-button uk-button-default navbutton1"><a class="btns" href="../workspace/workspace.php">Browse Jobs</a></button>
			        	</div>
			        </ul>
			    </div>

			</nav> <!-- Navbar ends here -->
		</div>
					<!-- slideshow settings -->
	        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 1200:400; animation: fade; autoplay: true;" >

	            <ul class="uk-slideshow-items">
	                <li>
	                    <img src="images/ad1.jpg"  alt="pic" uk-cover>
	                    <div class="uk-position-center uk-position-small uk-text-center uk-light">
	                    	<!-- text on slideshow -->
	                	<h2 class="uk-margin-remove"><a class="slidelink">Jobllery</a></h2>
	                	<p class="uk-margin-remove">Your dream job is waiting</p>
	            		</div>
	                </li>
	                <li>
	                    <img src="images/ad.jpg"  alt="pic" uk-cover>
	                </li>
	                <li>
	                    <img src="images/ad2.jpg"  alt="pic" uk-cover>
	                </li>

	            </ul>
	            			<!-- slideshow left and right navigation -->
	            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
	        </div>
	        				 <!-- three dots under slideshow -->
	          <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

    </div>	<!-- end of slideshow -->


     <!-- Categories -->
       <div class="categories">

       		<h3> Categories </h3>

       		<div class="cat_one">
       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/graphics.svg"></a>
       				</div>
       					<a href="#"> Graphic Designing </a> 
       			</div>

       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/lifestyle.svg"></a>	
       				</div>
       				<a href="#"> Lifestyle </a>
       			</div>
       		</div>
       		
       		<div class="cat_one">
       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/digitalmarketing.svg"></a>
       				</div>
       				<a href="#"> Digital Marketing </a>
       			</div>

       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/Audio.svg"></a>	
       				</div>
       					<a href="#"> Music and Audio </a>
       			</div>
       		</div>
       		
       		<div class="cat_one">
       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/programming.svg"></a>
       				</div>
       				<a href="#"> Programming and Tech. </a>
       			</div>

       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/writing.svg"></a>
       				</div>
       				<a href="#"> Writing & Translation </a>
       			</div>
       		</div>
       		
       		<div class="cat_one">
       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/video.svg"></a>	
    				</div>
       				<a href="#"> Video and Animation </a>
       			</div>

       			<div class="graph">
       				<div class="innerbox">
		       			<a href="#"><img src="images/business.svg"></a>
       				</div>
       				<a href="#"> Business </a>
       			</div>
       		</div>

       		<h5><span class="browsemore">Browse<a href="../workspace/workspace.php">  More Jobs >> </a></span></h5>

       </div>
 	  <!-- Categories End -->


 	  <!-- information about us -->
 	  <div class="information">
 	  	<h3>How It Works</h3>

 	  	<div class="info">
 	  	 	<div class="info_msg">
	 	  	 <span class="topic">Post a Job</span> <br>
	 	  	 <span>
	 	  	 	Tell us about your project. Jobllery connects you with top <br>
	 	  	 	talents and agencies around the world or near you. <br> <br>
	 	  	 </span>
 	  		</div>
 	  		
 	  		<div class="info_msg">
	 	  	 <span class="topic">Receive Bids</span> <br>
	 	  	 <span>
	 	  	 	Whatever your needs, there will be a freelancer to get it done. <br>
	 	  	 	Ged bids from our talented freelancers for your web design, mobile <br>  
	 	  	 	app development, graphic design and whole lot more.... <br> <br>
	 	  	 </span>
 	  		</div>

 	  		<div class="info_msg">
	 	  	 <span class="topic">Live Chat</span> <br>
	 	  	 <span>
	 	  	 	With Live chat, you can chat, share files, and track project milestones <br>
	 	  	 	or updates on the progress of your work from your desktop or mobile. <br> <br>
	 	  	 </span>
 	  		</div>

 	  		<div class="info_msg">
	 	  	 <span class="topic">Secure Payment</span> <br>
	 	  	 <span>
	 	  	 	Payment is released to the freelancer once you're pleased <br>
	 	  	 	and approve the work you get. <br> <br>
	 	  	 </span>
 	  		</div>
 	  	</div>


 	  	<div class="info">
 	  		<img src="images/abt.jpg" alt="pic">
 	  	</div>

 	  </div>

 	  <!-- information about us ends -->


 	  <!-- get inspired -->
 	  <div class="get_inspired">
 	  	<h3> Get Inspired, Get Connected </h3>
 	  	
 	  	<!-- carousel -->
 	  	<div class="carouselbox">
 	  	<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true; autoplay: true;">

    <ul class="uk-slider-items uk-grid carousel">
        <li class="uk-grid-small">
            <div class="uk-panel">
                <img src="images/carousel.jpg" alt="">
            </div>
        </li>
        <li class="uk-grid-small">
            <div class="uk-panel">
                <iframe width="640" height="360" src="https://www.youtube-nocookie.com/embed/gwIXjlcGL84" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </li>
        <li class="uk-grid-small">
            <div class="uk-panel">
                <img src="images/carousel1.jpg" alt="">
            </div>
        </li>
        <li class="uk-grid-small">
            <div class="uk-panel">
                <img src="images/carousel2.jpg" alt="">
            </div>
        </li>
        <li class="uk-grid-small">
            <div class="uk-panel">
                <iframe width="640" height="360" src="https://www.youtube-nocookie.com/embed/cQqD0XzRNko" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover left" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover right" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
</div>

 	  </div>
        <!-- get inspired ends -->



 	  <!-- browse all categories -->
 	  <div class="all_categories">
 	  	<h3>Browse All Categories</h3>

 	  	<div class="all">
 	  	<div class="all_cat">
 	  		<a href=""><span class="triangle">&#8227;</span>PHP</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Graphic Designing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>3D Rendering</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Photoshop</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>ILlustrator</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>SEO</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Digital Marketing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Excel</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Javascript</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Java</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Data Entry</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Translation</a> <br>
 	  	</div>

 	  	<div class="all_cat">
 	  		<a href=""><span class="triangle">&#8227;</span>Research Writing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Research</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Copy Writing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>iPhone</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Android</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>CSS3</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>HTML5</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Proofreading</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>E-commerce</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Banner Design</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Software Testing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>C++ Programming</a> <br> 		
 	  	</div>

 	  	<div class="all_cat">
 	  		<a href=""><span class="triangle">&#8227;</span>Linux</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Video Services</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Content Writing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Data Analysis</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Technical Writing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Data Processing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Artificial Intelligence</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Cyber Security</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Link Building</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>C# Programming</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>3D Modelling</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>PowerPoint</a> <br>
 	  	</div>

 	  	<div class="all_cat">
 	  		<a href=""><span class="triangle">&#8227;</span>Wordpress</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Article Writing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>3D Animation</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Python</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Web Searching</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Web Scraping</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Access</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Logo Design</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Software Architecture</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Internet Marketing</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>MySQL</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Ghost Writing</a> <br>
 	  	</div>

 	  	<div class="all_cat">
 	  		<a href=""><span class="triangle">&#8227;</span>Mobile App Development</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Website Development</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Website Management</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Photography</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Business & Finance</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Accounting</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Lifestyle</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Music & Audio</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Sitemap</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Industries</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>Education</a> <br>
 	  		<a href=""><span class="triangle">&#8227;</span>See All</a> <br>
 	  	</div>

 	  </div>
 	  </div>

 	  <!-- browse all categories ends -->



 	  <!-- before footer -->
 	  	<div class="before_footer">
 	  		<div class="footer">
 	  		 <div class="footer_items">
	 	  	  <span class="topic">About</span> <br>
		 	  	 <span>
		 	  	 	Careers <br>
		 	  	 	Press and News <br>
		 	  	 	Partnership <br>
		 	  	 	Privacy Policy <br>
		 	  	 	Terms of Service <br>
		 	  	 	Intellectual Property Claims <br>
		 	  	 </span>
 	  		</div>
 	  		
 	  		<div class="footer_items">
	 	  	 <span class="topic">Support</span> <br>
		 	  	 <span>
		 	  	 	Help & Support <br>
		 	  	 	Safety <br>
		 	  	 </span>
 	  		</div>

	  		<div class="footer_items">
		 	  	 <span class="topic">Community</span> <br>
		 	  	 <span>
		 	  	 	Event <br>
		 	  	 	Blog <br>
		 	  	 	Forum <br>
		 	  	 </span>
 	  		</div>

 	  		</div>
 	  			<div class="hr"></div>

 	  	</div>
 	  		<!-- before footer ends -->

 	  		<!-- footer -->
 	  	<footer>
 	  			<div class="footer_content">

 	  				<div class="log_sm">
 	  					 <h2> <a href="">Jobllery </a></h2>
 	  				</div>

 	  				<div class="log_sm">
 	  					<span>
		 	  				<span class="c_right">&copy;</span>2019 - <script>document.write( new Date().getFullYear() );</script>
							 Jobllery<span class="reg">&reg;</span> Inc. | All rights reserved <br>
							 SSNIT House, 27 Ama Akroma Road <br>
							 Takoradi, Ghana
 	  					</span>	
 	  				</div>

 	  				<div class="log_sm">
 	  					<span class="sm_links">
 	  						<a href=""><i class="fab fa-facebook-f fa-1x"></i></a>
 	  						<a href=""><i class="fab fa-twitter fa-1x"></i></a>
 	  						<a href=""><i class="fab fa-instagram fa-1x"></i></a>
 	  						<a href=""><i class="fab fa-youtube fa-1x"></i></a>
 	  						<a href=""><i class="fab fa-linkedin-in fa-1x"></i></a>
 	  					</span>
 	  					
 	  				</div>
 	  				
 	  			</div>


 	  	</footer>
 	  <!-- footer ends -->





 	<!--   font awesome link -->
	<script src="https://kit.fontawesome.com/b9b0ceea14.js" crossorigin="anonymous"></script>

    <!-- link to jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- link to uikit js -->
	<script type="text/javascript" src="js/index.min.js"></script>

</body>
</html>