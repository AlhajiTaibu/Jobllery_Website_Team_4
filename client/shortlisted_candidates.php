<?php include "includes/header.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a><a class="nav-link active" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="my_jobs.php"><i class="fas fa-paper-plane"></i><span><strong>My Jobs</strong><br></span></a>
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
                    <h3 class="header"><strong>Shortlisted Candidates</strong></h3>
                    <form>
                        <div class="form-row" id="row-style">
                            <div class="col-sm-12 col-md-6 col-sm-9 col-xs-12 col-lg-4" id="forms">
                                <div class="input-group"><input class="form-control input-btn" type="text" placeholder="Search"><span class="input-group-append"><button class="btn btn-outline-success btn-sm" id="search-btn" type="button"><i class="fa fa-search d-inline-block search-icon"></i></button></span></div>
                            </div>
                            <div class="col-1 col-sm-2 col-md-1 offset-3 offset-sm-0 offset-md-0 col-md-2 col-sm-4 col-xs-12 col-lg-4 sort-col" id="forms">
                                <div class="sort"><label class="text-nowrap" for="search">Sort by</label></div>
                            </div>
                            <div class="col col-md-4 col-sm-8" id="forms">
                                <div><select class="form-control input-btn"><option value="undefined">Newest</option><option value="">Date</option><option value="">Ascending</option><option value="">Descending</option></select></div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive follow-tbody">
                        <table class="table">
                            <tbody>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>Graphic Designer</strong></h4>
                                            <h5>AmaliTech Takoradi</h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="close-logo"><a href="#"><i class="icon ion-eye view"></i></a><a href="#"><i class="material-icons chats">chat</i></a><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>Graphic Designer</strong></h4>
                                            <h5>AmaliTech Takoradi</h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="close-logo"><a href="#"><i class="icon ion-eye view"></i></a><a href="#"><i class="material-icons chats">chat</i></a><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
                                    </td>
                                </tr>
                                <tr class="logo-background">
                                    <td id="img-div"></td>
                                    <td>
                                        <div class="text-justify job-logo-text">
                                            <h4><strong>Graphic Designer</strong></h4>
                                            <h5>AmaliTech Takoradi</h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="close-logo"><a href="#"><i class="icon ion-eye view"></i></a><a href="#"><i class="material-icons chats">chat</i></a><a href="#"><i class="icon ion-android-delete trash"></i></a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php include "includes/footer.php";?> 