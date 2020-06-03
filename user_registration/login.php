<?php include "includes/header.php";?>
  <?php include "includes/navigation.php";?>
   <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
    <div class="container" id="login_container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(assets/img/dogs/jb1.jpg);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                <?php
                       if(isset($_POST['login'])){
                           $email=trim($_POST['email']);
                           $password=trim($_POST['password']);
                           if(empty($email)&&empty($password)){
                                
                           }else{
                            login_user($email,$password);   
                           }
                           
                         
                       } 
                        
                        
                        ?>   
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group"><input class="form-control" type="email" id="login-input" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="login-input" placeholder="Password" name="password" required></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="login">Login</button>
                                        <h1>&nbsp;</h1>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot_password.php">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include "includes/footer.php";?> 