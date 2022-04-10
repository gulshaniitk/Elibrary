
<?php 
include('connection.php');
session_start();

$adminid=$_SESSION['id'];

if($adminid==null)
{
  header("location:index.php");
}
$id=$_SESSION['id'];
$sql="select * from adminlogin where email='$id'";
$table=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($table);
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

  .table{

border-color: grey;

color: white;
background-color: #333;
}
tr:hover{
background-color: #777778;
}

  #log{
    font-family: Algerian;
  color:#e3d206;
  /* margin-right: 1 px; */
  font-size: 30px;

}

.navbar-nav{
  font-weight: 550;
  font-size: 19px;
  font-family: Cambria;
}


</style>

<body>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <h3 class="navbar-brand" id="log" >E-Library</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booksrecord.php">Books record</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="courses.php">Courses</a>
        </li>
        
      </ul>
      <ul class="navbar-nav navbar-right ">
        <li class="nav-item">
          <a class="nav-link active" href="#">Edit Profile</a>
        </li>
        <li><a href="logout.php" class="btn btn-info ">
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
                <Label>Email:</Label>
                      <input type="text" name="email" class="form-control"  value="<?php echo $res['email'] ?>" disabled>
                      <br>
                      <Label>Password:</Label>
                      <input type="text" name="password" class="form-control"  value="<?php echo $res['password'] ?>" required>
                  <br>
                  <label>Firstname:</label>
                  <input type="text" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" >
                <br>
                  <label>Lastname:</label>
                  <input type="text" name="lastname" class="form-control"  value="<?php echo $res['lastname'] ?>" >
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
  

    $sql="update adminlogin set password='$_POST[password]',firstname='$_POST[firstname]',lastname='$_POST[lastname]',contactno='$_POST[contactno]',dob='$_POST[dob]',age='$_POST[age]',gender='$_POST[gender]',address='$_POST[address]' where email='$id'";
    
if (mysqli_query($conn,$sql) === TRUE) {
  echo "<script>alert('Profile updated successfully');window.location.href='editprofile.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>

</body>

</html>