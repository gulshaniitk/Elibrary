<?php 
include 'connection.php';
include 'mail_function.php';
date_default_timezone_set("Asia/Kolkata");

$success=0;
$error_message="";
$msg="";
$emailmsg="";

session_start();

if(isset($_POST['send']))
 {  
    $sql="select * from students where email='$_POST[email]'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    
    if($count==1)

     {

      $temp=mysqli_fetch_array($result);
      $_SESSION['r']=$temp['rollno'];

      $sql2="select * from registered_students where rollno='$_SESSION[r]'";
      $result2=mysqli_query($conn,$sql2);
      $count2=mysqli_num_rows($result2);

      if($count2==1){
        $email=$_POST['email'];
        $otp=rand(100000,999999);
          $mail_status=sendOTP($_POST['email'],$otp);
        $del=mysqli_query($conn,"DELETE FROM `otp_expiry` WHERE email='$_POST[email]'");
        $res=mysqli_query($conn,"INSERT INTO `otp_expiry`( `otp`, `email`) VALUES ('$otp','$_POST[email]')" );
        $success=1;

      }
      else {
        $emailmsg="*User not registered*";
       $success=0;

      }


       
      
      
    
    }
    else
    {
       $emailmsg="*Email does not exist in database*";
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
        $psd=mysqli_query($conn,"update registered_students set password='$_POST[password]' where rollno='$_SESSION[r]'");

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

<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter OTP</h5>

<div class="form-outline mb-4">
  <input type="number" id="adminname" class="form-control form-control-lg" placeholder="Enter the otp sent to your email" name="otp" />
  <input type="text" id="adminname" class="form-control form-control-lg" value="<?php echo $email; ?>" name="email" hidden />
  <input type="number" class="form-control form-control-lg" value="<?php echo $_SESSION['r']; ?>" name="rollno" hidden />

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

<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter New Password</h5>

<div class="form-outline mb-4">
  <input type="text" id="adminname" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
  <input type="text" id="adminname" class="form-control form-control-lg" name="email" value="<?php echo $email; ?>" hidden />
  <input type="number" class="form-control form-control-lg" value="<?php echo $_SESSION['r']; ?>" name="rollno" hidden />
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

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter your Email</h5>

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