<?php  ob_start(); ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Jobllery</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/jlogo.png">
	<link rel="stylesheet" type="text/css" href="css/jobsearch.min.css">
	<link rel="stylesheet" type="text/css" href="css/jobsearch.css"> 
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
                                if($_SESSION['user_role']=='client'){
                                  echo '<li class="uk-active"><a href="../client/index.php">'.$_SESSION['username'].'</a></li>';   
                                }elseif($_SESSION['user_role']=='freelancer'){
                                  echo '<li class="uk-active"><a href="../freelancer/index.php">'.$_SESSION['username'].'</a></li>';  
                                }else{
                                    
                                }
                               
                            }
                        ?>
                         <?php
                           
                                if($_SESSION['username']){
                                
                                   
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
                                  echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../client/submit_job.php">Post a Job</a></button>';   
                                }elseif($_SESSION['user_role']=='freelancer'){
                                  
                                }
                               
                            }else{
                                 echo '<button class="uk-button uk-button-default navbutton"><a class="btns" href="../user_registration/register.php">Post a Job</a></button>';                                  

                            }
                        ?>
<!--			                <button class="uk-button uk-button-default navbutton"><a class="btns" href="../user_registration/register.php">Post a Job</a></button>-->
			        	</div>
			        </ul>
			    </div>

			</nav> 
		</div>

		<!-- Navbar ends here -->
		<?php
    
//       if(isset($_GET['page'])){
//                    $page = $_GET['page'];
//                }else{
//                    $page = "";
//                }
//                if($page==""||$page==1){
//                    $page_no=0;
//                }else{
//                    $page_no= ($page*5)-5;
//                }
    
    if(isset($_POST['search'])){
        $job_tags=$_POST['job'];
        //$location=$_POST['location'];
        $category=$_POST['category_name'];
//        
//        $query= "SELECT * FROM job_post WHERE category_id={$category} AND location LIKE '%$location%' AND tags LIKE '%$job_tags%";
//        $count_query= mysqli_query($connection,$query);
//        $count_post=mysqli_num_rows($count_query);
//        $count_post=ceil($count_post/5);
        if(!empty($job_tags)&&!empty($category)){
        $query="SELECT * FROM job_post WHERE category_id={$category} AND tags LIKE '%$job_tags%' ORDER BY createdAt DESC ";
        $select_all_jobs=mysqli_query($connection,$query);
        confirmQuery( $select_all_jobs);
        $count =mysqli_num_rows($select_all_jobs);
        if($count>0){
            
        
    
    while($row=mysqli_fetch_assoc($select_all_jobs)){
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
        
          
        ?>	

  
    
        
    
    
    
	<!-- posted jobs  -->
<div class="posts">
  <div class="row">
  <a href="../job_details/job_details.php?p_id=<?php echo $job_post_id; ?>&client_id=<?php echo $client_id; ?>">
	  <div class="column">
        <?php
          
          if($image==""){
              
              echo "<img class='icon' src='../client/assets/img/dogs/icon.png'>";
             
          }else{
              
              echo "<img class='icon' src='../client/assets/img/dogs/{$image}'>";
              //echo "<img class='icon' src='../client/assets/img/dogs/'.$image.'>";
              
          }
          
          ?>
    
    
<!--	    <img class="icon" src="../client/assets/img/dogs/<?php echo  $image; ?>">-->
	    <div class="job"><h3><?php echo $job_title; ?></h3> <h4>Location: <?php echo $location;?></h4> <h5>Job duration: <?php echo $job_duration;?></h5>
	    </div>
	    <div class="tags">
	     <h5>Requirement</h5> 
	     <div class="taglist"><?php echo $tags; ?></div>
	      </div> 
	    <div class="amount"><h3 class="price">$<?php echo $offered_salary; ?></h3></div>
	  </div>
     </a>
	</div>
 

 </div>

<?php  }
        
        }else{
            echo "<br><br><br><br><h4 class='uk-text-center'><strong>No Results</strong></h4><br><br><br><br><br><br><br>";
        }
    
    }else{
            header("location:../Homepage/index.php");
        }
        }
      
    
            ?>
<!-- pagination -->

<!--
 <ul class="uk-pagination uk-flex-center" uk-margin>
        <?php
            for($i=1; $i<=$count_post; $i++){
              
                  
                if($i==$page){
                //echo "<li><a href='workspace.php?page=$i'><span uk-pagination-previous></span></a></li>";
                echo "<li><a class='uk-active' href='workspace.php?page=$i'>$i</a></li>";
                
               }else{
                echo "<li><a href='workspace.php?page=$i'>$i</a></li>"; 
                //echo "<li><a href='workspace.php?page=$i'><span uk-pagination-next></span></a></li>";
               }
            }
            ?>
            
</ul>
-->
<!--

<!-- pagination -->

	<!-- posted jobs end -->

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

    <!-- link to uikit js -->
	<script type="text/javascript" src="js/jobsearch.min.js"></script>

</body>
</html>