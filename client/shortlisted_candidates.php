<?php include "includes/header.php";?>
<?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="../profile_page/client_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a>
                            <a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
<!--<a class="nav-link" href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a>-->
                            <a class="nav-link active" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
<!--
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a>
-->
                            <a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a>
                           
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
<!--                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>-->
            </div>
        </nav>
<?php include "includes/navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h3 class="header"><strong>Shortlisted Candidates</strong></h3>
                    <form>
                        <div class="form-row" id="row-style">
<!--
                            <div class="col-sm-12 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search d-inline-block search-icon"></i></button></span></div>
                            </div>
-->
                            <div class="col-1 col-sm-2 col-md-1 offset-3 offset-sm-0 offset-md-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
<!--                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>-->
                            </div>
                            <div class="col col-md-4 col-sm-8" id="forms">
<!--                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>-->
                            </div>
                        </div>
                        
                    
                    </form>
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                           <?php
                    
                            $query="SELECT * FROM jobs_applied WHERE client_id= {$_SESSION['user_id']} ORDER BY apply_date DESC";
                            $select_jobs=mysqli_query($connection,$query);
                            confirmQuery($select_jobs);
                            while($row=mysqli_fetch_assoc($select_jobs)){
                            $job_id=$row['id'];
                            $job_post_id=$row['job_post_id'];
                            $freelancer_id=$row['freelancer_id'];
                            $apply_date =$row['apply_date'];
                                
                            $query="SELECT * FROM job_post WHERE job_post_id={$job_post_id}"; 
                            $select_job = mysqli_query($connection,$query);
                            confirmQuery($select_job);
                            
                                while($row=mysqli_fetch_assoc($select_job)){
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
                                }
                            
                                $query="SELECT * FROM profile WHERE user_id={$freelancer_id}";
                                $select_freelancer=mysqli_query($connection,$query);
                                confirmQuery($select_freelancer);
                                while($row=mysqli_fetch_assoc($select_freelancer)){
                                    $first_name =$row['first_name'];
                                    $last_name =$row['last_name'];
                                    $address =$row['address'];
                                    $image = $row['image'];
                                    
                                }
                                
                            
                                ?>
                               
                                <tr class="logo-background">
                                    <td><a href="shortlisted_candidates.php?job_post_id=<?php echo $job_post_id; ?>"><img  class="freelancer-logo" src="../freelancer/assets/img/dogs/<?php echo $image;?>"></a></td>
                                    <td>
                                        <div id="shortlisted-candidates" class="text-justify job-logo-text">
                                            <h4><strong>Job Title: <?php echo $job_title; ?></strong></h4>
                                            <h5><strong>Candidate Name: <?php echo $first_name." ".$last_name; ?></strong></h5>
                                            <h5>Location: <?php echo $address; ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="close-logo">
                                        <a href="shortlisted_candidates.php?job_post_id=<?php echo $job_post_id; ?>&f_id=<?php echo $freelancer_id; ?>"><i class="fas fa-check"></i></a>
                                        <a href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $freelancer_id; ?>"><i class="icon ion-eye view"></i></a>
                                        <a href="messages.php?p_id=<?php echo $freelancer_id; ?>"><i class="material-icons chats">chat</i></a>
                                        
                                        <a href="shortlisted_candidates.php?job_id=<?php echo $job_post_id; ?>&f_id=<?php echo $freelancer_id; ?>"><i class="icon ion-android-delete trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                
                          <?php } ?>
                            

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            
            if(isset($_GET['job_post_id'])){
                
                $job_post_id=$_GET['job_post_id'];
                $freelancer_id=$_GET['f_id'];
                 
                echo $job_post_id;
                
                $query="SELECT * FROM job_post WHERE job_post_id={$job_post_id}";
                $check_job_status=mysqli_query($connection,$query);
                confirmQuery($check_job_status);
                
                while($row=mysqli_fetch_assoc($check_job_status)){
                    $status = $row['status'];
                    
                }
                if($status==='open'){
                    
                $query="UPDATE job_post SET status='awarded' WHERE job_post_id={$job_post_id}";
                $award_job=mysqli_query($connection,$query);
                confirmQuery($award_job);
                
                $query="UPDATE jobs_applied SET status='awarded' WHERE job_post_id={$job_post_id} AND freelancer_id={$freelancer_id}";  
                $assign_freelancer=mysqli_query($connection,$query);
                confirmQuery($assign_freelancer);    
                    
                  echo "<script>alert('Job Awarded Successfully')</script>";  
                }elseif($status==='awarded'){
                    echo "<script>alert('Job Awarded Already')</script>";  
                }else{
                    
                }
                
                    
                
                }
                
               
            

        ?>
        
                <?php
                if(isset($_GET['f_id'])){
                    if(isset($_GET['job_id'])){
                 $freelancer_id = $_GET['f_id'];
                $job_post_id = $_GET['job_id'];

                $query="DELETE FROM jobs_applied WHERE job_post_id={$job_post_id} AND freelancer_id={$freelancer_id} AND status!='awarded'";
                $delete_job_post = mysqli_query($connection,$query);
                confirmQuery($delete_job_post);
                
                header("Location:shortlisted_candidates.php");   
                    
                }else{
                        
                    }
               
                }else{
                    
                }

                ?>
        
    <?php include "includes/footer.php";?> 