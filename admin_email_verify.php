<?php 
include 'connection.php';
include 'mail_function.php';
date_default_timezone_set("Asia/Kolkata");

$success=0;
$error_message="";
$msg="";
$emailmsg="";

if(isset($_POST['send']))
 {  
    $sql="select * from adminlogin where email='$_POST[email]'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    
    if($count==1)
     {  $email=$_POST['email'];
        $otp=rand(100000,999999);
        $mail_status=sendOTP($_POST['email'],$otp);
        // $otp=123456;
        $del=mysqli_query($conn,"DELETE FROM `otp_expiry` WHERE email='$_POST[email]'");
        $res=mysqli_query($conn,"INSERT INTO `otp_expiry`( `otp`, `email`) VALUES ('$otp','$_POST[email]')" );
        $success=1;
    }
    else
    {
       $emailmsg="*Email does not exist in database";
       $success=0;
    }


    

}

if(isset($_POST['submit_otp']))
{  
    $sql="select * from otp_expiry where otp='$_POST[otp]' and email='$_POST[email]' and now()<=date_add(create_at,interval 15 minute)";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $email=$_POST['email'];
    if($num==1)
    {
        $success=2;
    }
    else
    {
        $success=1;
        $error_message="*Invalid OTP!";
    }
    

}

if(isset($_POST['changepass']))
{  $error_message="";
    if($_POST['password']!=$_POST['cpassword'])
    {
          $msg="*Password should be same as entered above!";
          $success=2;
    }
   else
    {   
        $psd=mysqli_query($conn,"update adminlogin set password='$_POST[password]' where email='$_POST[email]'");

        echo "<script>alert('Password changed successfully');window.location.href='index.php';</script>";
       
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Foregt Password</title>
    <style>
      body{
    background-image: url('https://media.istockphoto.com/photos/books-picture-id949118068?k=20&m=949118068&s=612x612&w=0&h=e8tiaCdluEA9IS_I7ytStcx--toLbovf3U74v-LfNAk=');
    background-repeat: no-repeat;
    background-attachment:fixed ;
    background-size: 100% 100%;
    font-family: Cursive;
  /* backdrop-filter: blur(2px); */

}

.login-container{
   
  
    background: rgb(40,40,42);
background: linear-gradient(180deg, rgba(40,40,42,1) 16%, rgba(1,7,21,0.9587185215883228) 60%);
opacity: 0.7;
}
.login-form-1{
   
    padding: 1%;
   
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    margin-top: 8%;
    margin-bottom: 8%;
    background: rgb(40,40,42);
background: linear-gradient(180deg, rgba(40,40,42,1) 16%, rgba(1,7,21,0.9587185215883228) 60%);
opacity: 0.7;
font-family: Cursive;
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:6%;
    color:#fff;
}

.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
    text-align: center;  
}

h1 {
  font-size: 80px;
  /* background-image: linear-gradient(60deg, #E21143, #FFB03A); */
  padding: 1px; 


 
}

.glow {
  font-size: 80px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}

    </style>
  </head>
  <body>
    

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <div class="container-fluid">
  <img src="http://uok.ac.rw/lib/images/templatemo_image_01.jpg" class="img-fluid" alt="Responsive image">
</div> -->
<marquee direction="right" style="color: #d6e38c;font-family:'Simplifica';text-decoration:blink;font-size:65px; " class="text-center font-weight glow"  >Welcome to Elibrary</marquee>
<!-- <h2 class="glow " style="font-family: cursive;" >Welcome to Elibrary</h2> -->
<div class="container ">
           <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-1 login-container">
                <form action="" method="POST">
                <?php  if($success==1)
                        { 
                    ?>

<h3  >Enter OTP</h3>
                    
                    <div class="form-group">
                    <input type="number" id="adminname" class="form-control form-control-lg" placeholder="Enter the otp sent to your email" name="otp" />
  <input type="text" id="adminname" class="form-control form-control-lg" value="<?php echo $email; ?>" name="email" hidden />
  <label style="color: red;" ><?php echo $error_message; ?></label>
                    </div>
                    <div class="form-group">
                        <button class="btnSubmit" type="submit" name="submit_otp">Submit otp</button>
                    </div>
                    <?php } 
                      else if($success==2)
                      { 
                         
                      ?>
             
             <h3  >Enter New Password</h3>
                    
                    <div class="form-group">
                    <input type="password" id="adminname" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
  <input type="text" id="adminname" class="form-control form-control-lg" name="email" value="<?php echo $email; ?>" hidden />
  <br>
  <input type="password" id="adminname" class="form-control form-control-lg" placeholder="Confirm password" name="cpassword" required />
  <label style="color: red;"><?php echo $msg ?></label>
                    </div>
                    <div class="form-group">
                        <button class="btnSubmit" type="submit" name="changepass">Change Password</button>
                    </div>
             
                    <?php } if($success==0) { ?>

  <h3  >Forgot your password?</h3>
                    
                    <div class="form-group">
                    <input type="text" id="adminname" class="form-control form-control-lg" placeholder="Enter your email here " name="email" required/>
                   <label style="color: red;" ><?php echo $emailmsg; ?></label>
                    </div>
                    <div class="form-group">
                      
                        <button class="btnSubmit" type="submit" name="send">Send otp</button>
                    </div>

                  <?php } ?>
                </form>
</div>
<div class="col-md-3"></div>
    

  </div>
</div>
  </body>
</html>