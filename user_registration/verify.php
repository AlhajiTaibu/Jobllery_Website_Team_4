<?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
   
<?php
    //if the user id and token is set execute the code block bellow
    if(isset($_GET['v_id'])){
        $user_id=$_GET['v_id'];             //assign the got id to a variable
        if(isset($_GET['token'])){
            
            //preparing query to update data on the database
            $query="UPDATE users SET email_confirmation_status='active' WHERE id=$user_id ";
            
            $verify_user=mysqli_query($connection,$query);      //assign a variable with mysqli query
            
            confirmQuery($verify_user);                         //Validation of query
            
            if( $verify_user==true){                            //if verified?

                header('Location:login.php');                   //Redirect the user to the login page                    
            }
            
        }
    }

?>