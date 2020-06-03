<?php session_start();?>
<?php 
    $_SESSION['username']= null;
    
    $_SESSION['email']= null;
    $_SESSION['user_role']= null;
   header("Location: login.php");
?>