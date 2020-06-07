<?php include "includes/header.php";?>
  <?php include "includes/navigation.php";?>
   <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
    <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
<!--			<img src="vendors/images/login-img.png" alt="login" class="login-img">-->
			<h2 class="text-center mb-30">Login</h2>
			     <?php
                          //When the login button is pressed a block of code runs
                          if(isset($_POST['login'])){
                              
                           $email=trim($_POST['email']);            // Removing whitespaces from user input
                           $password=trim($_POST['password']);
                           
                            if(empty($email)&&empty($password)){    // checking for empty variables
                                
                           }else{
                                
                            login_user($email,$password);           // invocation of the login user method
                           }
                           
                         
                       } 
                        
                        
                        ?> 
			<form action="" method="post">
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" name="email" placeholder="Enter Email" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="password" placeholder="Enter Password" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				
				<button class="btn btn-primary btn-block text-white btn-user" type="submit" name="login">Login</button>

			</form>
			<br>
			 <div class="text-center">
                <a class="small" href="forgot_password.php">Forgot Password?</a></div>
            <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
		</div>
	</div>   <?php include "includes/footer.php";?> 