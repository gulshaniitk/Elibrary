<?php  
include 'connection.php';

$id=$_GET['id'];

$sql="delete from issuebook where id='$id'";
$res=mysqli_query($conn,$sql);

if ($res) {
    echo "<script>alert('Deleted successfully');window.location.href='booksrecord.php';</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }



?>