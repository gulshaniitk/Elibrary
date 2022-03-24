<?php 
session_start();

unset($_SESSION['rollno']);
header("location:index.php");

?>