<?php 
include 'connection.php';
$cid=$_GET['cid'];
$sql="delete from courses where courseid=$cid";
if(mysqli_query($conn,$sql)===true)
{
    echo "<script>alert('Deleted successfully');window.location.href='courses.php';</script>";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>