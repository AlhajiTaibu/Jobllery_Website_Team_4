<?php require 'PHPMailer/PHPMailerAutoload.php';?>
 <?php include "includes/header.php";?>
 <?php include "../freelancer/includes/db.php"; ?>
 <?php include "../freelancer/includes/functions.php"; ?>
  <?php include "includes/navigation.php";?>
    <div class="container" id="login_container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
     <?php
         //When the register button is pressed a block of code runs  
        if(isset($_POST['submit'])){
        
          // Removing whitespace
         $username = trim($_POST['username']);
         $email = trim($_POST['email']);
         $password = trim($_POST['password']);
         $password_repeat = trim($_POST['password_repeat']);
         $user_role = trim($_POST['role']);
         
         //creation of associated array
         $error=['username'=>'','password'=>'','password_len'=>'','password_match'=>'', 'email'=>'','user_role'=>''];
            
        //assign a string to the error array if the username field is empty    
        if($username==''){
            $error['username']='Username field cannot be empty';
        }  
        
        //assign a string to the error array if the password field is empty  
        if($password==''){
             $error['password']='Password cannot be empty';
         } 
        
        //assign a string to the error array if the password length is less than 8 characters
        if(strlen($password)<8){
            $error['password_len']= 'Password needs to longer than 7';
            }
        
        //assign a string to the error array if the password and repeat password does not match
        if($password!==$password_repeat){
            $error['password_match']= 'Password mismatch';
        }
            
        //assign a string to the error array if the user role field is empty
        if($user_role==''){
            $error['user_role']='Role field cannot be empty';
        }
        
        //assign a string to the error array if the email field is empty
        if($email==''){
            $error['email']="Email field cannot be empty";
        } 
        
        //assign a string to the error array if the entered email already exist in the database
        if(email_exists($email)){
            $error['email']='Email already taken'.'<a href="login.php">Please login</a>';
        }   
        
        //Loop through the error array
         foreach($error as $key => $value ){
             if(empty($value)){
                unset($error[$key]); 
             }
         } 
        
        // if error array is empty run the code block below
        if(empty($error)){
            
            // invocation of the register user method
            register_user($username,$email,$password,$user_role); 
            
            // alert user
            $message="<h6 class='alert alert-success'>Confirm your registration by visiting your email</h6>";
        }else{
            $message="";
        }
            
        }
        
        
        ?>
               
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(assets/img/dogs/jb3.jpg);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                               <?php 
                                // display message if the register button is pressed
                                if(isset($_POST['submit'])){
                                    echo $message;
                                } ?>
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" action="" method="post">
                                
                                <div class="form-group">
                                <input class="form-control form-control-user" type="text" id="login-input"  placeholder="Enter username" name="username" value="<?php echo isset($username) ? $username:''; ?>">
                                <!--  if the username field is empty alert user-->
                               <p class="text small text-danger"><?php echo isset($error['username']) ? $error['username']:''; ?></p>
                                </div>
                                <div class="form-group">
                                <input class="form-control form-control-user" type="email" id="login-input" aria-describedby="emailHelp" placeholder="Email Address" name="email" value="<?php echo isset($email) ? $email:''; ?>">
                                <!--  if email field is empty alert user-->
                             <p class="text small text-danger"><?php echo isset($error['email']) ? $error['email']:''; ?></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="password" id="login-input" placeholder="Password" name="password">
                <!--  alert user if the password field is empty or when the password length is less than 8 characters-->
                                       <p class="text small text-danger"><?php 
                                        if(isset($error['password'])){
                                        echo $error['password'];
                                        }elseif(isset($error['password_len'])){
                                            echo $error['password_len'];
                                        }
                                        ?>
                                     </p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="password" id="login-input" placeholder="Repeat Password" name="password_repeat">
                <!--  alert user if the password field is empty or when the password length is less than 8 characters-->
                                       <p class="text small text-danger"><?php 
                                        if(isset($error['password'])){
                                        echo $error['password'];
                                        }elseif(isset($error['password_len'])){
                                            echo $error['password_len'];
                                        }
                                        ?>
                                     </p>
                                    </div>
                                </div>
                                <div>
                                   <!--  alert user when there is password mismatch -->
                                    <p class="text small text-danger"><?php echo isset($error['password_match']) ? $error['password_match']:''; ?></p>
                                    <h6 class="text-dark ">Use 8 or more characters</h6>
                                </div>
                                <div class="form-group">
                                <label class="register-label">Register As</label>
                                <select class="form-control" id="login-input" name="role">
                                <option value="" selected="" >Select Role</option>
                                <option value="client">Client</option>
                                <option value="freelancer">Freelancer</option>
                                </select>
                                <!--  if user role field is empty alert user-->
                                <p class="text small text-danger"><?php echo isset($error['user_role']) ? $error['user_role']:''; ?></p>
                                </div>
                                <div>
                                <h6 class="smaller">By Registering, you have agreed to the <a href="#">Terms</a> and <a href="#">Privacy</a> of Jobllery.com</h6>
                                </div>
                                <br>
                                <button
                                    class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit">Register Account</button>
                                    <hr>
                            </form>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php include "includes/footer.php";?> 