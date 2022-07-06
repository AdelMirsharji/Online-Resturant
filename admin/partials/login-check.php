<?php 

    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "Please Login to access admin pannel!";
        header('location:'.SITEURL.'admin/login.php');
    }
?>