<?php 
include('connection.php');
session_start();
$rn=$_SESSION['rollno'];
$sql="select * from students where rollno='$rn'";
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
    color: white;
  }
  .table{
    border: 2px;
    border-color: grey;
    padding: 12px;
    color: white;
    background-color: #333;
    
}

tr:hover{
  background-color: #777778;
}

#temp{
  pointer-events: none;
}

   </style>

    <title>User Home</title>
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
          <a class="nav-link active " aria-current="page" href="home_user.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="user_books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="user_courses.php">Courses</a>
        </li>
        
      </ul>
      <ul class="navbar-nav navbar-right ">
        <li class="nav-item">
          <a class="nav-link" href="user_edit.php">Edit Profile</a>
        </li>
        <li><a href="user_log_out.php" class="btn btn-danger ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       
        
      </ul>
    </div>
  </div>
</nav>


<div class="container">
        <br>
   
              <div id="ui">
                <h2 class="text-center">Student details</h1>
                <form class="form-group" action=" " method="post">
                    <div class="row">
                        <div class="col-lg-6"><Label>First Name:</Label>
                      <input type="text" name="title" class="form-control" value="<?php echo $res['firstname'] ?>" disabled>
                     </div>
                     <div class="col-lg-6"> <Label>Last Name:</Label>
                      <input type="text" name="author" class="form-control" value="<?php echo $res['lastname'] ?>" disabled>
            </div>
                    </div>
               
                           <br>
                  <label>Address:</label>
                  <input type="text" name="link" class="form-control" value="<?php echo $res['address'] ?>" disabled >
                <br>
                <div class="row">
                  <div class="col-lg-3">
                    <label>Roll no</label>
                    <input type="text" class="form-control" name="bookid" value="<?php echo $res['rollno'] ?>" disabled>
                  </div>
                  <div class="col-lg-3">
                    <label>Email:</label>
                    <input type="email" name="pages" class="form-control" value="<?php echo $res['email'] ?>" disabled > 
                  </div>
                  <div class="col-lg-3">
                    <label>Contact No:</label>
                    <input type="number" name="pages" class="form-control" value="<?php echo $res['contactno'] ?>" disabled > 
                  </div>
                  <div class="col-lg-3">
                    <label>DOB:</label>
                    <input type="text" name="pages" class="form-control" value="<?php echo $res['dob'] ?>" disabled > 
                  </div>
                </div>
                <br>
                
                </form>
              </div>

           
    </div>


    <div class="container">
    <h2 style="text-align: center;">Books Issued</h2>
    <table class="table table-hover" >
  <thead>
    <tr id="temp">
      <th scope="col">BookId</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Issuedate</th>
      <th scope="col">Returndate</th>
      <th scope="col">Fine</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
$query="select B.Bookid,B.Title,B.Author,B.Category,A.issuedate,A.returndate from issuebook as A,books as B where A.rollno='$rn' and A.bookid=B.Bookid ";
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

    ?>
    <tr id="11">
      <td><?php echo $res['Bookid']; ?></td>
      <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Author']; ?></td>
      <td><?php echo $res['issuedate']; ?></td>
      <td><?php echo $res['returndate']; ?></td>
      <td><?php echo 10; ?></td>
     
      
    </tr>
    <?php   } ?>
  </tbody>
</table>

</div>






  </body>
</html>