<?php include "includes/header.php";?>
  <?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
  <?php include "includes/navigation.php";?>
<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
<!--			<img src="vendors/images/login-img.png" alt="login" class="login-img">-->
			<h2 class="text-center mb-30">Create Password</h2>
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
  
			<form action="" method="post">
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="new_password" placeholder="New Password" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
                    <p class="text small text-danger"><?php 
                    if(isset($error['new_password'])){
                    echo $error['new_password'];
                    }elseif(isset($error['password_len'])){
                    echo $error['password_len'];
                    }
                    ?>
                    </p>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password" id="login-input" required>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
                    <p class="text small text-danger"><?php 
                    if(isset($error['repeat_password'])){
                    echo $error['repeat_password'];
                    }elseif(isset($error['password_len'])){
                    echo $error['password_len'];
                    }
                    ?>
                    </p>
				</div>
				<p class="link">Password should be at least 8 characters</p>
				<button class="btn btn-primary btn-block text-white btn-user" type="submit" name="confirm">Confirm</button>

			</form>
			<br>
			 <div class="text-center">
                <a class="small" href="login.php">Already a member? Log in!</a></div>
            <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
		</div>
	</div>
   <?php include "includes/footer.php";?> 