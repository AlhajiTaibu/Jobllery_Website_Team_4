<?php include "includes/header.php";?>
   <?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="../profile_page/client_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a><a class="nav-link" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
                        <a
                            class="nav-link active" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
                            <a
                                class="nav-link" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <h4 class="header"><strong>Notification</strong></h4>
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
                    <div class="container-fluid">
                        <div class="table-responsive table-borderless" id="table-background">
                            <table class="table">
                                <thead class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <th>Alert Query</th>
                                        <th>Number of Jobs</th>
                                        <th>Times</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-row">
                                        <td class="table-data">Business</td>
                                        <td>
                                            <div></div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Category: </strong>Finance</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Location: </strong>Takoradi</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong>7 days ago</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: </strong>$5-$50</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-data">Jobs Found 0</td>
                                        <td class="table-data">Daily</td>
                                        <td class="table-data"><i class="icon ion-android-delete trash"></i></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="table-data">Business</td>
                                        <td>
                                            <div></div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Category: </strong>Finance</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Location: </strong>Takoradi</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong>7 days ago</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: </strong>$5-$50</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-data">Jobs Found 0</td>
                                        <td class="table-data">Daily</td>
                                        <td class="table-data"><i class="icon ion-android-delete trash"></i></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="table-data">Business</td>
                                        <td>
                                            <div></div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Category: </strong>Finance</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Location: </strong>Takoradi</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Posted Date: </strong>7 days ago</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h6><strong>Salary: </strong>$5-$50</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-data">Jobs Found 0</td>
                                        <td class="table-data">Daily</td>
                                        <td class="table-data">
                                            <div><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
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