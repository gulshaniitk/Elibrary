<?php 
include('connection.php');
session_start();
$rn=$_SESSION['rollno'];




if($rn==null){
  header("location:index.php");
  
}


// $sql="select * from students where rollno='$rn'";
// $table=mysqli_query($conn,$sql);
// $res=mysqli_fetch_array($table);

// $sql2="select * from registered_students where rollno='$rn'";
// $table2=mysqli_query($conn,$sql2);
// $res2=mysqli_fetch_array($table2);

$bookid=$_GET['id1'];
// $sql3="select * from books where Bookid='$bookid'";
// $table3=mysqli_query($conn,$sql3);
// $res3=mysqli_fetch_array($table3);

$sql="DELETE FROM `issuebook` WHERE rollno='$rn' and bookid='$bookid'";
$table=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){

    $q1="SELECT `Quantity` FROM `books` WHERE Bookid='$bookid'";

$quant=mysqli_query($conn,$q1);

$curr = mysqli_fetch_assoc($quant);

$quantity=$curr['Quantity'];
$quantity=$quantity+1;


$q2="UPDATE `books` SET `Quantity`='$quantity' WHERE Bookid='$bookid'";

$quant2=mysqli_query($conn,$q2);





    echo "<script>alert('Book Returned Successfully');window.location.href='user_books.php';</script>";


}
else {

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

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

    <title>Return Book</title>

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
        <a class="nav-link" style="color:white;" href="user_courses.php">Courses</a>
      </li>

 

      
      

      
    </ul>

    <ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link active" style="color:white;" aria-current="page" href="user_edit.php">Edit Profile</a>
      </li>

    <li class="nav-item">
        <a class="nav-link"  style="color:white;" href="contact_us.php">Contact Us</a>
      </li>

   <!--   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#">Log Out</a>
      </li> 
-->
  
      <a class="btn btn-secondary"href="user_log_out.php" role = "button"> Log Out </a>



</ul>


  </div>
</nav>








  </body>
</html>