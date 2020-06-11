<?php include "includes/header.php";?>
<?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link active" href="../profile_page/client_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
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
            <div  class="container-fluid profile">
                <div class="profile-container">
                    <h3 class="header"><strong>Create Profile</strong></h3>
                    <?php
                        //When the save profile button is pressed a block of code runs
                        if(isset($_POST['submit'])){
                            
                            // Removing whitespace 
                            $firstname = trim($_POST['firstname']);     
                            $lastname = trim($_POST['lastname']);
                            $address = trim($_POST['address']);
                            $contact_number = trim($_POST['contact_number']);
                            $dob = trim($_POST['dob']);
                            $job_title = trim($_POST['job_title']);
                            $gender = trim($_POST['gender']);
                            $description = trim($_POST['description']);
                            $link = trim($_POST['link']);
                            $tags = trim($_POST['tags']);
                            $profile_image = $_FILES['image']['name'];
                            $profile_temp_image = $_FILES['image']['tmp_name'];
                            $user_id=$_SESSION['user_id'];
                            //move the file from a temproary location to the designated variable
                            move_uploaded_file($profile_temp_image, "assets/img/dogs/$profile_image");

                            $error=['firstname'=>'','lastname'=>'','address'=>'','gender'=>'','description'=>''];
            
                            //assign a string to the error array if the firstname field is empty
                            if($firstname==''){
                            $error['firstname']='Firstname field cannot be empty';
                            }  
                            //assign a string to the error array if the lastname field is empty
                            if($lastname==''){
                            $error['lastname']='Lastname field cannot be empty';
                            }   
                            //assign a string to the error array if the address field is empty
                            if($address==''){
                            $error['address']='Address field cannot be empty';
                            }
 
                            //assign a string to the error array if the gender field is empty
                            if($gender==''){
                            $error['gender']= "Please choose your gender";
                            } 
                            //assign a string to the error array if the description field is empty
                            if($description==''){
                            $error['description']="Description field is required";
                            }  
                            
                            //Loop through the error array 
                            foreach($error as $key => $value ){
                            if(empty($value)){
                            unset($error[$key]); 
                            }
                            } 
                            
                            //if the error array is empty allow the code below to run
                            if(empty($error)){
                            
                            //invocation of updateClientProfile method
                            createClientProfile($user_id,$firstname,$lastname,$address,$contact_number,$dob,$job_title,$gender, $description, $link, $tags,$profile_image);
                           
                                
                            
                            }else{
                                
                            
                            }

                            
                        }
                    
                    ?> 

                       <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>First Name</label>
                                <input class="form-control" type="text" name="firstname" required>
                                <!--  if the first name field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['firstname']) ? $error['firstname']:''; ?></p>
                                </div>
                                <div class="form-group"><label>Address</label>
                                <input class="form-control" type="text" name="address" required>
                                <!-- if the address field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['address']) ? $error['address']:''; ?></p>
                                </div>
                                <div class="form-group"><label>Phone Number</label>
                                <input class="form-control" type="tel" name="contact_number">
                                
                                </div>
                                <div class="form-group">
                                <label for="gender">Gender<select class="form-control" name="gender">
                                <option value="" >Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                </select>
                                </label>
                                <!-- if the gender field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['gender']) ? $error['gender']:''; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lastname" required>
                                <!-- if the last name field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['lastname']) ? $error['lastname']:''; ?></p>
                                </div>
                                <div class="form-group">
                                <label>Date of Birth</label>
                                <input class="form-control" type="date" name="dob">
                                </div>
                                <div class="form-group">
                                <label>Job Title</label>
                                <input class="form-control" type="text" name="job_title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Profile Image</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <input type="file" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Description</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <textarea class="form-control" name="description"></textarea>
                                    <!-- if the description field is empty alert user-->
                                    <p class="text small text-danger"><?php echo isset($error['description']) ? $error['description']:''; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Client URL</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <input class="form-control" type="url" name="link">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Tags</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col-4 offset-0">
                                    <div class="form-group">
                                    <input class="form-control" type="text" placeholder="eg. PHP, Developer, CSS" name="tags">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="forms">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                    <button class="btn btn-primary" id="button" type="submit" name="submit">Save Profile</button>
                                    </div>
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