<?php  ob_start(); ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Jobllery</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/jlogo.png">
	<link rel="stylesheet" type="text/css" href="css/jobdetails.min.css">
	<link rel="stylesheet" type="text/css" href="css/jobdetails.css"> 
</head>

<body>
<?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
		<!-- Navbar starts from here -->
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
			<nav class="uk-navbar-container navibar" uk-navbar>

			    <div class="uk-navbar-left">
			        <ul class="uk-navbar-nav">
			            <li class="uk-active sitename" ><a href="../homepage/index.php"><img class="sitelogo" src="images/jlogo.png"></a></li>
			        </ul>
			    </div>

			    <!-- search bar -->
			<div class="uk-margin">
<!--
			    <form class="uk-search uk-search-default searchbar">
			        <a href="" class="uk-search-icon-flip" uk-search-icon></a>
			        <input class="uk-search-input searchbox" type="search" placeholder="Search Job...">
			    </form>
-->
			</div>
			   <!--  search bar ends -->


			    <div class="uk-navbar-right linksandbuttons">
			        <ul class="uk-navbar-nav">
                   
                     <?php
                           
                                if(isset($_SESSION['username'])){
                                
                                   
                                }else{
                                   echo '<li class="uk-active"><a href="../user_registration/login.php">LOG IN</a></li>';  
                                   echo '<li class="uk-active"><a href="../user_registration/register.php">SIGN UP</a></li>'; 
                                }
                               
                           
                        ?>
<!--
			            <li class="uk-active"><a href="../user_registration/login.php">LOG IN</a></li>
			            <li class="uk-active"><a href="../user_registration/register.php">SIGN UP</a></li>
-->
			            <div class="uk-navbar-item">
                        <?php
                            if(isset($_SESSION['username'])){
                                if($_SESSION['user_role']=='client'){
                                  echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../client/my_jobs.php">Post a Job</a></button>';   
                                }elseif($_SESSION['user_role']=='freelancer'){
                                  
                                }
                               
                            }else{
                                 echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../user_registration/register.php">Post a Job</a></button>';                                  

                            }
                        ?>
<!--
			                <button class="uk-button uk-button-default navbutton"><a class="btns" href="../user_registration/login.php">Post a Job</a></button>
			                
-->
			        	</div>
			        	<div class="uk-navbar-item">
			        	 <?php
                            if(isset($_SESSION['username'])){
                                if($_SESSION['user_role']=='client'){
                                    
                                }elseif($_SESSION['user_role']=='freelancer'){
                                    
                                  echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../workspace/workspace.php">Browse Jobs</a></button>';
                                    
                                }else{
                                    echo '<button class="uk-button uk-button-default navbutton1"><a class="btns" href="../workspace/workspace.php">Browse Jobs</a></button>'; 
                                }
                               
                            }else{
                                 echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../workspace/workspace.php">Browse Job</a></button>';                                  

                            }
                        ?>
<!--			        	<button class="uk-button uk-button-default navbutton"><a class="btns" href="../workspace/workspace.php">Browse Job</a></button>-->
			        	</div>
			        </ul>
			    </div>

			</nav> <!-- Navbar ends here -->
		</div>
			

<!-- 	job details -->

    <?php
    
    if(isset($_GET['p_id'])){
       $job_post_id =$_GET['p_id'];                   
 
    
    $query="SELECT * FROM job_post WHERE job_post_id = {$job_post_id}";
    $select_jobs=mysqli_query($connection,$query);
    confirmQuery( $select_jobs);
    
    while($row=mysqli_fetch_assoc($select_jobs)){
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
        
        
    }}
    ?>
	
	<!-- job title -->
	<div class="jobTitle">
		<h2> <?php echo $job_title; ?> </h2>
	</div>


<!-- 	about job -->
	<div class="aboutJob">
		<div class="jobHeading">
			<div class="jobName">
				<h3> <?php echo $job_title; ?></h3>
				<h5><span id="currentdate">Posted on: <?php echo $createdAt; ?> </span> <span id="location"> <?php echo $location; ?></span> </h5>
			</div>
			<div class="jobShare">
<!--
				<a href="#"><i class="fas fa-share-alt soShare"></i></a><span class="Share">  </span> 
				<a href="#"><i class="fas fa-star soShare"></i></a><span class="saveAd"> </span> 
-->
				<br><br>
				<br><br>
				
				<?php
                
                if(isset($_SESSION['user_role'])){
                 if($_SESSION['user_role']=='freelancer'){
                   if(($status==='awarded')&&($_SESSION['user_role']=='freelancer')){
                       
                        echo "<h6 class='overviewDetails'><strong>Job Application Closed</strong></h6>";
//                    echo "<button class='uk-button uk-button-default applyButton'><a class='btns' href='../freelancer/jobs_applied.php?job_post_id=$job_post_id&client_id=$client_id'>Apply for this job</a></button> ";
                       
                    }else{
                    echo "<button class='uk-button uk-button-default applyButton'><a class='btns' href='../freelancer/jobs_applied.php?job_post_id=$job_post_id&client_id=$client_id'>Apply for this job</a></button> "; 
                    }  
                 }else{
                     echo "<a href='../user_registration/login.php' class='overviewDetails uk-text-center'>To apply? Click here to  Login as freelancer</a><br>";
                 }
                    
                    
                ?>
<!--                <button class="uk-button uk-button-default applyButton"><a class="btns" href="../freelancer/jobs_applied.php?job_post_id=<?php echo $job_post_id;?>&client_id=<?php echo $client_id;?>">Apply for this job</a></button>  -->
              <?php  }else{
                    ?>
                <a href="../user_registration/login.php" class="overviewDetails">To apply? Click here to  Login as freelancer</a> 
              <?php  }
                
                
                ?>
<!--				<button class="uk-button uk-button-default applyButton"><a class="btns" href="">Apply for this job</a></button>-->
				
				<?php
                if(isset($_SESSION['user_id'])){
                    
                    if($_SESSION['user_id']==$client_id){
                    
                    
                   echo "<button class='uk-button uk-button-default applyButton applyButton1'><a class='btns' href='../client/edit_job.php?p_id=$job_post_id&client_id=$client_id'>Edit job</a></button>";
             
                   }else{
                    
                }
                }else{
                    
                }
                
                
                ?>
<!--				<button class="uk-button uk-button-default applyButton applyButton1"><a class="btns" href="">Edit job</a></button>-->
			</div>		
		</div>

		<div class="jobDetails">
			<div class="detailContent">
				<span>Company / Employer: </span> <?php
                    
                $query="SELECT * FROM client WHERE user_id = {$client_id}";
                $select_client_details=mysqli_query($connection,$query);
                confirmQuery($select_client_details);
                while($row=mysqli_fetch_assoc($select_client_details)){
                    $firstname =$row['firstname'];
                    $lastname =$row['lastname'];
                }
                    echo  $firstname. " ".$lastname;
                
                ?> <br>
				<span>Category: </span> <?php
                    $query="SELECT category_name FROM category WHERE id={$category_id}";
                    $select_category=mysqli_query($connection,$query);
                    confirmQuery($select_category);
                    $row=mysqli_fetch_assoc($select_category);
                    $category_name=$row['category_name'];
                    echo $category_name;
                
                ?> <br>
				<span>Salary: $</span><?php echo $offered_salary; ?> <br>
				<span>Status: </span><?php echo $status; ?> <br>
<!--				<span>Designaton:</span> Graphic Designer, Creative Suite Associate 1<br>-->
			</div>
			<div class="detailContent">
				<span>Job Type: </span><?php echo $contract_type; ?><br>
				<span>Duration: </span> <?php echo $job_duration; ?><br>
				<span>Experience: </span> <?php echo $experience; ?> <br>
			</div>
		</div>
	</div>


<div class="overviewSection">
	<div class="overview">
		<h3>Overview</h3>
		<h5 class="overviewDetails">
			<?php echo $job_description; ?>
		</h5>				
	</div>

	<div class="overviewOne">
		<img class="icon" src="../client/assets/img/dogs/<?php echo  $image; ?>">
		<div class="connect">
			<h4><?php echo  $firstname. " ".$lastname;?></h4>
			<h5>  <?php echo $location; ?></h5>
		</div>		
	</div>			
</div>


<!--
	<div class="responsibilities">
		<h3>Responsibilities</h3>
		<h5 class="overviewDetails">
			There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are There they are
		</h5>				
	</div>
-->

	<div class="requirement">
		<h3>Requirements</h3>
		<h5 class="overviewDetails">
			<?php echo $required_skills; ?>
		</h5>				
	</div>

<?php
                
//                if($_SESSION['user_role']=='freelancer'){
                    
                     if(isset($_SESSION['user_role'])){
                 if($_SESSION['user_role']=='freelancer'){
                     
                    if(($status==='awarded')&&($_SESSION['user_role']=='freelancer')){
                       
                        echo "<h5 class='overviewDetails uk-text-center'><strong>Job Application Closed</strong></h5>";
//                    echo "<button class='uk-button uk-button-default applyButton'><a class='btns' href='../freelancer/jobs_applied.php?job_post_id=$job_post_id&client_id=$client_id'>Apply for this job</a></button> ";
                       
                    }else{
                    echo "<button class='uk-button uk-button-default applyButton'><a class='btns' href='../freelancer/jobs_applied.php?job_post_id=$job_post_id&client_id=$client_id'>Apply for this job</a></button> "; 
                    } 
                 }else{
                   echo "<a href='../user_registration/login.php' class='overviewDetails uk-text-center'>To apply? Click here to  Login as freelancer</a>";
                 }
                    
               ?>
<!--
	<button class="uk-button uk-button-default applyButton bottomApply"><a class="btns" href="../freelancer/jobs_applied.php?job_post_id=<?php echo $job_post_id;?>&client_id=<?php echo $client_id;?>">Apply for this job</a></button>

	<a class="reportAd" href="#"><i class="fas fa-exclamation-triangle soShare"></i> Report this ad </a>
-->
<?php }else{    ?>
                 <a href="../user_registration/login.php" class="overviewDetails">To apply? Click here to  Login as freelancer</a>   
            <?php    }
    
    
    ?>







<!-- job deatails end -->


 	  <!-- before footer -->
 	  	<div class="before_footer">
 	  		<div class="footer">
 	  		 <div class="footer_items">
	 	  	  <span class="topic">About</span> <br>
		 	  	 <span class="topic_content">
		 	  	 	Careers <br>
		 	  	 	Press and News <br>
		 	  	 	Partnership <br>
		 	  	 	Privacy Policy <br>
		 	  	 	Terms of Service <br>
		 	  	 	Intellectual Property Claims <br>
		 	  	 </span>
 	  		</div>
 	  		
 	  		<div class="footer_items support">
	 	  	 <span class="topic">Support</span> <br>
		 	  	 <span class="topic_content">
		 	  	 	Help & Support <br>
		 	  	 	Safety <br>
		 	  	 </span>
 	  		</div>

	  		<div class="footer_items events">
		 	  	 <span class="topic">Community</span> <br>
		 	  	 <span class="topic_content">
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
 	  					 <a href=""> <img src="images/jlogo.png"> </a>
 	  				</div>

 	  				<div class="log_sm for_mobile">
 	  					<span class="address">
		 	  				<span class="c_right">&copy;</span>2019 - <script>document.write( new Date().getFullYear() );</script>
							 Jobllery<span class="reg">&reg;</span> Inc. | All rights reserved <br>
							 SSNIT House, 27 Ama Akroma Road <br>
							 Takoradi, Ghana
 	  					</span>	
 	  				</div>

 	  				<div class="log_sm for_mobile">
 	  					<span class="sm_links">
 	  						<a href=""><i class="sm fb fab fa-facebook-f fa-1x"></i></a>
 	  						<a href=""><i class="sm fab fa-twitter fa-1x"></i></a>
 	  						<a href=""><i class="sm fab fa-instagram fa-1x"></i></a>
 	  						<a href=""><i class="sm fab fa-youtube fa-1x"></i></a>
 	  						<a href=""><i class="sm fab fa-linkedin-in fa-1x"></i></a>
 	  					</span>
 	  					
 	  				</div>
 	  				
 	  			</div>


 	  	</footer>
 	  <!-- footer ends -->





 	<!--   font awesome link -->
	<script src="https://kit.fontawesome.com/b9b0ceea14.js" crossorigin="anonymous"></script>

    <!-- link to jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script>
	var d = new Date();
	document.getElementById("dateLine").innerHTML = d;
	</script> -->

    <!-- link to uikit js -->
	<script type="text/javascript" src="js/jobsearch.min.js"></script>

</body>
</html>