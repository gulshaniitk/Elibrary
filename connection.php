<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elibrary";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

function cal_fine($return_date)
{
   $today=date('Y-m-d');
   
   
   $diff = strtotime($today) - strtotime($return_date);

   if($diff<=0) return 0;

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
   return abs($days);

}
  
?>