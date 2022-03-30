<?php
include('connection.php');
session_start();
$rn=$_SESSION['rollno'];



if($rn==null){
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

    <title>User Home</title>

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
    border-color: grey;
    padding: 12px;
    color: white;
    background-color: #595757;
    
}
/* .btn-success{
  background-color: #3D378C!important;
} */



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
          <a class="nav-link active" href="user_books.php">Books</a>
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


<br>
<div class="container">
        <div class="row">
            <div class="col-lg-7">

</div>

<div class="col-lg-5">
  <form method="POST" action=" ">
<div class="input-group">
<input type="search" class="form-control rounded" placeholder="Search" name="search" aria-label="Search" aria-describedby="search-addon" required/>
<button class="btn btn-success" type="submit" name="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</div>
</form>
</div>
        </div>
</div>

<div class="container" style="margin-top:25px;" >
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
      <th scope="col">Issue</th>
      <th scope="col">Return</th>
     
      
      
      
    </tr>
  </thead>
  <tbody>
  <?php

if(isset($_POST['submit']))
{
  $str=$_POST['search'];
 
  $query="select * from books where Bookid like '%$str%' or Title like '%$str%' or Author like '%$str%' or Publisher like '%$str%' or Category like '%$str%' or  Year like '%$str%'  ";
 

}
else
{
$query="select * from books";
}
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

  $flag=1; // book availabe
  if($res['Quantity']==0){
    $flag=0;

  }



    ?>
    <tr>
      <td><?php echo $res['Bookid']; ?></td>
      <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Author']; ?></td>
      <td><?php echo $res['Publisher']; ?></td>
      <td><?php echo $res['Category']; ?></td>
      <td><?php echo $res['Pages']; ?></td>
      <td><?php echo $res['Year']; ?></td>

      <td>
        
        
      <?php 

      




       
      if($flag==1){
        echo "Available";
      }
      else {

        echo "Not Available";

      }
      
     ?>
      </td>
      <td><a target="_blank" href="<?php echo $res['Link']; ?>" class="btn btn-primary">Visit</a></td>
      
      <td >

  
        <?php

$check="SELECT * FROM `issuebook` WHERE rollno='$rn' and bookid='$res[Bookid]' ";
$query=mysqli_query($conn,$check);
$flag2=1;  // book not issued

if(mysqli_num_rows($query)==1){
  $flag2=0; // book issued
}

      

//availabe and not issued
      if($flag==1 and $flag2==1){?>         
       
    <a href="user_issue.php?id=<?php echo $res['Bookid'];?>" class='btn btn-success'>Issue</a>
       <!-- <form action="user_issue.php" method="POST" >
       

       <?php
       
       ?>

       


       </form> -->

        <!-- <a href="user_issue.php" class="btn btn-info" >Issue</a> -->
        
        
        <?php
      }
      

// (availabe and issued) or (not availabe and issued)
      else if(($flag==1 and $flag2==0) or ($flag==0 and $flag2==0)){

        ?>

        <button href="#" type="button" class="btn btn-info" disabled>Issued</button>




        <?php
      }


// 





      else {?>

<!-- <button href="#" type="button" class="btn btn-danger" disabled>Issue</button> -->

<?php
      }?>



      



        

        
      
      
      


      </td>

      <td>

      <?php

if(($flag==1 and $flag2==0) or ($flag==0 and $flag2==0)){
  ?>

  <a href="user_return.php?id1=<?php echo $res['Bookid'];?>" type="button" class="btn btn-primary" >Return</a>


  <?php

}



  

      ?>




      </td>
        
        
        
     
      
    </tr>
    <?php   } ?>
  </tbody>
</table>
</div>





  </body>
</html>