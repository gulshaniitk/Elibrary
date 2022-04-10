<?php 
include('connection.php');

session_start();

$adminid=$_SESSION['id'];

if($adminid==null)
{
  header("location:index.php");
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
   <style>
     body{
    background-image: url('https://media.istockphoto.com/photos/books-picture-id949118068?k=20&m=949118068&s=612x612&w=0&h=e8tiaCdluEA9IS_I7ytStcx--toLbovf3U74v-LfNAk=');
    background-repeat: no-repeat;
    background-attachment:fixed ;
    background-position: center center;
    background-size: 100% 100%;
    color: white;
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
    
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
          <a class="nav-link" href="editprofile.php">Edit Profile</a>
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
                <h2 class="text-center">Course Registraion Form</h1>
                <form class="form-group" action=" " method="post">
                <Label>Course Name:</Label>
                      <input type="text" name="name" class="form-control" placeholder="Enter the title here " required>
                      <br>
                <Label>Instructors:</Label>
                      <input type="text" name="instructors" class="form-control" placeholder="Enter the author name here " required>
                  <br>
                  <label>Link:</label>
                  <input type="text" name="link" class="form-control" placeholder="Enter the link" >
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Year:</label>
                    <input type="number" name="year" class="form-control" required>
                  </div>
                  <div class="col-lg-6">
                    <label>Language:</label>
                    <input type="text" name="language" class="form-control" >

                  </div>
                </div>
                <br>
                <label>Skills:</label>
                <textarea type="text" name="skills" class="form-control" placeholder="Enter the category of the here" rows="4" cols="50"></textarea>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                </form>
              </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php 
if(isset($_POST['submit']))
{  

  $q1="SELECT * FROM `courses` WHERE name='$_POST[name]'";
  $table=mysqli_query($conn,$q1);

  if(mysqli_num_rows($table)>0){
    echo "<script>alert('Course already exist');window.location.href='addcourse.php';</script>";

  }
 else
{
    $sql="insert into courses(name,instructors,skills,year,link,language) values ('$_POST[name]','$_POST[instructors]','$_POST[skills]','$_POST[year]','$_POST[link]','$_POST[language]')";
   
if (mysqli_query($conn,$sql) === TRUE) {
  echo "<script>alert('New course added successfully');window.location.href='courses.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
}

?>

  </body>
</html>