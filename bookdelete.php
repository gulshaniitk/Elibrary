<?php 
include 'connection.php';

$bid=$_GET['bookid'];

$sql="delete from books where Bookid=$bid";

if(mysqli_query($conn,$sql)===true)
{
        echo "<script>alert('Deleted successfully');window.location.href='books.php';</script>";
        
   
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>