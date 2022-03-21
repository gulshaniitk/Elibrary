<?php 
include('connection.php');

$rn=$_GET['rn'];
$sql="delete from students where rollno=$rn";
$res=mysqli_query($conn,$sql);

if ($res) {
    echo "<script>alert('Deleted successfully');window.location.href='students.php';</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


?>