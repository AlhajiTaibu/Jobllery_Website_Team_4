<?php include "includes/header.php";?>
   <?php include "../freelancer/includes/db.php";?>
<?php include "../freelancer/includes/functions.php";?>
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
                      <?php
                        
                        if(isset($_POST['submit'])){
                            
                            // Removing whitespace
                            $title = trim($_POST['job_title']);
                            $contract = trim($_POST['contract']);
                            $description = trim($_POST['description']);
                            $category = trim($_POST['category']);
                            $required_skill = trim($_POST['required_skill']);
                            $max_salary = trim($_POST['max_salary']);
                            $min_salary = trim($_POST['min_salary']);
                            $tags = trim($_POST['tags']);
                            $duration = trim($_POST['duration']);
                            $salary_type = trim($_POST['salary_type']);
                            $deadline = trim($_POST['deadline']);
                            $offered_salary = trim($_POST['offered_salary']);
                            $experience = trim($_POST['experience']);
                            $location = trim($_POST['location']);
                            $profile_image = $_FILES['image']['name'];
                            $profile_temp_image = $_FILES['image']['tmp_name'];
                            $client_id = $_SESSION['user_id'];
                            
                            //move the file from a temproary location to the designated variable
                            move_uploaded_file($profile_temp_image, "assets/img/dogs/$profile_image");
                            //creation of associated array
                            $error=['job_title'=>'','contract'=>'','description'=>'','description_len'=>'', 'category'=>'','required_skill'=>'','tags'=>'','duration'=>'','experience'=>''];
                            
                            //assign a string to the error array if the job_title field is empty
                            if($title==''){
                            $error['job_title']='Job title field cannot be empty';
                            }  
                            //assign a string to the error array if the contract field is empty
                            if($contract==''){
                            $error['contract']='Contract field cannot be empty';
                            }   
                            //assign a string to the error array if the description field is empty
                            if( $description ==''){
                            $error['description']='Description field cannot be empty';
                            }
                            //assign a string to the error array if the description is too small
                            if(strlen($description)<30){
                            $error['description_len'] = "Description too small";
                            }   
                            //assign a string to the error array if the category field is empty
                            if($category==''){
                            $error['category']= "Please choose your category";
                            } 
                            //assign a string to the error array if the required_skill field is empty
                            if($required_skill==''){
                            $error['required_skill']= "Required skills field is required";
                            }  
                            //assign a string to the error array if the tags field is empty
                            if($tags==''){
                            $error['tags']= "Tags field is required";
                            }  
                            //assign a string to the error array if the duration field is empty
                            if($duration==''){
                            $error['duration']= " Job duration field is required";
                            }  
                            //assign a string to the error array if the experience field is empty
                            if($experience==''){
                            $error['experience']= "Level of experience field is required";
                            }  
                            //Loop through the error array
                            foreach($error as $key => $value ){
                            if(empty($value)){
                            unset($error[$key]); 
                            }
                            } 
                            
                            //if the error array is empty allow the code below to run
                            if(empty($error)){
                            
                            //invocation of postJob method
                        
                            postJob($client_id,$category,$title,$contract,$description,$deadline,$required_skill,$min_salary, $max_salary,$salary_type,$tags,$offered_salary,$duration,$experience,$profile_image,$location);
                        
                            }else{
                                
                            $message="";
                            }

                            
                            
                        }
                    
                    
                    
                        ?>
                      
                       <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="Job Title" name="job_title">
                                <!--  if the job title field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['job_title']) ? $error['job_title']:''; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group">
                                <label>Contract Type</label>
                                <select class="form-control" name="contract">
                                <option value="" >Select Contract Type</option>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                </select>
                                 <!--  if the job contract type field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['contract']) ? $error['contract']:''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                   <label>Description</label>
                                    <div class="form-group">
                                    <textarea class="form-control" rows="10" cols="30" name="description"></textarea>
                                     <!--  if the job description field is empty or has insufficient characters alert user-->
                                    <p class="text small text-danger"><?php 
                                        if(isset($error['description'])){
                                        echo $error['description'];
                                        }elseif(isset($error['description_len'])){
                                            echo $error['description_len'];
                                        }
                                        ?>
                                     </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" id="form-adjust">
                                <div class="col">
                                   <label>Featured Image</label>
                                    <div class="form-group">
                                    <input type="file" name="image"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 offset-md-0" id="forms">
                                <div class="form-group">
                                <label>Categories</label>
                                <select class="form-control" name="category">
                                <option value="">Select Category</option>
                                
                                <?php
                                $query="SELECT * FROM category";
                                $select_category = mysqli_query($connection,$query);
                                confirmQuery($select_category);
                                
                                while($row=mysqli_fetch_assoc($select_category)){
                                    $cat_id = $row['id'];
                                    $cat_name = $row['category_name'];
                               
                                    echo "<option value='{$cat_id}'>{$cat_name}</option>";
                               
                                }
                                    
                                ?>
                                </select>
                               <!--  if the job category field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['category']) ? $error['category']:''; ?></p>
                                
                                </div>
                                <div class="form-group">
                                <label>Required Skills</label>
                                <input class="form-control" type="tel" placeholder="Node.js,Java,Photoshop,Video editing" name="required_skill">
                                <!--  if the required skill field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['required_skill']) ? $error['required_skill']:''; ?></p>
                                </div>
                            <div class="form-group">
                            <label>Max. Salary</label>
                            <input class="form-control" type="tel" placeholder="eg. $2,000" name="max_salary">
                            </div>
                            <div class="form-group">
                            <label>Tags</label>
                            <input class="form-control" type="tel" placeholder="eg. PHP, HTML" name="tags">
                             <!--  if the tags field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['tags']) ? $error['tags']:''; ?></p>
                            </div>
                             <div class="form-group">
                            <label>Job Duration</label>
                            <input class="form-control" type="text" placeholder="" name="duration">
                            <!--  if the duration field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['duration']) ? $error['duration']:''; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-0" id="forms">
                            <div class="form-group">
                            <label>Application Deadline Date</label>
                            <input class="form-control" type="date" name="deadline">
                            </div>
                            <div class="form-group">
                            <label>Min. Salary</label>
                            <input class="form-control" type="text" placeholder="eg. $100" name="min_salary">
                            </div>
                            <div class="form-group">
                            <label>Salary Type</label>
                            <select class="form-control" name="salary_type">
                            <option value="">Select Salary Type</option>
                            <option value="month">Monthly</option>
                            <option value="week">Weekly</option>
                            <option value="day">Daily</option>
                            <option value="hour">Hourly</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Offered Salary</label>
                            <select class="form-control" name="offered_salary">
                            <option value="">Select Offered Salary</option>
                            <option value="100">Under $100</option>
                            <option value="1000">Under $1,000</option>
                            <option value="10000">Under $10,000</option>
                            <option value="100000">Over $10,000</option>
                            </select>
                            </div>
                             <div class="form-group">
                            <label>Level of Experience</label>
                            <select class="form-control" name="experience">
                            <option value="">Select your level of experience</option>
                            <option value="expert">Expert Level</option>
                            <option value="intermediate">Intermediate Level</option>
                            <option value="entry">Entry Level</option>
                            </select>
                           <!--  if the level of experience field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['experience']) ? $error['experience']:''; ?></p>
                            </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 offset-md-0" id="forms">
                    <div class="form-group">
                    <label>Location</label>
                    <input class="form-control" type="text" name="location">
                    </div>
                </div>
                <div class="col-md-6 offset-md-0" id="forms"></div>
            </div>
            <div class="form-group" id="forms">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                        <button class="btn btn-primary" id="button" type="submit" name="submit">Submit Job</button>
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