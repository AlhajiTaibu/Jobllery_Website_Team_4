<?php include "includes/dashboard_header.php";?>
   <?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0" id="sidebar-color">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-text mx-3"><img class="img-fluid dashboard-logo" src="assets/img/dogs/New%20Logo.png"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link" href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user-alt"></i><span><strong>Profile</strong></span></a><a class="nav-link"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notifications</strong><br></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong><br></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong><br></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
        <div class="container-fluid navigation">
                <div>
                    <h3 class="text-dark mb-0"><strong>Application Statistics</strong></h3>
                </div>
              
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <a href="jobs_applied.php">
                           <div class="card shadow border-bottom-success py-2">
                            <div class="card-body" id="index-card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                </div>
                                <?php
                                $query="SELECT * FROM jobs_applied WHERE freelancer_id={$_SESSION['user_id']}";
                                $select_applied_jobs=mysqli_query($connection,$query);
                                confirmQuery($select_applied_jobs);
                                $count_job_applied = mysqli_num_rows($select_applied_jobs);
                                ?>
                                <h3><strong><?php echo $count_job_applied;?></strong></h3>
                                <h6>Applied Jobs<br></h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                      <a href="shortlisted_jobs.php">  
                           <div class="card shadow border-bottom-success py-2">
                            <div class="card-body" id="index-card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                </div>
                                <?php
                                $query="SELECT * FROM jobs_applied WHERE freelancer_id={$_SESSION['user_id']} AND status='awarded'";
                                $select_awarded_jobs=mysqli_query($connection,$query);
                                confirmQuery($select_awarded_jobs);
                                $count_job_awarded = mysqli_num_rows($select_awarded_jobs);
                                ?>
                                <h3><strong><?php echo $count_job_awarded;?></strong></h3>
                                <h6>Awarded Jobs<br></h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-bottom-success py-2">
                            <div class="card-body" id="index-card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                </div>
                                <h3><strong>0</strong></h3>
                                <h6>Review<br></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-bottom-success py-2">
                            <div class="card-body" id="index-card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                </div>
                                <h3><strong>25</strong></h3>
                                <h6>Views<br></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    </div>
                </div>
                <div class="border rounded-0 container-fluid job-applied">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-left mb-0 header"><strong>Jobs Applied Recently</strong></h3>
                    </div>
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                               
                               <?php
                                $query="SELECT * FROM jobs_applied WHERE freelancer_id={$_SESSION['user_id']} ORDER BY apply_date DESC";
                                $select_applied_jobs=mysqli_query($connection,$query);
                                confirmQuery($select_applied_jobs);
                                
                                while($row=mysqli_fetch_assoc($select_applied_jobs)){
                                    $job_post_id = $row['job_post_id'];
                                    $apply_date = $row['apply_date'];
                                    
                                    
                                $query="SELECT * FROM job_post WHERE job_post_id = {$job_post_id}";
                                $select_jobs=mysqli_query($connection,$query);
                                confirmQuery( $select_jobs);

                                while($row=mysqli_fetch_assoc($select_jobs)){
                                $job_post_id = $row['job_post_id'];
                                $client_id = $row['client_id'];
                                $category_id = $row['category_id'];
                                $job_title = $row['job_title'];
                                $image = $row['image'];
                                $location = $row['location'];
                                $createdAt = $row['createdAt'];
                                $status = $row['status'];
                                }
                                ?>
                                
                                <tr class="logo-background">
                                    <td  class="table-data"><a href="jobs_applied.php?p_id=<?php echo $job_post_id; ?>"><img src="../client/assets/img/dogs/<?php echo  $image; ?>" alt="" class="freelancer-logo"></a></td>
                                    <td>
                                    <td>
                                        <div class="job-logo-text">
                                            <h4><strong>Job Title: <?php echo $job_title; ?></strong></h4>
                                            <h5><strong>Location: <?php echo $location; ?></strong></h5>
                                        </div>
                                    </td>
                                </tr>
                                
                                 <?php  
                                   }
                                
                                ?>
<!--
<!--
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="job-logo-text">
                                            <h4><strong>Web Development</strong></h4>
                                            <h5><strong>AmaliTech Takoradi</strong></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="job-logo-text">
                                            <h4><strong>Web Development</strong></h4>
                                            <h5><strong>AmaliTech Takoradi</strong></h5>
                                        </div>
                                    </td>
                                </tr>
-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include "includes/dashboard_footer.php";?>