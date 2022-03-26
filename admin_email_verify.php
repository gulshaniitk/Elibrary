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

    <title>Hello, world!</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://st.depositphotos.com/1002881/1285/i/950/depositphotos_12859789-stock-photo-admin-tag.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Elibrary</span>
                  
                    <?php  if($success==1)
                        { 
                    ?>
                       </div>

<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre OTP</h5>

<div class="form-outline mb-4">
  <input type="number" id="adminname" class="form-control form-control-lg" placeholder="Enter the otp sent to your email" name="otp" />
  <input type="text" id="adminname" class="form-control form-control-lg" value="<?php echo $email; ?>" name="email" hidden />
  <label style="color: red;" ><?php echo $error_message; ?></label>
</div>
<div class="pt-1 mb-4">
  <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit_otp">Submit otp</button>
</div>

                      <?php } 
                      else if($success==2)
                      { 
                         
                      ?>
                       </div>

<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre New Password</h5>

<div class="form-outline mb-4">
  <input type="text" id="adminname" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
  <input type="text" id="adminname" class="form-control form-control-lg" name="email" value="<?php echo $email; ?>" hidden />
  <br>
  <input type="text" id="adminname" class="form-control form-control-lg" placeholder="Confirm password" name="cpassword" required />
  <label style="color: red;"><?php echo $msg ?></label>
  <!-- <label class="form-label" for="form2Example17">Email</label> -->
</div>
<div class="pt-1 mb-4">
  <button class="btn btn-dark btn-lg btn-block" type="submit" name="changepass">Change Password</button>
</div>
                    <?php } if($success==0) { ?>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre your Email</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="adminname" class="form-control form-control-lg"  name="email" required/>
                   <label style="color: red;" ><?php echo $emailmsg; ?></label>
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="send">Send otp</button>
                  </div>
                  <?php } ?>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>