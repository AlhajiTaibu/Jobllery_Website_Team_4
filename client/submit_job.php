<?php include "includes/header.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link active"
                            href="submit_job.php"><i class="fas fa-toolbox"></i><span><strong>Submit Job</strong><br></span></a><a class="nav-link" href="shortlisted_candidates.php"><i class="fas fa-clipboard-list"></i><span><strong>Shortlisted Candidates</strong></span></a>
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
                    <h3 class="header"><strong>Submit Job</strong></h3>
                    <form>
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>Title</label><input class="form-control" type="text" placeholder="Job Title"></div>
                            </div>
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>Contract Type</label><select class="form-control"><option value="undefined" selected="">Select Contract Type</option><option value="">Full-time</option><option value="">This is item 2</option><option value="14">This is item 3</option></select></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Description</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group"><textarea class="form-control" rows="10" cols="30"></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" id="form-adjust">
                                <div class="col"><label>Featured Image</label>
                                    <div class="form-group"><input type="file"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>Categories</label><select class="form-control"><option value="undefined" selected="">Select Category</option><option value="">This is item 1</option><option value="">This is item 2</option><option value="">This is item 3</option></select></div>
                                <div
                                    class="form-group"><label>Job Apply Type</label><input class="form-control" type="tel" placeholder="Internal"></div>
                            <div class="form-group"><label>Max. Salary</label><input class="form-control" type="tel" placeholder="eg. $2,000"></div>
                            <div class="form-group"><label>Tags</label><input class="form-control" type="tel" placeholder="eg. PHP, HTML"></div>
                        </div>
                        <div class="col-md-6 offset-md-0" id="forms">
                            <div class="form-group"><label>Application Deadline Date</label><input class="form-control" type="date"></div>
                            <div class="form-group"><label>Min. Salary</label><input class="form-control" type="text" placeholder="eg. $100"></div>
                            <div class="form-group"><label>Salary Type</label><select class="form-control"><option value="undefined" selected="">Select Salary Type</option><option value="">Monthly</option><option value="">Weekly</option><option value="">Daily</option><option value="">Hourly</option></select></div>
                            <div
                                class="form-group"><label>Offered Salary</label><select class="form-control"><option value="undefined" selected="">Select Offered Salary</option><option value="">Under $100</option><option value="">Under $1,000</option><option value="">Under $10,000</option><option value="">Over $10,000</option></select></div>
                </div>
            </div>
            <div class="form-group">
                <h4 class="heading-style"><strong>Designation</strong></h4>
                <div class="form-row" id="form-adjust">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Web Designer</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Human Resource</label></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Graphic Designer</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">CMS Developer</label></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">App Developer</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Blogging</label></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <h4 class="heading-style"><strong>Qualifications</strong></h4>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 offset-md-0" id="forms">
                    <div class="form-group"><select class="form-control"><option value="undefined" selected="">Select your highest level of qualification</option><option value="">Doctors</option><option value="">Masters</option><option value="">Bachelors Degree</option><option value="">High School </option></select></div>
                </div>
                <div class="col-md-6 offset-md-0" id="forms"></div>
            </div>
            <div class="form-row">
                <div class="col">
                    <h4 class="heading-style"><strong>Location</strong></h4>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 offset-md-0" id="forms">
                    <div class="form-group"><input class="form-control" type="text"></div>
                </div>
                <div class="col-md-6 offset-md-0" id="forms"></div>
            </div>
            <div class="form-group" id="forms">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><button class="btn btn-primary" id="button" type="submit">Save Profile</button></div>
                    </div>
                    <div class="col">
                        <div class="form-group"></div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
  <?php include "includes/footer.php";?> 