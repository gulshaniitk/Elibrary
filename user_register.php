<?php 
include('connection.php');
// session_start();

$el="";

if(!empty($_GET['email']))
{
  $el=$_GET['email'];
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

    <title>User Registration</title>

    <style>
body{
    background-image: url('https://media.istockphoto.com/photos/books-picture-id949118068?k=20&m=949118068&s=612x612&w=0&h=e8tiaCdluEA9IS_I7ytStcx--toLbovf3U74v-LfNAk=');
    background-repeat: no-repeat;
    background-attachment:fixed ;
    background-size: 100% 100%;
    
  backdrop-filter: blur(2px);

}
#ui{
    background-color: #333;
    padding: 30px;
    margin-top: 10px;
    margin-bottom: 30px;
    border-radius: 10px;
    opacity: 0.8;
  }

  #ui label,h2{
    color: #fff;
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

    <br>


   <div class="container"> 
     <div class="row">
   <div class="col-lg-3"></div>

   <div class="col-lg-6">
    <a href="index.php" class="btn btn-primary">Home</a>
</div>

<div class="col-lg-3"></div>
</div>

   </div>


<div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div id="ui">
                <h2 class="text-center">User Registration Form</h1>
                <form class="form-group" action=" " method="post">
                  <div class="row">

                <div class="col-lg-6">
                <label>Firstname:</label>
                  <input type="text" name="firstname" class="form-control" required >


                </div>

                <div class="col-lg-6">
                <label>Lastname:</label>
                <input type="text" name="lastname" class="form-control"  required >

                </div>



                </div>

                <br>

                <label>Roll No:</label>
                  <input type="text" name="roll" class="form-control"  required >

                  
                

                

                <br>



                <Label>Email:</Label>
                      <input type="text" name="email" class="form-control" value=" <?php echo $el ;?>"  >
                      <br>
                      <Label>Password:</Label>
                      <input type="password" name="password" class="form-control"   required>
                  <br>

                  <Label>Confirm Password:</Label>
                      <input type="password" name="cpassword" class="form-control"   required>
                  <br>


                  

               


                
               
                <br>
                <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"  name="submit" >Submit</button>

                </div>
                </form>
              </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php 
if(isset($_POST['submit']))
{ 
  

  //  $sql="update students as S,registered_students as R set  R.password='$_POST[password]',S.firstname='$_POST[firstname]',S.lastname='$_POST[lastname]',S.contactno='$_POST[contactno]',S.dob='$_POST[dob]',S.age='$_POST[age]',S.gender='$_POST[gender]',S.address='$_POST[address]' where R.rollno='$rn' and S.rollno='$rn'";


  $fn=$_POST['firstname'];
  $ln=$_POST['lastname'];
  $rn=$_POST['roll'];
  $email=$_POST['email'];
  $pswd=$_POST['password'];
  $cpswd=$_POST['cpassword'];

  $q1="SELECT * FROM `registered_students` WHERE rollno='$rn'";
  $table=mysqli_query($conn,$q1);

  if(mysqli_num_rows($table)==1){
    echo "<script>alert('User Already Registered');window.location.href='index.php';</script>";

  }

  else {

    $q2="SELECT `rollno`, `firstname`, `email`, `lastname` FROM `students` WHERE rollno='$rn' and firstname='$fn' and email='$email' and lastname='$ln' ";
    $table2=mysqli_query($conn,$q2);
    
    if(mysqli_num_rows($table2)==0){
      echo "<script>alert('Student Record Not Found, Can not Register!!');window.location.href='index.php';</script>";


    }

    else {
      if($pswd!=$cpswd){
        echo "<script>alert('Passwords do not match!!');window.location.href='user_register.php?email=$email' </script>";


      }

      else {
        $q3="INSERT INTO `registered_students`(`rollno`, `password`) VALUES ('$rn','$pswd')";
        
        if(mysqli_query($conn,$q3)== TRUE){
          echo "<script>alert('User Registered Successfully');window.location.href='index.php';</script>";

        }
        else {
          echo "Error: " . $q3 . "<br>" . mysqli_error($conn);

        }

      }



    }
 




  }








 
   
    


}

?>




  </body>
</html>