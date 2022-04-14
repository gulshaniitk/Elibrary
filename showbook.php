<?php 
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

    <title>Books</title>
  </head>
  <body>
    <h1>Book List</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->

   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">BookId</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Category</th>
      <th scope="col">Pages</th>
      <th scope="col">Year</th>
      <th scope="col">Language</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elibrary";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query="select * from books";
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

    ?>
    <tr>
      <th scope="row"><?php echo $res['Bookid']; ?></th>
      <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Author']; ?></td>
      <td><?php echo $res['Publisher']; ?></td>
      
      <td><?php echo $res['Category']; ?></td>
      <td><?php echo $res['Pages']; ?></td>
      <td><?php echo $res['Year']; ?></td>
      <td><?php echo $res['Language']; ?></td>
      <td><?php echo $res['Link']; ?></td>
      
    </tr>
    <?php   } ?>
  </tbody>
</table>

  </body>
</html>