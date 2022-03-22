<?php 
session_start();

unset($_SESSION['rollno']);
header("location:userlogin.php");

?>