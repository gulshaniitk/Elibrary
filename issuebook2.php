<?php 
include('connection.php');

session_start();

$adminid=$_SESSION['id'];

if($adminid==null)
{
  header("location:index.php");
}

$rn=$_GET['rn'];
$id=$_GET['id'];
$sql="select * from students where rollno='$rn'";
$table=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($table);

$sql4="select * from issuebook where rollno='$rn'";
$table4=mysqli_query($conn,$sql4);
$res4=mysqli_num_rows($table4);
if($res4==10){

  echo "<script>alert('Book cannot be Issued as student have already issued 10 books.');window.location.href='issuebook.php?rn=$rn';</script>";

}

$sql2="select * from registered_students where rollno='$rn'";
$table2=mysqli_query($conn,$sql2);
$res2=mysqli_fetch_array($table2);

$bookid=$_GET['id'];
$sql3="select * from books where Bookid='$bookid'";
$table3=mysqli_query($conn,$sql3);
$res3=mysqli_fetch_array($table3);

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

  /* .table2{
    border: 2px;
    border-color: red;
    padding: 12px;
    color: white;
    background-color: #696969;
    
} */

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
    <h3 class="navbar-brand" >E-Library</h3>
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
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div id="ui">
                <h2 class="text-center">Issue Book</h1>
                <form class="form-group" action=" " method="POST">
                  <div class="row">

                <div class="col-lg-6">
                <label>Firstname:</label>
                  <input type="text" name="firstname" class="form-control" value="<?php echo $res['firstname'] ?>" disabled >


                </div>

                <div class="col-lg-6">
                <label>Lastname:</label>
                <input type="text" name="lastname" class="form-control"  value="<?php echo $res['lastname'] ?>" disabled>

                </div>



                </div>

                <br>

                <label>Roll No:</label>
                  <input type="number" name="roll" class="form-control"  value="<?php echo $res['rollno'] ?>" disabled >

                  
                

                

                <br>



                <Label>Email:</Label>
                      <input type="text" name="email" class="form-control"  value="<?php echo $res['email'] ?>" disabled>
                      <br>

                      <Label>Book Title:</Label>
                      <input type="text" name="book" class="form-control"  value="<?php echo $res3['Title'] ?>" disabled>
                      <br>
                      
                  

               
                      
                    <label>Book ID:</label>
                    <input type="text" class="form-control" name="bid"  value="<?php echo $bookid ;?>" disabled   >

                    <br>
                

                
                <div class="row">
                <div class="col-lg-6">
                    <label>Issue date:</label>
                    <input type="date" name="issue_date" class="form-control"  value="<?php echo  date("Y-m-d")  ?>" disabled > 

                  </div>

                <div class="col-lg-6">
                    <label>Issue Days:</label>
                    <input type="number" name="issue_days" value="1" min="1" max="7" class="form-control"  >
                    <label style="color: white;font-size: x-small; font-style: italic;"> Max Limit: 7 Days</label>
                  </div>


                  

                </div>
    <button type="submit" class="btn btn-primary" name="issued" >Issue</button>
                </form>
              </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php 
if(isset($_POST['issued']))


{ 

  $myDate = date('Y-m-d');
$nDays = $_POST['issue_days'];
$returndate=date('Y-m-d',strtotime('+'.$nDays.'days'));

$q1="SELECT `Quantity` FROM `books` WHERE Bookid='$bookid'";

$quant=mysqli_query($conn,$q1);

$curr = mysqli_fetch_assoc($quant);

$quantity=$curr['Quantity'];
$quantity=$quantity-1;


$q2="UPDATE `books` SET `Quantity`='$quantity' WHERE Bookid='$bookid'";

$quant2=mysqli_query($conn,$q2);










// echo $returndate;

  
  

    
  //$sql="update students as S,registered_students as R set  R.password='$_POST[password]',S.firstname='$_POST[firstname]',S.lastname='$_POST[lastname]',S.contactno='$_POST[contactno]',S.dob='$_POST[dob]',S.age='$_POST[age]',S.gender='$_POST[gender]',S.address='$_POST[address]' where R.rollno='$rn' and S.rollno='$rn'";

  $temp="INSERT INTO `issuebook`( `rollno`, `bookid`, `issuedays`, `issuedate`, `returndate`) VALUES ('$rn','$bookid','$_POST[issue_days]','$myDate','$returndate') ";

 
   
    
if (mysqli_query($conn,$temp) ===TRUE ) {
  echo "<script>alert('Book Issued Successfully');window.location.href='issuebook.php?rn=$rn';</script>";

} else {
  echo "Error: " . $temp . "<br>" . mysqli_error($conn);
}

}

?>



   

  </body>
</html>