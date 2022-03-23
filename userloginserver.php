<?php 

include 'connection.php';

$roll_no=$_POST["rollno"];
$password=$_POST["password"];

if($roll_no==NULL || $password==NULL)
{  
    $roll_nomsg="";
    $passwordmsg="";
    if($roll_no==NULL)
     $roll_nomsg="Roll No empty";
    
     if($password==NULL)
     $passwordmsg="Password empty";
  
    header("location:index.php?adroll_nomsg=$roll_nomsg&apasswordmsg=$passwordmsg");
}
else
{
  $sql="select * from registered_students where rollno='$_POST[rollno]' and password='$_POST[password]' ";
  $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==1)
    {  
        session_start();
        $res=mysqli_fetch_array($result);
        $_SESSION['rollno']=$res['rollno'];

        header("location:home_user.php");
    }
    else
    {
         echo "<script>alert('Incorrect Email or Password ');window.location.href='index.php';</script>";
    }

  

}

?>