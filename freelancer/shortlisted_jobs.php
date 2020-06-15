<?php include "includes/dashboard_header.php";?>
   <?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link active" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                             <a class="nav-link" href="job_progress.php"><i class="fas fa-clipboard-list"></i><span><strong>Job Progress</strong></span></a>
                        <a
                            class="nav-link" href="browse_jobs.php"><i class="fas fa-info"></i><span><strong>Browse Jobs</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Clients</strong></span></a>
<!--
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
-->
                    </li>
                   
                </ul>
<!--                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>-->
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h4 class="header"><strong>Awarded Jobs</strong></h4>
<!--
                    <form>
                        <div class="form-row" id="row-style">
                            <div class="col-12 offset-0 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search search-icon"></i></button></span></div>
                            </div>
                            <div class="col-7 col-md-2 offset-1 offset-md-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>
                            </div>
                            <div class="col-md-4 col-md-4 col-sm-8" id="forms">
                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>
                            </div>
                        </div>
                    </form>
-->
                    <div class="container-fluid">
                        <div class="table-responsive table-borderless" id="table-background">
                            <table class="table">
<!--
                                <thead class="table table-bordered">
                               
                               
                                    <tr>
                                        <th>Job Logo</th>
                                        <th>Job Details</th>
                                        <th>Status</th>
                                        <th>Times</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
-->
                                <tbody>
                                 <?php
                                    $query= "SELECT * FROM jobs_applied WHERE freelancer_id={$_SESSION['user_id']} AND status='awarded' ORDER BY apply_date DESC";
                                    $select_freelancer_job=mysqli_query($connection,$query);
                                    confirmQuery($select_freelancer_job);
                                    
                                    while($row=mysqli_fetch_assoc($select_freelancer_job)){
                                        $job_id = $row['id'];
                                        $job_post_id = $row['job_post_id'];
                                        $freelancer_id = $row['freelancer_id'];
                                        
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
                                $offered_salary=$row['offered_salary'];
                                }
                                   ?>
                                    <tr class="table-row">
                                        <td  class="table-data"><a href="shortlisted_jobs.php?p_id=<?php echo $job_post_id; ?>"><img src="../client/assets/img/dogs/<?php echo  $image; ?>" alt="" class="freelancer-logo"></a></td>
                                        <td>
                                            <div></div>
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
                                                    <h6><strong>Location: </strong><?php echo $location; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong><?php echo $createdAt; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: $</strong><?php echo $offered_salary; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-data"><?php echo $status; ?></td>
<!--                                        <td class="table-data">Daily</td>-->
                                        <td class="table-data">
<!--                                        <i class="icon ion-android-delete trash"></i>-->
                                       <a href="messages.php?p_id=<?php echo $client_id; ?>">Chats</a>
                                        </td>
                                    </tr>
                               <?php  }
                                    ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "includes/dashboard_footer.php";?>