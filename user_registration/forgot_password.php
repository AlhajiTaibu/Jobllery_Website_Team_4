<?php include "includes/header.php";?>
 <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
    <?php require 'PHPMailer/PHPMailerAutoload.php';?>
  <?php include "includes/navigation.php";?>
   <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
<!--			<img src="vendors/images/login-img.png" alt="login" class="login-img">-->
			<h2 class="text-center mb-30">Forgot Password</h2>
                <?php

                if(isset($_POST['reset'])){

                $email =trim($_POST['email']);

                $error="";

                if($email==''){
                $error = "Email field cannot be empty. Please, kindly enter your email";
                }

                if(empty($error)){

                forgetPassword($email);

                $message = "<h6 class='alert alert-info'>Password reset email sent, kindly visit your email to continue the password reset</h6>";   

                }else{

                $message="";
                }

                }else{
                $message="";
                }


                ?> 
                <?php 
                if(isset($_POST['reset'])){
                echo $message;

                } 
                ?>

			<form action="" method="post">
				<div class="input-group custom input-group-lg">
					<input type="email" class="form-control" name="email" placeholder="Enter Email" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					 <p class="text link text-danger"><?php echo isset($error) ? $error:''; ?></p>
				</div>
				
				
				<button class="btn btn-primary btn-block text-white btn-user" type="submit" name="reset">Submit</button>

			</form>
			<br>
			 <div class="text-center">
                <a class="small" href="login.php">Already a member? Log in!</a></div>
            <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
		</div>
	</div>
   <?php include "includes/footer.php";?> 