<?php 
    session_start(); 
    session_destroy(); 
    session_unset(); 
    // setcookie("c_sid", "", time(), "/");
    setcookie("PHPSESSID", "", time(), "/"); 
    header("location: ../login.php");
?>