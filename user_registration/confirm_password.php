<?php include "includes/header.php";?>
  <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
  <?php include "includes/navigation.php";?>
    <div class="container" id="login_container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(assets/img/dogs/forgotten_password_img.jpg)">;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                   
                        <?php
                            if(isset($_GET['token'])){

                                if(isset($_GET['c_id'])){

                                    $user_id = $_GET['c_id'];


                                if(isset($_POST['confirm'])){

                                $new_password=trim($_POST['new_password']);
                                $repeat_password=trim($_POST['repeat_password']);
                                $error = ['new_password'=>'','repeat_password'=>'','password_len'=>'','password_match'=>''];

                                if($new_password==''){
                                    $error['new_password']= 'New password field is required';
                                }

                                if(strlen($new_password)<8){
                                    $error['password_len']= 'Password should be more than 7 characters';
                                }

                                if($repeat_password==''){
                                    $error['repeat_password']= "Re-enter password field is required";
                                }

                                if($new_password!==$repeat_password){
                                    $error['password_match']= "Password mismatch. Please re-enter";
                                }

                                foreach($error as $key => $value ){
                                if(empty($value)){
                                unset($error[$key]); 
                                }

                                } 
                                if(empty($error)){

                                 confirmPassword($new_password,$repeat_password,$user_id);
                                    
                                }else{

                                  
                                }
                                }else{

                                   
                                }
                                }
                            }

                            ?>
                                    <div class="text-center">
                                        <h4 class="text-dark mb-2">Create a new Password</h4>
                                        <p class="mb-4"></p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                        <input class="form-control form-control-user" type="password" id="login-input"  placeholder="Please enter a new Password" name="new_password">
                                        <p class="text small text-danger"><?php 
                                        if(isset($error['new_password'])){
                                        echo $error['new_password'];
                                        }elseif(isset($error['password_len'])){
                                            echo $error['password_len'];
                                        }
                                        ?>
                                     </p>
                                        </div>
                                        <div class="form-group">
                                           <input class="form-control form-control-user" type="password" id="login-input"  placeholder="Re-enter Password" name="repeat_password">
                                           <p class="text small text-danger"><?php 
                                        if(isset($error['repeat_password'])){
                                        echo $error['repeat_password'];
                                        }elseif(isset($error['password_len'])){
                                            echo $error['password_len'];
                                        }
                                        ?>
                                     </p>
                                           </div>
                                           <button class="btn btn-primary btn-block text-white btn-user"
                                            type="submit" name="confirm">Confirm</button></form>
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