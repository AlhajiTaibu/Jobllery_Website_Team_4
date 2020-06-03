<?php include "../freelancer/includes/db.php"; ?>
   <?php include "../freelancer/includes/functions.php"; ?>
   
<?php
    if(isset($_GET['v_id'])){
        $user_id=$_GET['v_id'];
        if(isset($_GET['token'])){
            
            $query="UPDATE users SET email_confirmation_status='active' WHERE id=$user_id ";
            $verify_user=mysqli_query($connection,$query);
            
            confirmQuery($verify_user);
            
            if( $verify_user==true){

                header('Location:login.php');
            }
            
        }
    }

?>