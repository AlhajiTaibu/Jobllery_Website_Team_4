<?php
//Starting session
session_start();?>

<?php
    //Destroying all session variables
    $_SESSION['username']= null;  
    $_SESSION['email']= null;
    $_SESSION['user_role']= null;
    
   header("Location:../Homepage/index.php");   //Redirecting user to the main page
?>