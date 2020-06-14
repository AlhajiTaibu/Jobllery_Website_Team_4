<?php
/***
This file contains php methods for execution of specific actions
***
*/


// Method for checking the correctness of mysqli_query
function confirmQuery($result){
    
    global $connection;     // declaring the $connection variable global
    
    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
    
}


// Method for checking for existence of an email in the database 
function email_exists($email){
    
    global $connection;        // declaring the $connection variable global
    
    $query="SELECT email FROM users WHERE email='$email'";  // preparing mysqli query to select data from database
    $result=mysqli_query($connection,$query);               // setting a variable to mysqli query 
    
    $count= mysqli_num_rows($result);               // counting the number of rows of mysqli result
    
    if($count>0){                               // checking whether the no of rows is greater than 0 if yes return else false
        return true;
    }else{
        return false;
    }
}


// Method for registering users based on their choosen role into the system
function register_user($username,$email,$password,$user_role){
    
    global $connection;         // declaring the $connection variable global
    
    if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($user_role)){   //checking parameters for empty string
        
        $username=mysqli_real_escape_string($connection,$username);      // cleaning of parameters to prevent mysql injection
        $email=mysqli_real_escape_string($connection,$email);
        $password=mysqli_real_escape_string($connection,$password);
        $salt="$2y$10$";
        $hash="iaminlovewithphpoop123";
        $hashSalt=$salt.$hash;
        
        $password=crypt($password,$hashSalt);                       // encryption of user password
        
        $token=md5(rand('10000','99999'));                          // generation of random number
       
        $email_confirmation_status ='inactive';                     // initialization of a variable
        
        //preparing mysqli query for inserting into the database
        $query="INSERT INTO users(username,email,password,user_role,email_confirmation_status,token) VALUES('$username','$email','$password','$user_role','$email_confirmation_status','$token')";
        
        $register_user=mysqli_query($connection,$query);            // setting a variable to mysqli query 
        
        confirmQuery($register_user);                               // validation of mysqli query
       
        if($register_user==true){                                  // checking query result
        date_default_timezone_set('Etc/UTC');                      // seting the default timezone


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
        $mail->Username = "jobllery@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "@malyt3k";

        //Set who the message is to be sent from
        $mail->setFrom('jobllery@gmail.com', 'Jobllery');

        //Set an alternative reply-to address
        $mail->addReplyTo('jobllery@gmail.com', 'Jobllery');

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


//Method for signing in users into the system
function login_user($email,$password){
    
    global $connection;         // declaring the $connection variable global
    
    $email=trim($email);            // Removing whitespace from parameters
    $password=trim($password);
    
    $email=mysqli_real_escape_string($connection,$email);          // cleaning of parameters to prevent mysql injection
    $password=mysqli_real_escape_string($connection,$password);
    
    //preparing mysqli query for retreiving data from database
    $query="SELECT * FROM users WHERE email='$email' AND email_confirmation_status='active'";
    
    $select_query=mysqli_query($connection,$query);                 // setting a variable to mysqli query     
    
    confirmQuery($select_query);                                    // validation of mysqli query
    
    while($row=mysqli_fetch_assoc($select_query)){                  // Looping through results from the database 
        
        $db_username=$row['username'];                              // Initialization of varaiable
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_user_role=$row['user_role'];
        $db_user_id=$row['id'];
    
    
    $password = crypt($password,$db_password);                      // Password decryption
    
  if($email!==$db_email && $password!==$db_password){               // Checking for wrong email and password
    
      echo "<p class='alert alert-danger'>Wrong password and email</p>"; // Alert the user if condition is true 
    
    }elseif($email==$db_email && $password!==$db_password){         // Checking for correct email and wrong password
      
      echo "<p class='alert alert-danger'>Wrong password</p>";      // Alert the user if condition is true 
      
    }elseif($email!==$db_email && $password===$db_password){        // Checking for wrong email and correct password
      
      echo "<p class='alert alert-danger'>Wrong email</p>";         // Alert the user if condition is true
      
    }

    
    // Checking for correct email, password and client user
    if($email==$db_email && $password==$db_password && $db_user_role==='client'){ 
   
    $_SESSION['email'] = $db_email;                       // Creation of session variables
    $_SESSION['username'] = $db_username;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_id'] =  $db_user_id;
    
    header("Location:../client/index.php");              // Redirecting the user to the client dashboard if condition is true
      
    }
        
     // Checking for correct email, password and freelancer user   
    if($email==$db_email && $password==$db_password && $db_user_role==='freelancer'){
    
    $_SESSION['email'] = $db_email;                     // Creation of session variables
    $_SESSION['username'] = $db_username;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_id'] =  $db_user_id;
    
    header("Location:../freelancer/index.php");      // Redirecting the user to the freelancer dashboard if condition is true
  
    }
    }
    
}


//Method for forget password functionality
function forgetPassword($email){
    
    global $connection;         // declaring the $connection variable global
   
    
        if(!empty($email)){       //checking parameters for empty string
        
        $email=mysqli_real_escape_string($connection,$email);       // cleaning of parameter to prevent mysql injection
        
        $token = md5(rand('100','555'));                            // generation of random number
        
        //preparing mysqli query for retreiving data from database
        $query="SELECT * FROM users WHERE email='$email'";
        
        $select_user=mysqli_query($connection,$query);               // setting a variable to mysqli query     
        
        confirmQuery($select_user);                                  // validation of mysqli query
         
        $email_count = mysqli_num_rows($select_user);                // counting the number of rows of mysqli result
        
            
        if($email_count==1){                                         // checking whether the no of rows is equal to 1
            
            while($row=mysqli_fetch_assoc($select_user)){            // Looping through results from the database 
                
                $db_id=$row['id'];                                   // Initialization of varaiable
                $db_email=$row['email'];
            }  
            
        date_default_timezone_set('Etc/UTC');                        // seting the default timezone


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
        $mail->Username = "jobllery@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "@malyt3k";

        //Set who the message is to be sent from
        $mail->setFrom('jobllery@gmail.com', 'Localhost');

        //Set an alternative reply-to address
        $mail->addReplyTo('jobllery@gmail.com', 'Localhost');

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


// Method for the confirm password functionality
function confirmPassword($new_password,$repeat_password,$user_id){
       
        global $connection;         // declaring the $connection variable global

        if(!empty($new_password)&&!empty($repeat_password)){            //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
        $new_password=mysqli_real_escape_string($connection,$new_password);
        $repeat_password=mysqli_real_escape_string($connection,$repeat_password); 
        
        $salt="$2y$10$";
        $hash="iaminlovewithphpoop123";
        $hashSalt=$salt.$hash;
        
        $new_password=crypt($new_password,$hashSalt);                   // encryption of user password
        
        //preparing mysqli query for retreiving data from database   
        $query="SELECT * FROM users WHERE id='$user_id'";
        
        $select_old_password_query=mysqli_query($connection,$query);    // setting a variable to mysqli query
        
        confirmQuery($select_old_password_query);                       // validation of mysqli query
        
        while($row=mysqli_fetch_assoc($select_old_password_query)){     // Looping through results from the database 
            $db_password=$row['password'];
        }
        
        if($db_password===$new_password){         // Checking for whether the entered password already exist in the database
            
            echo "<h6 class='alert alert-warning'>New password is the same as the old password,please <a href='login.php'>Login here</a></h6>";                     // Alert user
        
        // If entered password is different from what exist in the database execute a block of code
        }elseif($db_password!==$new_password){
         
        //preparing mysqli query to insert data into database       
        $query= "UPDATE users SET password='$new_password' WHERE id = '$user_id'";
        
        $reset_password_query = mysqli_query($connection,$query);       // setting a variable to mysqli query
            
        confirmQuery($reset_password_query);                            // validation of mysqli query
        
            echo "<h6 class='alert alert-success'>Password Reset Successfully</h6>";  // Alert user
          
        
            
        }
        }
}



// Method for editing freelancer's profile
function createProfile($user_id,$firstname,$lastname,$address,$contact_number,$experience,$dob,$gender,$qualification, $description, $link, $tags,$profile_image){
   
    global $connection;             // declaring the $connection variable global
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
        $firstname=mysqli_real_escape_string($connection,$firstname);
        $lastname=mysqli_real_escape_string($connection,$lastname);
        $address=mysqli_real_escape_string($connection,$address);
        $contact_number=mysqli_real_escape_string($connection,$contact_number);
        $experience=mysqli_real_escape_string($connection,$experience);
        $dob=mysqli_real_escape_string($connection,$dob);
        
        $gender=mysqli_real_escape_string($connection,$gender);
        $qualification=mysqli_real_escape_string($connection,$qualification);
        $description=mysqli_real_escape_string($connection,$description);
        $link=mysqli_real_escape_string($connection,$link);
        $tags=mysqli_real_escape_string($connection,$tags);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        
        //preparing mysqli query for inserting into the database
        $query="INSERT INTO profile(user_id,first_name,last_name,address,dob,image,contact_number,experience,gender,qualification,description,url,tags) VALUES('$user_id','$firstname','$lastname','$address','$dob','$profile_image','$contact_number','$experience','$gender','$qualification','$description','$link','$tags')";
       
        $create_profile=mysqli_query($connection,$query);                   // setting a variable to mysqli query
        
        confirmQuery($create_profile);                                      // validation of mysqli query
        
       echo "<h6 class='alert alert-success'>Profile created successfully. Click here to view your profile<a href='../profile_page/freelancer_profile_page.php?p_id=$user_id'>   View Profile</a></h6>";                                 // Alert user
    
}


}



// Method for editing freelancer's profile
function updateProfile($user_id,$firstname,$lastname,$address,$contact_number,$experience,$dob,$gender,$qualification, $description, $link, $tags,$profile_image){
   
    global $connection;             // declaring the $connection variable global
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
        $firstname=mysqli_real_escape_string($connection,$firstname);
        $lastname=mysqli_real_escape_string($connection,$lastname);
        $address=mysqli_real_escape_string($connection,$address);
        $contact_number=mysqli_real_escape_string($connection,$contact_number);
        $experience=mysqli_real_escape_string($connection,$experience);
        $dob=mysqli_real_escape_string($connection,$dob);
        
        $gender=mysqli_real_escape_string($connection,$gender);
        $qualification=mysqli_real_escape_string($connection,$qualification);
        $description=mysqli_real_escape_string($connection,$description);
        $link=mysqli_real_escape_string($connection,$link);
        $tags=mysqli_real_escape_string($connection,$tags);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        
        //preparing mysqli query for inserting into the database
         $query="UPDATE profile SET first_name='$firstname',last_name='$lastname',address='$address',dob='$dob',contact_number='$contact_number',experience='$experience',gender='$gender',qualification='$qualification',image='$profile_image',description='$description',url='$link',tags='$tags',updatedAt=now() WHERE user_id={$user_id}";
       
        $update_profile=mysqli_query($connection,$query);                   // setting a variable to mysqli query
        
        confirmQuery($update_profile);                                      // validation of mysqli query
        
       echo "<h6 class='alert alert-success'>Profile updated successfully. Click here to view your profile<a href='../profile_page/freelancer_profile_page.php?p_id=$user_id'>   View Profile</a></h6>";                                 // Alert user
    
}


}


// Method for editing client's profile
function createClientProfile($user_id,$firstname,$lastname,$address,$contact_number,$dob,$job_title,$gender, $description, $link, $tags,$profile_image){
    
    global $connection;             // declaring the $connection variable global
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
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
        
        //preparing mysqli query for inserting into the database
        $query="INSERT INTO client(user_id,firstname,lastname,address,dob,contact_number,job_title,gender,image,description,url,tags) VALUES('$user_id','$firstname','$lastname','$address','$dob','$contact_number','$job_title','$gender','$profile_image','$description','$link','$tags')";
        
        $create_profile=mysqli_query($connection,$query);                       // setting a variable to mysqli query
        
        confirmQuery($create_profile);                                          // validation of mysqli query
        
        echo $message="<h6 class='alert alert-success'>Profile created successfully. Click here to view your profile<a href='../profile_page/client_profile_page.php?p_id=$user_id'>   View Profile</a></h6>";                                    // Alert user
    
}


}



// Method for editing client's profile
function updateClientProfile($user_id,$firstname,$lastname,$address,$contact_number,$dob,$job_title,$gender, $description, $link, $tags,$profile_image){
    
    global $connection;             // declaring the $connection variable global
    
    if(!empty($firstname)&&!empty($lastname)&&!empty($address)&&!empty($gender)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
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
        
        //preparing mysqli query for inserting into the database
        $query="UPDATE client SET firstname='$firstname',lastname='$lastname',address='$address',dob='$dob',contact_number='$contact_number',job_title='$job_title',gender='$gender',image='$profile_image',description='$description',url='$link',tags='$tags',updatedAt=now() WHERE user_id={$user_id}";
        
        $update_profile=mysqli_query($connection,$query);                       // setting a variable to mysqli query
        
        confirmQuery($update_profile);                                          // validation of mysqli query
        
        echo $message="<h6 class='alert alert-success'>Profile updated successfully. Click here to view your profile<a href='../profile_page/client_profile_page.php?p_id=$user_id'>   View Profile</a></h6>";                                    // Alert user
    
}


}




// Method for editing freelancer's profile
function postJob($client_id,$category,$title,$contract,$description,$deadline,$required_skill,$min_salary, $max_salary,$salary_type,$tags,$offered_salary,$duration,$experience,$profile_image,$location){
   
    global $connection;             // declaring the $connection variable global
    
    if(!empty($title)&&!empty($description)&&!empty($category)&&!empty($tags)&&!empty($client_id)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
        $category=mysqli_real_escape_string($connection,$category);
        $title=mysqli_real_escape_string($connection,$title);
        $contract=mysqli_real_escape_string($connection,$contract);
        $description=mysqli_real_escape_string($connection,$description);
        $deadline=mysqli_real_escape_string($connection,$deadline);
        $required_skill=mysqli_real_escape_string($connection,$required_skill);
        $min_salary=mysqli_real_escape_string($connection,$min_salary);
        $max_salary=mysqli_real_escape_string($connection,$max_salary);
        $salary_type=mysqli_real_escape_string($connection,$salary_type);
        $tags=mysqli_real_escape_string($connection,$tags);
        $offered_salary=mysqli_real_escape_string($connection,$offered_salary);
        $duration=mysqli_real_escape_string($connection,$duration);
        $experience=mysqli_real_escape_string($connection,$experience);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        $location=mysqli_real_escape_string($connection,$location);
        
        
        $query="SELECT * FROM client WHERE user_id={$client_id}";
        $select_profile=mysqli_query($connection,$query);
        confirmQuery($select_profile);
        $count=mysqli_num_rows($select_profile);
        
        if($count>0){
            
            //preparing mysqli query for inserting into the database
        $query="INSERT INTO job_post(client_id,category_id,job_title,contract_type,job_description,application_deadline_date,required_skills,min_salary,max_salary,salary_type,tags,offered_salary,job_duration,experience,image,location,status,createdAt) VALUES('$client_id','$category',' $title','$contract','$description','$deadline','$required_skill','$min_salary','$max_salary','$salary_type','$tags','$offered_salary','$duration','$experience','$profile_image','$location','open',now())";
       
        $post_job=mysqli_query($connection,$query);                   // setting a variable to mysqli query
        
        confirmQuery($post_job);                                      // validation of mysqli query
        
        $last_id = mysqli_insert_id($connection);
        
        
        
       echo $message="<h6 class='alert alert-success'>Job submitted successfully. Click here to view your job post<a href='../job_details/job_details.php?p_id=$last_id '>   View Jobs</a></h6>";                                 // Alert user
        
        }else{
          echo $message="<h6 class='alert alert-warning'>Please, kindly update your profile. <a href='profile.php'>   Update Profile</a></h6>";  
        }
        
        
    
}


}




// Method for editing freelancer's profile
function updateJob($job_post_id,$client_id,$category,$title,$contract,$description,$deadline,$required_skill,$min_salary, $max_salary,$salary_type,$tags,$offered_salary,$duration,$experience,$profile_image,$location){
   
    global $connection;             // declaring the $connection variable global
    
    if(!empty($title)&&!empty($description)&&!empty($category)&&!empty($tags)&&!empty($client_id)){   //checking parameters for empty string
        
        // cleaning of parameter to prevent mysql injections
        $category=mysqli_real_escape_string($connection,$category);
        $title=mysqli_real_escape_string($connection,$title);
        $contract=mysqli_real_escape_string($connection,$contract);
        $description=mysqli_real_escape_string($connection,$description);
        $deadline=mysqli_real_escape_string($connection,$deadline);
        $required_skill=mysqli_real_escape_string($connection,$required_skill);
        $min_salary=mysqli_real_escape_string($connection,$min_salary);
        $max_salary=mysqli_real_escape_string($connection,$max_salary);
        $salary_type=mysqli_real_escape_string($connection,$salary_type);
        $tags=mysqli_real_escape_string($connection,$tags);
        $offered_salary=mysqli_real_escape_string($connection,$offered_salary);
        $duration=mysqli_real_escape_string($connection,$duration);
        $experience=mysqli_real_escape_string($connection,$experience);
        $profile_image=mysqli_real_escape_string($connection,$profile_image);
        $location=mysqli_real_escape_string($connection,$location);
        
        //preparing mysqli query for inserting into the database
        $query="UPDATE job_post SET client_id='$client_id', category_id='$category', job_title='$title', contract_type='$contract', job_description='$description', application_deadline_date='$deadline', required_skills='$required_skill', min_salary='$min_salary', max_salary='$max_salary',salary_type='$salary_type', tags='$tags', offered_salary='$offered_salary', job_duration='$duration', experience='$experience', image='$profile_image', location='$location', updatedAt= now() WHERE job_post_id='{$job_post_id}'";
       
        $post_job=mysqli_query($connection,$query);                   // setting a variable to mysqli query
        
        confirmQuery($post_job);                                      // validation of mysqli query
        
       echo $message="<h6 class='alert alert-success'>Job updated successfully. Click here to view your job post<a href='../workspace/workspace.php'>   View Jobs</a></h6>";                                 // Alert user
    
}


}



function jobApplied($job_post_id,$client_id,$freelancer_id){
    
    global $connection;
    
    if(!empty($job_post_id)&&!empty($freelancer_id)){
        
        
        $query="SELECT * FROM profile WHERE user_id={$freelancer_id}";
        $select_freelancer=mysqli_query($connection,$query);
        confirmQuery($select_freelancer);
        $count=mysqli_num_rows($select_freelancer);
        
        if($count>0){
          
                    
        $query="SELECT * FROM job_post WHERE job_post_id={$job_post_id}";
        $check_status=mysqli_query($connection,$query);
        confirmQuery($check_status);
        while($row=mysqli_fetch_assoc($check_status)){
            $status = $row['status'];
        }
        
        
        if($status==='open'){
        $query="SELECT * FROM jobs_applied WHERE job_post_id={$job_post_id} AND freelancer_id={$freelancer_id} ";
        $select_job=mysqli_query($connection,$query);
        $count=mysqli_num_rows($select_job);
        
        if($count==0){
            
        $query= "INSERT INTO jobs_applied(job_post_id,client_id,freelancer_id,apply_date) VALUES('$job_post_id','$client_id','$freelancer_id',now())";
        
        $apply_job=mysqli_query($connection,$query);
        confirmQuery($apply_job); 
            
            echo "<h6 class='alert alert-success'>Job application accepted</h6>";
          
        }else{
            
            echo "<h6 class='alert alert-danger'>Job application denied</h6>";
        } 
            
        }else{
            
            echo "<h6 class='alert alert-info'>Job application is closed</h6>"; 
        }
            
        }else{
            
            echo "<h6 class='alert alert-warning'>Please, update your profile <a href='profile.php'>   Update Profile</a></h6>"; 
        }
        

        
    }
}




?>
