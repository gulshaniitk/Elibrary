<?php 
include('connection.php');
$rn=$_GET['rn'];
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

  .table2{
    border: 2px;
    border-color: red;
    padding: 12px;
    color: white;
    background-color: #696969;
    
}


   </style>
    
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <h3 class="navbar-brand" >Elibrary</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="homepage.php">Home</a>
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
    <h1>Books Issued</h1>
    <table class="table table-hover" style="background:white;">
  <thead>
    <tr>
      <th scope="col">BookId</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Issuedate</th>
      <th scope="col">Returndate</th>
      <th scope="col">Fine</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
$query="select B.Bookid,B.Title,B.Author,B.Category,A.issuedate,A.returndate from issuebook A,books B where A.rollno='$rn' and A.bookid=B.Bookid ";
$table=mysqli_query($conn,$query);
$num=mysqli_num_rows($table);

while($res=mysqli_fetch_array($table))
{

    ?>
    <tr>
      <th scope="row"><?php echo $res['Bookid']; ?></th>
      <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Author']; ?></td>
      <td><?php echo $res['issuedate']; ?></td>
      <td><?php echo $res['returndate']; ?></td>
      <td><?php echo cal_fine($res['returndate']); ?></td>
      <td><a href="issuebookdelete.php?rn=<?php echo $rn ?>&bi=<?php echo $res['Bookid'] ?>" class="btn btn-primary" >Return</a></td>
      
    </tr>
    <?php   } ?>
  </tbody>
</table>

</div>

   


    
<br>

<div class="container">
        <div class="row">
            <div class="col-lg-7">
            <h1 class="text-center">Issue Books</h1>
</div>

<div class="col-lg-5">
  <form method="POST" action=" ">
<div class="input-group">
<input type="search" class="form-control rounded" placeholder="Search" name="search" aria-label="Search" aria-describedby="search-addon" />
<button class="btn btn-success" type="submit" name="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</div>
</form>
</div>
        </div>
</div>

<div class="container" style="margin-top:25px;" >
<table  class="table table-hover table2">
  <thead class="table-dark">
    <tr>
      <th scope="col">Book Id</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Category</th>
      <th scope="col">Pages</th>
      <th scope="col">Year</th>
      <th scope="col">Quantity</th>
      <th scope="col">Issue</th>
      <th scope="col">Return</th>
     
      
      
      
    </tr>
  </thead>
  <tbody>
  <?php

if(isset($_POST['submit']))
{
  $str=$_POST['search'];
  if($str=="")
  {
    $query="select * from books";
  }
  else {
  $query="select * from books where Bookid like '%$str%' or Title like '%$str%' or Author like '%$str%' or Publisher like '%$str%' or Category like '%$str%' or  Year like '%$str%'  ";
  }

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
        
        
      <?php echo $res['Quantity']; ?>
      </td>
      
      <td >

  
        <?php

$check="SELECT * FROM `issuebook` WHERE rollno='$rn' and bookid='$res[Bookid]' ";
$query=mysqli_query($conn,$check);
$flag2=1;  // book not issued

if(mysqli_num_rows($query)==1){
  $flag2=0; // book issued
}

      

//availabe and not issued
      if($flag==1 and $flag2==1 and $res['Quantity']>0){?>         
       
       <a type="button" class="btn btn-success" href="issuebook2.php?id=<?php echo $res['Bookid'];?>&rn=<?php echo $rn;?>" >Issue</a>
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

  else {?>

<!-- <button href="#" type="button" class="btn btn-danger" disabled>Issue</button> -->

<?php
      }?>
  </td>

      <td>

      <?php

if(($flag==1 and $flag2==0) or ($flag==0 and $flag2==0)){
  ?>

  <a href="issuebookdelete.php?bi=<?php echo $res['Bookid'];?>&rn=<?php echo $rn;?>" type="button" class="btn btn-primary" >Return</a>


  <?php

}
 ?>
 </td>
   </tr>
    <?php   } ?>
  </tbody>
</table>
</div>

<?php 
// if(isset($_POST['issue']))
// {  
//    $days=14;
//     $returndate=date('Y-m-d',strtotime('+'.$days.'days'));
//     $issuedate=date('Y-m-d');
   
//     $sql="insert into issuebook(rollno,bookid,issuedays,issuedate,returndate) values ('$rn','$_POST[bookid]','$_POST[issuedays]','$issuedate','$returndate')";
   
// if (mysqli_query($conn,$sql) === TRUE) {
//   echo "<script>alert('Book issued successfully');window.location.href='issuebook.php?rn=$rn';</script>";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// }

?>

  </body>
</html>