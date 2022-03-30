<?php  
include 'connection.php';

session_start();

$adminid=$_SESSION['id'];

if($adminid==null)
{
  header("location:index.php");
}

$rn=$_GET['rn'];
$bi=$_GET['bi'];

$sql="delete from issuebook where rollno=$rn and bookid=$bi";
$res=mysqli_query($conn,$sql);

if ($res) {
    echo "<script>alert('Deleted successfully');window.location.href='issuebook.php?rn=$rn';</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }



?>