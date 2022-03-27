<?php 
include('connection.php');
session_start();
$rn=$_SESSION['rollno'];
$sql="select * from students where rollno='$rn'";
$table=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($table);

$sql2="select * from registered_students where rollno='$rn'";
$table2=mysqli_query($conn,$sql2);
$res2=mysqli_fetch_array($table2);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User Home</title>

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
    margin-top: 30px;
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

    


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <h3 class="navbar-brand" >Elibrary</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home_user.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="user_courses.php">Courses</a>
        </li>
        
      </ul>
      <ul class="navbar-nav navbar-right ">
        <li class="nav-item">
          <a class="nav-link active" href="user_edit.php">Edit Profile</a>
        </li>
        <li><a href="user_log_out.php" class="btn btn-danger ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
        
      </ul>
    </div>
  </div>
</nav>



<div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div id="ui">
                <h2 class="text-center">Edit Profile</h1>
                <form class="form-group" action=" " method="post">
                  <div class="row">

                <div class="col-lg-6">
                <label>Firstname:</label>
                  <input type="text" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >


                </div>

                <div class="col-lg-6">
                <label>Lastname:</label>
                <input type="text" name="lastname" class="form-control"  value="<?php echo $res['lastname'] ?>" >

                </div>



                </div>

                <br>

                <label>Roll No:</label>
                  <input type="text" name="roll" class="form-control"  value="<?php echo $res['rollno'] ?>" disabled >

                  
                

                

                <br>



                <Label>Email:</Label>
                      <input type="text" name="email" class="form-control"  value="<?php echo $res['email'] ?>" disabled>
                      <br>
                      <Label>Password:</Label>
                      <input type="text" name="password" class="form-control"  value="<?php echo $res2['password'] ?>" required>
                  <br>
                  

               


                
                <div class="row">

                  <div class="col-lg-6">
                    <label>Contactno</label>
                    <input type="text" class="form-control" name="contactno"  value="<?php echo $res['contactno'] ?>" >
                  </div>

                  <div class="col-lg-6">
                    <label>Dob:</label>
                    <input type="date" name="dob" class="form-control"  value="<?php echo $res['dob'] ?>" > 
                  </div>

                </div>

                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Age:</label>
                    <input type="number" name="age" class="form-control"  value="<?php echo $res['age'] ?>">
                  </div>
                  <div class="col-lg-6">
                  <label>Gender:</label>
                    <select class="form-control" name="gender"  value="<?php echo $res['gender'] ?>">
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <br>
                <label>Address:</label>
                <textarea type="text" name="address" class="form-control" rows="4" cols="50"><?php echo $res['address'] ?></textarea>
                <br>
                <button type="submit" class="btn btn-primary" name="update" >Update</button>
                </form>
              </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php 
if(isset($_POST['update']))
{ 
  

    $sql="update students as S,registered_students as R set  R.password='$_POST[password]',S.firstname='$_POST[firstname]',S.lastname='$_POST[lastname]',S.contactno='$_POST[contactno]',S.dob='$_POST[dob]',S.age='$_POST[age]',S.gender='$_POST[gender]',S.address='$_POST[address]' where R.rollno='$rn' and S.rollno='$rn'";


 
   
    
if (mysqli_query($conn,$sql) ===TRUE ) {
  echo "<script>alert('Profile updated successfully');window.location.href='user_edit.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>




  </body>
</html>