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
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
                            <a
                                class="nav-link active" href="payments.php"><i class="fas fa-money-check-alt"></i><span><strong>Payments</strong><br></span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
<?php include "includes/navigation.php";?>
            <div class="container-fluid profile">
                <div class="profile-container">
                    <div class="header-div">
                        <h4 class="header"><strong>Payments</strong></h4>
                    </div>
                    <div class="container-fluid">
                        <h6 class="text-right"><strong>Account Balance: $1900.80 &nbsp; &nbsp;</strong></h6>
                        <div id="payment-card">
                            <div>
                                <div class="table-responsive">
                                    <table class="table payment-header">
                                        <tbody>
                                            <tr>
                                                <td id="payment-nav">
                                                    <a href="#">
                                                        <div>
                                                            <h6 class="text-center"><strong>Available Funds</strong></h6>
                                                            <h6><br></h6>
                                                            <h4 class="text-center"><strong>$300.00</strong></h4>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="text-center payment-nav-item" id="payment-nav-item">
                                                    <a href="#">
                                                        <div class="payment-nav-inactive">
                                                            <h6><strong>Pending Work</strong></h6>
                                                            <h6><br></h6>
                                                            <h4><strong>$800.00</strong></h4>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="text-center" id="payment-nav-item">
                                                    <a id="payment-nav-inactive" href="#">
                                                        <div class="payment-nav-inactive">
                                                            <h6><strong>In Review</strong></h6>
                                                            <h6><br></h6>
                                                            <h4><strong>$700.00</strong></h4>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="text-center" id="payment-nav-item">
                                                    <a id="payment-nav-inactive" href="#">
                                                        <div class="payment-nav-inactive">
                                                            <h6><strong>Work In Progress</strong></h6>
                                                            <h6><br></h6>
                                                            <h4><strong>$900.00</strong></h4>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive payment-table">
                                    <table class="table">
                                        <tbody class="payment-table">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Title</th>
                                                                        <th class="text-center">Client Details</th>
                                                                        <th class="text-center">Location</th>
                                                                        <th class="text-center">Salary</th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="table-row">
                                                                        <td class="text-center">Business</td>
                                                                        <td class="text-center">
                                                                            <div>
                                                                                <h6><strong>Godsway Nyatuame</strong></h6>
                                                                                <h6><strong>Category: </strong>Finance</h6>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center">Takoradi</td>
                                                                        <td class="text-center">$5-$50</td>
                                                                        <td class="text-center">
                                                                            <div><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><button class="btn btn-success btn-sm" id="payment-btn" type="button">Payment</button>
                                                    <a href="#">
                                                        <h6>Transaction History</h6>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "includes/footer.php";?> 