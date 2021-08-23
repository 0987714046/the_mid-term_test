<?php
    include("db.php");
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header('location:'.SITEURL.'/login.php');
?>