<?php

$emailmsg="";
$passwordmsg="";
$msg="";
$ademailmsg="";
$adpasswordmsg="";

if(!empty($_GET['ademailmsg']))
{
  $ademailmsg=$_GET['ademailmsg'];
}
if(!empty($_GET['adpasswordmsg']))
{
  $adpasswordmsg=$_GET['adpasswordmsg'];
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

                <form action="adminloginserver.php" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Elibrary</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="adminname" class="form-control form-control-lg" placeholder="Enter your email" name="email" />
                    <!-- <label class="form-label" for="form2Example17">Email</label> -->
                    <label style="color: red;">*<?php echo $ademailmsg; ?></label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Enter your password" name="password" />
                    <!-- <label class="form-label" for="form2Example27">Password</label> -->
                    <label style="color: red;">*<?php echo $adpasswordmsg; ?></label>
                  </div>
                  
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
// if(isset($_POST['login']))
// {
//     $query="select * from adminlogin where adminname='$_POST[adminname]' and password='$_POST[password]' ";
//     $result=mysqli_query($conn,$query);
   
//     if(mysqli_num_rows($result)==1)
//     {
//          session_start();
//          $_SESSION['adminname']=$_POST['adminname'];
//          header('location: /elibrary/homepage.php');
//     }
//     else
//     {
//          echo "<script>alert('Incorrect Admin name or Password ');</script>";
//     }

// }

?>
  </body>
</html>