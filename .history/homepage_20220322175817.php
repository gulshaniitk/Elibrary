<?php
include 'connection.php';
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

    <title>Hello, world!</title>
    <style>
body{
    background-image: url('https://media.istockphoto.com/photos/books-picture-id949118068?k=20&m=949118068&s=612x612&w=0&h=e8tiaCdluEA9IS_I7ytStcx--toLbovf3U74v-LfNAk=');
    background-repeat: no-repeat;
    background-attachment:fixed ;
    background-size: 100% 100%;
    
  backdrop-filter: blur(2px);

}


#logo {
color: #666;
width:100%;   
}
#logo h1 {
    font-size: 60px;
    text-shadow: 1px 2px 3px #999;
    font-family: Roboto, sans-serif;
    font-weight: 700;
    letter-spacing: -1px;
}
#logo p{
  padding-bottom: 20px;
}


#form-buscar >.form-group >.input-group > .form-control {
    height: 40px;
}
#form-buscar >.form-group >.input-group > .input-group-btn > .btn{
        height: 40px; 
        font-size: 16px;
        font-weight: 300; 
         
       
}

#form-buscar >.form-group >.input-group > .input-group-btn > .btn .glyphicon{
 margin-right:12px;   
}    


#form-buscar >.form-group >.input-group > .form-control {
    font-size: 16px;
    font-weight: 300;
   
}

#form-buscar >.form-group >.input-group > .form-control:focus {
  border-color: #33A444;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 1px rgba(0, 109, 0, 0.8);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 1px rgba(0, 109, 0, 0.8);
}

#tbl{
  background-color: white;
  color: black;
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
    <h3 class="navbar-brand" >Elibrary</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Books record</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Orders</a>
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

  <div class="container justify-content-center" style="margin-top: 8%;">
<div class="d-flex justify-content-center">     
<div class="row">
<div id="logo" class="text-center ">
<h1>Student Search</h1>
</div>
<form role="form" id="form-buscar" action=" " method="post">
<div class="form-group">
<div class="input-group">
<input id="1" class="form-control" type="text" name="search" placeholder="Search..." required/>
<span class="input-group-btn">
<button class="btn btn-success" type="submit" name="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
</div>
</div>
</form>
</div>            
</div>
</div>
<br>
<?php

if(isset($_POST['submit']))
{
  $str=$_POST['search'];
  $sql="select * from students where rollno like '%$str%' or firstname like '%$str%' or lastname like '%$str%' or address like '%$str%'  ";
  $res=mysqli_query($conn,$sql);
  if(mysqli_num_rows($res)>0)
  { 
    ?>
    <div class="container" >
<table class="table table-hover" id="tbl">
  <thead class="table-dark">
    <tr>
      <th scope="col">Roll No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Contact No</th>
      <th scope="col">Email</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
<?php 
    while($row=mysqli_fetch_array($res))
    {
      ?>
      <tr>
        <td><?php echo $row['rollno']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['contactno']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['dob']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><a href="issuebook.php?rn=<?php echo $row['rollno']; ?>" class="btn btn-info" >Issue/Return</a></td>
        
        
      </tr>
      <?php   } 
    

    ?>
    </tbody>
</table>
</div>
<?php

  }
  else
  {
    echo "<script>alert('No data found');</script>";
  }
}


?>

</body>

</html>