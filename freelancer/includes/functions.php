<?php

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}

function email_exists($email){
    global $connection;
    
    $query="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($connection,$query);
    
    $count= mysqli_num_rows($result);
    
    if($count>0){
        return true;
    }else{
        return false;
    }
}

function register_user($username,$email,$password,$user_role){
    global $connection;
    
    if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($user_role)){
        
        $username=mysqli_real_escape_string($connection,$username);
        $email=mysqli_real_escape_string($connection,$email);
        $password=mysqli_real_escape_string($connection,$password);
        $salt="$2y$10$";
        $hash="iaminlovewithphpoop123";
        $hashSalt=$salt.$hash;
        
        $password=crypt($password,$hashSalt);
        
        $token=md5(rand('10000','99999'));
        $email_confirmation_status ='inactive';
        
        $query="INSERT INTO users(username,email,password,user_role,email_confirmation_status,token) VALUES('$username','$email','$password','$user_role','$email_confirmation_status','$token')";
        $register_user=mysqli_query($connection,$query);
        
        confirmQuery($register_user);
       
        if( $register_user==true){
        date_default_timezone_set('Etc/UTC');


        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        //$mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        //$mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "alhabdutaib@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "Abdurami@1992";

        //Set who the message is to be sent from
        $mail->setFrom('alhabdutaib@gmail.com', 'Localhost');

        //Set an alternative reply-to address
        $mail->addReplyTo('alhabdutaib@gmail.com', 'Localhost');

        //Set who the message is to be sent to
        $mail->addAddress($email, '$username');
       
        $last_id = mysqli_insert_id($connection);
        
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/jobllery2/user_registration/verify.php?v_id='.$last_id.'&token='.$token;
            
        $output = '<div>Thanks for registering with Jobllery. Please kindly click this link to complete your registration. Thank you. <br>' .$url.'</div>';
    
        $mail->isHTML(true);
            
        //Set the subject line
        $mail->Subject = 'Registration Confirmation';
        
        $mail->Body = $output;
               //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML('<!DOCTYPE html><html><body>Please click on this link for your email confirmation</body></html>');
        
        
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Congratulations';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
             echo "Mailer Error: " . $mail->ErrorInfo;
            
        } else {
           
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
                }
    }
}

function login_user($email,$password){
    
    global $connection;
    
    $email=trim($email);
    $password=trim($password);
    
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);
    
    $query="SELECT * FROM users WHERE email='$email' AND email_confirmation_status='active'";
    $select_query=mysqli_query($connection,$query);
    
    confirmQuery($select_query);
    
    while($row=mysqli_fetch_assoc($select_query)){
        $db_username=$row['username'];
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_user_role=$row['user_role'];
        $db_user_id=$row['id'];
    
    
    $password=crypt($password,$db_password);
    
  if($email!==$db_email && $password!==$db_password){
    
      echo "<p class='alert alert-danger'>Wrong password and email</p>";
    
    }elseif($email==$db_email && $password!==$db_password){
      
      echo "<p class='alert alert-danger'>Wrong password</p>";
      
    }elseif($email!==$db_email && $password===$db_password){
      
      echo "<p class='alert alert-danger'>Wrong email</p>";
      
    }

    
    
    if($email==$db_email && $password==$db_password && $db_user_role==='client'){
   
    $_SESSION['email'] = $db_email;
    $_SESSION['username'] = $db_username;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_id'] =  $db_user_id;
    
    header("Location:../client/index.php");
      
  }
    if($email==$db_email && $password==$db_password && $db_user_role==='freelancer'){
    
    $_SESSION['email'] = $db_email;
    $_SESSION['username'] = $db_username;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_id'] =  $db_user_id;
    
    header("Location:../freelancer/index.php");   
  
    }
    }
    
}

function forgetPassword($email){
    global $connection;
   
    
        if(!empty($email)){
        $email=mysqli_real_escape_string($connection,$email);
        
        $token = md5(rand('100','555'));
        
        $query="SELECT * FROM users WHERE email='$email'";
        $select_user=mysqli_query($connection,$query);
        
        confirmQuery($select_user);
         
        $email_count = mysqli_num_rows($select_user);
        
            
        if($email_count==1){
            
            while($row=mysqli_fetch_assoc($select_user)){
                $db_id=$row['id'];
                $db_email=$row['email'];
            }  
            
        date_default_timezone_set('Etc/UTC');


        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        //$mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        //$mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "alhabdutaib@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "Abdurami@1992";

        //Set who the message is to be sent from
        $mail->setFrom('alhabdutaib@gmail.com', 'Localhost');

        //Set an alternative reply-to address
        $mail->addReplyTo('alhabdutaib@gmail.com', 'Localhost');

        //Set who the message is to be sent to
        $mail->addAddress($db_email,  '$username');
       
        
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/jobllery2/user_registration/confirm_password.php?c_id='.$db_id.'&token='.$token;
            
        $output = '<div> Please kindly click this link to reset your password.<br> Thank you. <br>' .$url.'</div>';
    
        $mail->isHTML(true);
            
        //Set the subject line
        $mail->Subject = 'New Password Request';
        
        $mail->Body = $output;
               //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML('<!DOCTYPE html><html><body>Please click on this link for your email confirmation</body></html>');
        
        
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Congratulations';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
             echo "Mailer Error: " . $mail->ErrorInfo;
            
        } else {
           

        }
                }
    }
}


function confirmPassword($new_password,$repeat_password,$user_id){
       global $connection;

        if(!empty($new_password)&&!empty($repeat_password)){
        $new_password=mysqli_real_escape_string($connection,$new_password); 
        $repeat_password=mysqli_real_escape_string($connection,$repeat_password); 
        
        $salt="$2y$10$";
        $hash="iaminlovewithphpoop123";
        $hashSalt=$salt.$hash;
        
        $new_password=crypt($new_password,$hashSalt);  
            
        $query="SELECT * FROM users WHERE id='$user_id'";
        $select_old_password_query=mysqli_query($connection,$query);
        confirmQuery($select_old_password_query);
        
        while($row=mysqli_fetch_assoc($select_old_password_query)){
            $db_password=$row['password'];
        }
        
        if($db_password===$new_password){
            echo "<h6 class='alert alert-warning'>New password is the same as the old password,please <a href='login.php'>Login here</a></h6>";
        }elseif($db_password!==$new_password){
            
        $query= "UPDATE users SET password='$new_password' WHERE id = '$user_id'";
        $reset_password_query = mysqli_query($connection,$query);
            
        confirmQuery($reset_password_query);
        
              echo "<h6 class='alert alert-success'>Password Reset Successfully</h6>";  
          
        
            
        }
        }
}


function updateProfile($firstname,$lastname,$address,$contact_number,$experience,$dob,$job_title,$gender,$qualification, $description, $link, $tags,$profile_image){
    global $connection;
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){
        
        $firstname=mysqli_real_escape_string($connection,$firstname);
        $lastname=mysqli_real_escape_string($connection,$lastname);
        $address=mysqli_real_escape_string($connection,$address);
        $contact_number=mysqli_real_escape_string($connection,$contact_number);
        $experience=mysqli_real_escape_string($connection,$experience);
        $dob=mysqli_real_escape_string($connection,$dob);
        $job_title=mysqli_real_escape_string($connection,$job_title);
        $gender=mysqli_real_escape_string($connection,$gender);
        $qualification=mysqli_real_escape_string($connection,$qualification);
        $description=mysqli_real_escape_string($connection,$description);
        $link=mysqli_real_escape_string($connection,$link);
        $tags=mysqli_real_escape_string($connection,$tags);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        
        
        $query="INSERT INTO profile(first_name,last_name,address,dob,image,contact_number,experience,gender,qualification,description,url,tags) VALUES('$firstname','$lastname','$address','$dob','$profile_image','$contact_number','$experience','$gender','$qualification','$description','$link','$tags')";
        $update_profile=mysqli_query($connection,$query);
        
        confirmQuery($update_profile);
        
       echo $message="<h6 class='alert alert-success'>Profile updated successfully. Click here to view your profile<a href='#? '>   View Profile</a></h6>";
    
}


}



function updateClientProfile($firstname,$lastname,$address,$contact_number,$dob,$job_title,$gender, $description, $link, $tags,$profile_image){
    global $connection;
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){
        
        $firstname=mysqli_real_escape_string($connection,$firstname);
        $lastname=mysqli_real_escape_string($connection,$lastname);
        $address=mysqli_real_escape_string($connection,$address);
        $contact_number=mysqli_real_escape_string($connection,$contact_number);
        $dob=mysqli_real_escape_string($connection,$dob);
        $job_title=mysqli_real_escape_string($connection,$job_title);
        $gender=mysqli_real_escape_string($connection,$gender);
        $description=mysqli_real_escape_string($connection,$description);
        $link=mysqli_real_escape_string($connection,$link);
        $tags=mysqli_real_escape_string($connection,$tags);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        
        
        $query="INSERT INTO client(firstname,lastname,address,dob,contact_number,job_title,gender,image,description,url,tags) VALUES('$firstname','$lastname','$address','$dob','$contact_number','$job_title','$gender','$profile_image','$description','$link','$tags')";
        $update_profile=mysqli_query($connection,$query);
        
        confirmQuery($update_profile);
        
       echo $message="<h6 class='alert alert-success'>Profile updated successfully. Click here to view your profile<a href='#? '>   View Profile</a></h6>";
    
}


}








?>
