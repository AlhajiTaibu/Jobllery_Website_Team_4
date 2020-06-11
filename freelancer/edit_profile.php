<?php include "includes/dashboard_header.php";?>
<?php include "includes/db.php";?>
<?php include "includes/functions.php";?>
    <div id="wrapper">
        <nav class="navbar navbar-dark fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="joblllery-logo"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php"></a></div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span><strong>Dashboard</strong></span></a><a class="nav-link active" href="../profile_page/freelancer_profile_page.php?p_id=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i><strong>Profile</strong></a><a class="nav-link"
                            href="jobs_applied.php"><i class="fas fa-toolbox"></i><span><strong>Jobs Applied</strong></span></a><a class="nav-link" href="shortlisted_jobs.php"><i class="fas fa-clipboard-list"></i><span><strong>Awarded Jobs</strong></span></a>
                        <a
                            class="nav-link" href="notification.php"><i class="fas fa-info"></i><span><strong>Notification</strong></span></a><a class="nav-link" href="messages.php"><i class="fas fa-envelope-open"></i><span><strong>Messages</strong></span></a><a class="nav-link" href="following_employers.php"><i class="fas fa-paper-plane"></i><span><strong>Following Employers</strong></span></a>
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
                    <h3 class="header"><strong>Update Profile</strong></h3>
                    
                    <?php
                        //When the save profile button is pressed a block of code runs
                        if(isset($_GET['p_id'])){
                          
                        $user_id = trim($_GET['p_id']);
                        
                        $query="SELECT * FROM profile WHERE user_id={$user_id}";
                        $select_profile=mysqli_query($connection,$query);
                        confirmQuery($select_profile);
                            
                        while($row=mysqli_fetch_assoc($select_profile)){
                            $firstname=$row['first_name'];
                            $lastname=$row['last_name'];
                            $address=$row['address'];
                            $dob=$row['dob'];
                            $contact_number=$row['contact_number'];
                            $experience = $row['experience'];
                           
                            $gender=$row['gender'];
                            $qualification = $row['qualification'];
                            $image=$row['image'];
                            $description=$row['description'];
                            $url=$row['url'];
                            $tags=$row['tags'];
                        }


                            
                        }else{
                            
                            
                        }
                    
                    ?>
                    
                    
                    <?php
                        //When the save profile button is pressed a block of code runs
                        if(isset($_POST['submit'])){
                            
                            // Removing whitespace
                            $firstname = trim($_POST['firstname']);
                            $lastname = trim($_POST['lastname']);
                            $address = trim($_POST['address']);
                            $contact_number = trim($_POST['contact_number']);
                            $experience = trim($_POST['experience']);
                            $dob = trim($_POST['dob']);
                            $gender = trim($_POST['gender']);
                            $qualification = trim($_POST['qualification']);
                            $description = trim($_POST['description']);
                            $link = trim($_POST['link']);
                            $tags = trim($_POST['tags']);
                            $profile_image = $_FILES['image']['name'];
                            $profile_temp_image = $_FILES['image']['tmp_name'];
                            $user_id = $_SESSION['user_id'];
                            
                            //move the file from a temproary location to the designated variable
                            move_uploaded_file($profile_temp_image, "assets/img/dogs/$profile_image");
                            
                            //creation of associated array
                            $error=['firstname'=>'','lastname'=>'','address'=>'','gender'=>'','qualification'=>'','description'=>''];
            
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
                            //assign a string to the error array if the qualification field is empty
                            if($qualification==''){
                            $error['qualification']="Please choose your qualification";
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
                             updateProfile($user_id,$firstname,$lastname,$address,$contact_number,$experience,$dob,$gender,$qualification, $description, $link, $tags,$profile_image); 
                           
                                
                            
                            }else{
                                
                            $message="";
                            }

                            
                        }
                    
                    ?> 
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>First Name</label>
                                <input class="form-control" type="text" name="firstname" value="<?php echo $firstname;?>">
                                <!--  if the first name field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['firstname']) ? $error['firstname']:''; ?></p>
                                </div>
                                <div class="form-group"><label>Address</label>
                                <input class="form-control" type="text" name="address" value="<?php echo $address;?>">
                                <!--  if the address field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['address']) ? $error['address']:''; ?></p>
                                </div>
                                <div class="form-group"><label>Phone Number</label>
                                <input class="form-control" type="tel" name="contact_number" value="<?php echo $contact_number;?>">
                                </div>
                                <div class="form-group"><label>Experience</label>
                                <input class="form-control" type="text" name="experience" value="<?php echo $experience;?>">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group"><label>Last Name</label>
                                <input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>">
                                <!--  if the last name field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['lastname']) ? $error['lastname']:''; ?></p>
                                </div>
                                <div class="form-group"><label>Date of Birth</label>
                                <input class="form-control" type="date" name="dob" value="<?php echo $dob;?>">
                                </div>
<!--
                                <div class="form-group"><label>Job Title</label>
                                <input class="form-control" type="text" name="job_title">
                                </div>
-->
                                <div class="form-group">
                                <label for="gender">Gender
                                <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                </select>
                                </label>
                                <!--  if the gender field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['gender']) ? $error['gender']:''; ?></p>
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
                            <h4 class="heading-style"><strong>Qualifications</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <select class="form-control" name="qualification">
                                    <option value="" selected="">Select your highest level of education</option>
                                    <option value="doctor">Doctoral Degree</option>
                                    <option value="masters">Masters Degree</option>
                                    <option value="degree">Bachelor's Degree</option>
                                    <option value="high_school">High School Certificate</option>
                                    </select>
                                    <!--  if the qualification field is empty alert user-->
                                    <p class="text small text-danger"><?php echo isset($error['qualification']) ? $error['qualification']:''; ?></p>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Description</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <textarea class="form-control" name="description"><?php echo $description;?></textarea>
                                    <!--  if the description field is empty alert user-->
                                    <p class="text small text-danger"><?php echo isset($error['description']) ? $error['description']:''; ?></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Documents URL</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                    <div class="form-group">
                                    <input class="form-control" type="url" name="link" value="<?php echo $url;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="heading-style"><strong>Tags</strong></h4>
                            <div class="form-row" id="form-adjust">
                                <div class="col-4 offset-0">
                                    <div class="form-group">
                                    <input class="form-control" type="text" placeholder="eg. PHP, Developer, CSS" name="tags" value="<?php echo $tags;?>">
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
                                    <button class="btn btn-primary" id="button" type="submit" name="submit">Update Profile</button>
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
     <?php include "includes/dashboard_footer.php";?>