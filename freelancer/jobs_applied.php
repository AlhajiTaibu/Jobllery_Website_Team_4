<?php include "includes/dashboard_header.php";?>
   <?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link active"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                        <a
                            class="nav-link" href="browse_jobs.php"><i class="fas fa-info"></i><span><strong>Browse Jobs</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                   
                </ul>
<!--                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>-->
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h4 class="header"><strong>Jobs Applied</strong></h4>
<!--
                    <form>
                        <div class="form-row" id="row-style">
                            <div class="col-12 col-md-1 col-md-12 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search search-icon"></i></button></span></div>
                            </div>
                            <div class="col-3 col-md-3 offset-3 offset-md-0 col-md-3 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>
                            </div>
                            <div class="col-12 col-md-12 col-md-9 col-sm-8 col-lg-4" id="forms">
                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>
                            </div>
                        </div>
                        
                    </form>
-->
                    
                    <?php
                        if(isset($_GET['job_post_id'])){
                            if(isset($_GET['client_id'])){
                            $job_post_id = $_GET['job_post_id'];
                            $freelancer_id = $_SESSION['user_id'];
                            $client_id=$_GET['client_id']; 
                            
                             jobApplied($job_post_id,$client_id,$freelancer_id);
                            }else{
                                
                            }
                           
                            
                           
                        }else{
                            $freelancer_id = $_SESSION['user_id'];
                        }
                    
                    
                    
                    ?>
                    
                    
                    
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                               
                               <?php
                                $query="SELECT * FROM jobs_applied WHERE freelancer_id={$freelancer_id} ORDER BY apply_date DESC";
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
                                        <div class="text-justify job-logo-text">
                                            <h5><strong>Job Title: <?php echo $job_title; ?></strong></h5>
                                            <h6>Location: <?php echo $location; ?></h6>
                                            <h6>Status: <?php echo  $status; ?></h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="close-logo">
<!--                                        <a href="#"><i class="icon ion-android-delete trash"></i></a>-->
                                        </div>
                                    </td>
                                </tr>
                                  <?php  
                                   }
                                
                                ?>
<!--
                                    <tr class="logo-background">
                                        <td id="img-div">
                                            <div></div>
                                        </td>
                                        <td>
                                            <div class="text-justify job-logo-text">
                                                <h4><strong>Web Development</strong></h4>
                                                <h5>AmaliTech Takoradi</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="close-logo"><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
                                        </td>
                                    </tr>
-->
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   <?php include "includes/dashboard_footer.php";?>