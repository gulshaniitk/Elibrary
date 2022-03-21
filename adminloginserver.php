<?php 

include 'connection.php';

$email=$_POST['email'];
$password=$_POST['password'];

if($email==NULL || $password==NULL)
{  
    $emailmsg="";
    $passwordmsg="";
    if($email==NULL)
     $emailmsg="Email empty";
    
     if($password==NULL)
     $passwordmsg="Password empty";
  
    header("location:adminlogin.php?ademailmsg=$emailmsg&adpasswordmsg=$passwordmsg");
}
else
{
  $sql="select * from adminlogin where email='$_POST[email]' and password='$_POST[password]' ";
  $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==1)
    {  
        session_start();
        $res=mysqli_fetch_array($result);
        $_SESSION['id']=$res['id'];

        header("location:homepage.php?id=$res[id]");
    }
    else
    {
         echo "<script>alert('Incorrect Email or Password ');window.location.href='adminlogin.php';</script>";
    }

  

}

?>