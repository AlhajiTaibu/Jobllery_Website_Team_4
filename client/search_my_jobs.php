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
                           <a class="nav-link active" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
                           <a class="nav-link" href="ongoing_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>Ongoing Jobs</strong><br></span></a>
                           <a class="nav-link" href="completed_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>Completed Jobs</strong><br></span></a>
<!--                    <a class="nav-link" href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a>-->
                            <a class="nav-link" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
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
                    <h4 class="header"><strong>Manage Jobs</strong></h4>
                    <br>
<!--
                    <form action="" method="post">
                        <div class="form-row" id="row-style">
                            <div class="col-12 offset-0 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group">
                                <input class="form-control input-btn" type="text" placeholder="Search" name="search"><span class="input-group-append">
                                <button class="btn btn-outline-success btn-sm" id="search-btn" type="button" name="sort">
                                <i class="fa fa-search search-icon"></i>
                                </button></span>
                                </div>
                            </div>
                            <div class="col-7 col-md-2 offset-1 offset-md-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">

                            </div>
                            <div class="col-md-4 col-md-4 col-sm-8" id="forms">

                            </div>
                        </div>
                    </form>
-->
                    <div class="container-fluid">
                        <div class="table-responsive table-borderless" id="table-background">
                            <table class="table">
                                <thead class="table table-bordered">
                                    <tr>
                                        <th class="job_table">Job Logo</th>
                                        <th class="job_table">Job Details</th>
                                        <th class="text-left">No. of Applicants</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                            if(isset($_POST['search'])){

                            $search_tag =trim($_POST['search_name']);

                            if(!empty($search_tag)){
                            
                            echo "<h6><strong>Search results for ".$search_tag." are:</strong></h6><a href='my_jobs.php'>  All Jobs</a>";
                                
                            $query="SELECT * FROM job_post WHERE client_id={$_SESSION['user_id']} AND tags LIKE '%$search_tag%' ORDER BY createdAt DESC";
                                
                            $select_job_by_client = mysqli_query($connection,$query);
                            confirmQuery($select_job_by_client);
                            
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
                             
                                    <tr class="table-row">
                                        <td  class="table-data"><img src="../client/assets/img/dogs/<?php echo  $image; ?>" alt="" class="job-post-logo"></td>
                                        <td>
                                            <div></div>
                                             <div class="row">
                                                <div class="col">
                                                    <h6><strong>Job: </strong><?php echo  $job_title; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Category: </strong>
                                                    <?php  
                                                    $query="SELECT * FROM category WHERE id={$category_id}";
                                                    $select_category=mysqli_query($connection,$query);
                                                    confirmQuery($select_category);
                                                    while($row=mysqli_fetch_assoc( $select_category)){
                                                      $category_name = $row['category_name'];  
                                                    }
                                                    
                                                    echo $category_name ;
                                    
                                                        ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Location: </strong><?php echo  $location; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong><?php echo  $createdAt; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: </strong><?php echo  $min_salary; ?> - <?php echo   $max_salary; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-data">2 Applicants</td>
                                        <td class="table-data"><?php echo $status; ?></td>
                                        <td class="table-data">
                                        <a href="../workspace/workspace.php"><i class="icon ion-eye view"></i></a>
                                        <a href="edit_job.php?p_id=<?php echo $job_post_id;?>"><i class="material-icons chats">chat</i></a>
                                        <a href="my_jobs.php?p_id=<?php echo $job_post_id;?>"><i class="icon ion-android-delete trash"></i></a></td>
                                    </tr>
                                     <?php  }
                                        }else{
                                            header("Location:my_jobs.php");
                                        }
                                    }else{
                                        
                                    }
                                    
                                    ?>

                                </tbody>
                            </table>
                            
                            <?php
                                if(isset($_GET['p_id'])){
                                    $job_post_id = $_GET['p_id'];
                                    
                                    $query="DELETE FROM job_post WHERE job_post_id='$job_post_id'";
                                    $delete_job_post = mysqli_query($connection,$query);
                                    confirmQuery($delete_job_post);
                                    header("Location:search_my_jobs.php");
                                }
                            
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php include "includes/footer.php";?> 