<?php  ob_start(); ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title> Jobllery </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/jlogo.png">
	<link rel="stylesheet" type="text/css" href="css/profile.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css"> 
</head>
<body>
<?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
	<!-- Navbar starts from here -->
	<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
		<nav class="uk-navbar-container navibar" uk-navbar>
			<div class="uk-navbar-left">
				<ul class="uk-navbar-nav">
				<li class="uk-active sitename" ><a href="../Homepage/index.php"><img class="sitelogo" src="images/jlogo.png"></a></li>
				</ul>
			</div>
            <?php
                if(isset($_GET['p_id'])){
         
                    $user_id = $_GET['p_id'];
                    
                    $query="SELECT * FROM client WHERE user_id={$user_id}";
                    $check_profile=mysqli_query($connection,$query);
                    confirmQuery($check_profile);
                    $count=mysqli_num_rows($check_profile);
                    
                    if($count==1){
                     
                    $query="SELECT * FROM client WHERE user_id={$user_id}";
                    $select_profile=mysqli_query($connection,$query);
                    confirmQuery($select_profile);
                    
                       while($row=mysqli_fetch_assoc($select_profile)){
                        $profile_id=$row['id'];
                        $user_id = $row['user_id'];
                        $first_name = $row['firstname'];   
                        $last_name = $row['lastname'];
                        $address =  $row['address'];
                        $image= $row['image'];
                        $contact_number= $row['contact_number'];
                        $gender = $row['gender'];
                        $description = $row['description'];
                        $url = $row['url'];
                      
   
                    }  
                    }else{
                        
                        $profile_id=" ";
                        $user_id =" ";
                        $first_name = " ";
                        $last_name = " ";
                        $address =  " ";
                        $image="icon.png";
                        $contact_number= " ";
                        $experience = " ";
                        $gender = " ";
                        $description = " ";
                        $url = " ";
                    }
                
                    
       
                }else{
                        $profile_id=" ";
                        $user_id =" ";
                        $first_name = " ";
                        $last_name = " ";
                        $address =  " ";
                        $image="icon.png";
                        $contact_number= " ";
                        $experience = " ";
                        $gender = " ";
                        $description = " ";
                        $url = " ";
                }
            
            
            
            ?>


			<div class="uk-navbar-right">
				<ul class="uk-navbar-nav">
					<div class="dropdown">
						<img src="../client/assets/img/dogs/<?php echo $image;?>">
						<button onclick="myFunction()" class="dropbtn"><?php echo $first_name. " ". $last_name;?> &#9660</button>
						<div id="myDropdown" class="dropdown-content">
							<a href="../client/index.php"><i class="fas fa-user-alt"></i>Dashboard</a>
							<a href="../client/edit_profile.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-cogs"></i>Edit Profile</a>
<!--							<a href="#"><i class="fas fa-list"></i>Activity Log</a>-->
							<a href="../user_registration/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
						</div>
					</div>
				</ul>
			</div>



		</nav> 

	
		
	</div>
		<!-- Navbar ends here -->


		<!-- profile backdrop -->
		<div class="backdrop">
			<img src="images/ad.jpg">
			<div class="rating">
				<i class="fas fa-star checked"></i>
				<i class="fas fa-star checked"></i>
				<i class="fas fa-star checked"></i>
				<i class="fas fa-star checked"></i>
				<i class="fas fa-star"></i>
				<h6>Rating 4.0</h6>
			</div>
			<div class="picAbout">
				<img src="../client/assets/img/dogs/<?php echo $image;?>">
				<button class="uk-button uk-button-default navbutton"><a class="btns" href=""><?php echo $first_name;?></a></button>	
				<div class="aboutMe">
					<h4>ABOUT</h4>
				  <span class="content"><?php echo $description;?> </span>
				</div>
                <?php
                        $query="SELECT * FROM job_post WHERE client_id={$_SESSION['user_id']} ORDER BY createdAt DESC"; 
                        $select_job_by_client = mysqli_query($connection,$query);
                        confirmQuery($select_job_by_client);          
                        $count = mysqli_num_rows($select_job_by_client);
                
                ?>
				<div class="followers">
				<h5>Followers</h5> <h6><a href="<?php echo $url ;?>"><?php echo $url ;?></a></h6> <br>
				<h5>Jobs Posted</h5> <h6><?php echo $count; ?></h6>
				</div>

				
			</div>
		</div>
		<!-- profile backdrop ends -->


	<!-- works slideshow -->
<!--
<div class="workSlideshow">
	<h4>Works</h4>
	<div class="uk-cover-container slideContainer">
	    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; pause-on-hover: true" >

	        <ul class="uk-slideshow-items">
	            <li>
	                <img src="images/work.jpg" alt="" uk-cover>
	            </li>
	            <li>
	                <img src="images/work1.jpg" alt="" uk-cover>
	            </li>
	            <li>
	                <img src="images/work2.jpg" alt="" uk-cover>
	            </li>
	        </ul>

	        <a class="uk-position-center-left uk-position-small uk-hidden-hover navButn" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	        <a class="uk-position-center-right uk-position-small uk-hidden-hover navButn" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

	    </div>
	</div>	
</div>
-->
				
		<!-- works slideshow ends-->


		<!-- jobs completed section -->
		
		
		
<div class="posts">
	<h4 class="completed">Jobs Posted</h4>
	<div class="row">
	
                        <?php     
                        

                        while($row=mysqli_fetch_assoc($select_job_by_client)){
                        $job_post_id = $row['job_post_id'];
                        $client_id = $row['client_id'];
                        $category_id = $row['category_id'];
                        $job_title = $row['job_title'];
                        $contract_type = $row['contract_type'];
                        $job_description = $row['job_description'];
                        $application_deadline_date = $row['application_deadline_date'];
                        $required_skills =$row['required_skills'];
                        $min_salary = $row['min_salary'];
                        $max_salary = $row['max_salary'];
                        $salary_type = $row['salary_type'];
                        $tags = $row['tags'];
                        $offered_salary = $row['offered_salary'];
                        $job_duration = $row['job_duration'];
                        $experience = $row['experience'];
                        $image = $row['image'];
                        $location = $row['location'];
                        $createdAt = $row['createdAt'];
                        $status = $row['status'];
                        ?>

		<div class="column">
			<img class="icon" src="images/icon.png">
			<div class="job"><h3><?php echo $job_title;?></h3> <h4><?php echo  $location; ?></h4> <h5><?php echo $job_duration; ?></h5></div>
			<div class="tags"> <h5>Requirement</h5> 
			<div class="taglist"><?php echo $tags; ?></div> 
			
			 </div>
			
			<div class="amount"><h3 class="price"> $<?php echo $offered_salary; ?></h3></div>
		</div>
		<?php }?>
	</div>
</div>

		<!-- jobs completed section ends-->


<!--   font awesome link -->
	<script src="https://kit.fontawesome.com/b9b0ceea14.js" crossorigin="anonymous"></script>

    <!-- link to jQuery -->
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


   <script type="text/javascript" src="js/pro.js"></script>

    <!-- link to uikit js -->
	<script type="text/javascript" src="js/profile.min.js"></script>

</body>
</html>