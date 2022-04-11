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
$q1="SELECT `Quantity` FROM `books` WHERE Bookid='$bi'";

$quant=mysqli_query($conn,$q1);

$curr = mysqli_fetch_array($quant);

$quantity=$curr['Quantity'];
$quantity=$quantity+1;


$q2="UPDATE `books` SET `Quantity`='$quantity' WHERE Bookid='$bi'";

$quant2=mysqli_query($conn,$q2);

if ($res) {
  


    echo "<script>alert('Book returned successfully');window.location.href='booksrecord.php?rn=$rn';</script>";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }



?>