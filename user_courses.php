<?php
include('connection.php');
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
  </head>

  
  <body>

  <style>
body{
    background-image: url('https://media.istockphoto.com/photos/books-picture-id949118068?k=20&m=949118068&s=612x612&w=0&h=e8tiaCdluEA9IS_I7ytStcx--toLbovf3U74v-LfNAk=');
    background-repeat: no-repeat;
    background-attachment:fixed ;
    background-size: 100% 100%;
    
  backdrop-filter: blur(2px);

}

.table{
    border: 2px;
    border-color: red;
    padding: 12px;
    color: white;
    background-color: #696969;
    
}



</style>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <nav class="navbar navbar-expand-sm bg-dark navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <h4 style="color:white;">E-Library</h4>
      <li class="nav-item">
        <a class="nav-link"  style="color:white;" href="home_user.php">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" style="color:white;" href="user_books.php">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" style="color:white;" href="user_courses.php">Courses</a>
      </li>

 

      
      

      
    </ul>

    <ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" style="color:white;" href="user_edit.php">Edit Profile</a>
      </li>

    <li class="nav-item">
        <a class="nav-link"  style="color:white;" href="contact_us.php">Contact Us</a>
      </li>

   <!--   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#">Log Out</a>
      </li> 
-->
  
      <a class="btn btn-secondary" href="user_log_out.php" role = "button"> Log Out </a>



</ul>


  </div>
</nav>

<div class="container" style="margin-top:25px;" >
<table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">Course Number</th>
      <th scope="col">Name</th>
      <th scope="col">Instructors</th>
      <th scope="col">Year</th>
      <th scope="col">Language</th>
      <th scope="col">Skills</th>
      <th scope="col">Link</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
$query="select * from courses";
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

    ?>
    <tr>
      <td><?php echo $res['courseid']; ?></td>
      <td><?php echo $res['name']; ?></td>
      <td><?php echo $res['instructors']; ?></td>
      <td><?php echo $res['year']; ?></td>
      <td><?php echo $res['language']; ?></td>
      <td><?php echo $res['skills']; ?></td>
      <td><?php echo $res['link']; ?></td>
    
    </tr>
    <?php   } ?>
  </tbody>
</table>
</div>





  </body>
</html>