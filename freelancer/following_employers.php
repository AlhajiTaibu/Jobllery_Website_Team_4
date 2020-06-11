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
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link active" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/dashboard_navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h4 class="header"><strong>Following Employers</strong></h4>
                    <form>
                        <div class="form-row" id="row-style">
                            <div class="col-12 col-md-8 col-lg-5 offset-0 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search d-inline-block search-icon"></i></button></span></div>
                            </div>
                            <div class="col-1 col-md-3 col-lg-1 offset-3 offset-md-3 offset-lg-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
<!--                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>-->
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 offset-0 col-md-4 col-sm-8" id="forms">
<!--                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>-->
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                                <tr class="logo-background">
                                    <td id="img-div">
                                        <div></div>
                                    </td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>AmaliTech gGmbH</strong></h4>
                                            <h6>SSNIT Houuse, Takoradi</h6>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div id="follow-employers-btn">
                                            <div class="row">
                                                <div class="col">
                                                    <div><button class="btn btn-success btn-sm" id="follow-btn" type="button">Unfollow</button></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6 id="job-open" class="job-open">1 Open Job</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div">
                                        <div></div>
                                    </td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>AmaliTech gGmbH</strong></h4>
                                            <h6>SSNIT Houuse, Takoradi</h6>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div id="follow-employers-btn">
                                            <div class="row">
                                                <div class="col">
                                                    <div><button class="btn btn-success btn-sm" id="follow-btn" type="button">Unfollow</button></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6 id="job-open" class="job-open">1 Open Job</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div">
                                        <div></div>
                                    </td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>AmaliTech gGmbH</strong></h4>
                                            <h6>SSNIT Houuse, Takoradi</h6>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div id="follow-employers-btn">
                                            <div class="row">
                                                <div class="col">
                                                    <div><button class="btn btn-success btn-sm" id="follow-btn" type="button">Unfollow</button></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6 id="job-open" class="job-open">1 Open Job</h6>
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
  <?php include "includes/dashboard_footer.php";?>