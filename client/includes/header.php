
<?php  ob_start(); ?>
<?php session_start();?>
<?php include "../freelancer/includes/db.php";?>


<?php

    if($_SESSION['user_role']==='client'){
  
       
    }else{
     
    header('Location:../user_registration/login.php');
    }


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Jobllery</title>
    <link rel="icon" type="image/png" href="assets/img/dogs/PNG jobllery logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/login_signup_style.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link rel="stylesheet" href="assets/css/client.css">
    <link rel="stylesheet" href="../freelancer/assets/css/freelancer.css">
</head>

<body id="page-top">