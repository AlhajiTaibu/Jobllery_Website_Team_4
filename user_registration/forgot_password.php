<?php include "includes/header.php";?>
 <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
    <?php require 'PHPMailer/PHPMailerAutoload.php';?>
  <?php include "includes/navigation.php";?>
    <div class="container" id="login_container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(assets/img/dogs/forgotten_password_img.jpg);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                   
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

                                    <div class="text-center">
                                        <?php 
                                    if(isset($_POST['reset'])){
                                    echo $message;

                                    } 
                                    ?>
                                        <h4 class="text-dark mb-2">Forgot Your Password?</h4>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                           <input class="form-control form-control-user" type="email" id="login-input"  placeholder="Enter Email Address..." name="email">
                                           <p class="text small text-danger"><?php echo isset($error) ? $error:''; ?></p>
                                           </div>
                                    <button class="btn btn-primary btn-block text-white btn-user"
                                            type="submit" name="reset">Reset Password</button></form>
                                    <div class="text-center">
                                        <hr><a class="small" href="register.php">Create an Account!</a></div>
                                    <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include "includes/footer.php";?> 