<?php require 'PHPMailer/PHPMailerAutoload.php';?>
 <?php include "includes/header.php";?>
 <?php include "../freelancer/includes/db.php"; ?>
 <?php include "../freelancer/includes/functions.php"; ?>
  <?php include "includes/navigation.php";?>
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
<!--			<img src="vendors/images/login-img.png" alt="login" class="login-img">-->
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
			<h2 class="text-center mb-30">Register</h2>
			<?php 
                                // display message if the register button is pressed
                                if(isset($_POST['submit'])){
                                    echo $message;
                                } ?>
			
			<form action="" method="post">
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" name="username" placeholder="Username" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					<!--  if the username field is empty alert user-->
                    <p class="text link text-danger"><?php echo isset($error['username']) ? $error['username']:''; ?></p>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" name="email" placeholder="Email" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					</div>
					 <!--  if email field is empty alert user-->
                     <p class="text link text-danger"><?php echo isset($error['email']) ? $error['email']:''; ?></p>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="password" placeholder="Password" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
					<p class="link">Password should be at least 8 characters</p>
					 <!--  alert user if the password field is empty or when the password length is less than 8 characters-->
                    <p class="text small text-danger">
                                       <?php 
                                        if(isset($error['password'])){
                                        echo $error['password'];
                                        }elseif(isset($error['password_len'])){
                                            echo $error['password_len'];
                                        }
                                        ?>
                     </p>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="password_repeat" placeholder="Repeat Password" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
					<!--  alert user when there is password mismatch -->
                     <p class="text link text-danger"><?php echo isset($error['password_match']) ? $error['password_match']:''; ?></p>
				</div>
				<div class="d-flex">
				<div class="custom-control custom-radio mb-5 mr-20">
                <input type="radio" class="custom-control-input" value="client" name="role" id="client">
                <label for="client" class="custom-control-label weight-400">Client</label>
				    
				</div>

				<div class="custom-control custom-radio mb-5 mr-20">
                <input type="radio" class="custom-control-input" value="freelancer" name="role" id="freelancer" checked>
                <label for="freelancer" class="custom-control-label weight-400">Freelancer</label>
				    
				</div>
                </div>
                <p class="link">By Registering, you have agreed to the <a href="#">Terms</a> and <a href="#">Privacy</a> of Jobllery.com</p>

				
				
				<button class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit">Sign Up</button>

			</form>
			<br>
			 
            <div class="text-center"><a class="small" href="login.php">Already a member? Sign in!</a></div>
		</div>
	</div>
 <?php include "includes/footer.php";?> 