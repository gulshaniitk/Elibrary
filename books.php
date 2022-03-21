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

    <title>Hello, world!</title>
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
  </head>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <h4 class="navbar-brand" >Elibrary</h4>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="courses.php">Courses</a>
        </li>
        
      </ul>
      <ul class="navbar-nav navbar-right ">
        <li class="nav-item">
          <a class="nav-link " href="contactus.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editprofile.php">Edit Profile</a>
        </li>
        <li><a href="logout.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
        
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <div id="std1">
        <div class="row">
            <div class="col-lg-4">
            <a class="btn btn-primary btn-success " href="/elibrary/addbook.php" role="button">Add New Book</a>
            </div>
            <div class="col-lg-3">
            <a class="btn btn-primary btn-success " href="#" role="button">Edit Book</a>
            </div>
            <div class="col-lg-5">
            <a class="btn btn-primary btn-success " href="#" role="button">Show status</a>
            </div>
        </div>
        </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
<br>
<div class="container" >
<table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">Book Id</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Category</th>
      <th scope="col">Pages</th>
      <th scope="col">Year</th>
      <th scope="col">Status</th>
      <th scope="col">Link</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
$query="select * from books";
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

    ?>
    <tr>
      <td><?php echo $res['Bookid']; ?></td>
      <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Author']; ?></td>
      <td><?php echo $res['Publisher']; ?></td>
      <td><?php echo $res['Category']; ?></td>
      <td><?php echo $res['Pages']; ?></td>
      <td><?php echo $res['Year']; ?></td>
      <td><?php echo $res['Status']; ?></td>
      <td><?php echo $res['Link']; ?></td>
      <td >
        <a href="bookedit.php?bookid=<?php echo $res['Bookid']; ?>" class="btn btn-info" >Edit</a></td>
        <td>
        <a href="bookdelete.php?bookid=<?php echo $res['Bookid']; ?>" class="btn btn-danger" >Delete</a>
      </td>
    </tr>
    <?php   } ?>
  </tbody>
</table>
</div>

</body>

</html>