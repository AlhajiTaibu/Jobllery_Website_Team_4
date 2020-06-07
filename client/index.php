<?php include "includes/header.php";?>
   <?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0" id="sidebar-color">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-text mx-3"><img class="img-fluid dashboard-logo" src="assets/img/dogs/New%20Logo.png"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link" href="profile.php"><i class="fas fa-user-alt"></i><span><strong>Profile</strong></span></a><a class="nav-link"
                            href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a><a class="nav-link" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notifications</strong><br></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong><br></span></a><a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/navigation.php";?>
            <div class="container-fluid navigation">
                <div>
                    <h3 class="text-dark mb-0"><strong>Application Statistics</strong></h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-bottom-success py-2">
                            <div class="card-body" id="index-card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                </div>
                                <?php
                                $query="SELECT * FROM job_post WHERE client_id={$_SESSION['user_id']}"; 
                                $select_job_by_client = mysqli_query($connection,$query);
                                confirmQuery($select_job_by_client);
                                $number_of_post = mysqli_num_rows($select_job_by_client);
                           
                                ?>
                                
                                <h3><strong><?php echo $number_of_post; ?></strong></h3>
                                <h6>Posted Jobs<br></h6>
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
                                <h3><strong>0</strong></h3>
                                <h6>Shortlisted<br></h6>
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
                        <h4 class="text-left mb-0 header"><strong>Recent Applicants</strong></h4>
                    </div>
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="job-logo-text">
                                            <h4><strong>Shamsu Deen Ahmed</strong></h4>
                                            <h5><strong>Accra</strong></h5>
                                            <h5><strong>Graphic Designer</strong></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="follow-employers-btn">
                                            <div class="row">
                                                <div class="col">
                                                    <div><button class="btn btn-secondary pending" type="button">Pending</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="job-logo-text">
                                            <h4><strong>Shamsu Deen Ahmed</strong></h4>
                                            <h5><strong>Accra</strong></h5>
                                            <h5><strong>Graphic Designer</strong></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="follow-employers-btn">
                                            <div class="row">
                                                <div class="col">
                                                    <div><button class="btn btn-secondary pending" type="button">Pending</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php include "includes/footer.php";?>  