<?php 
include('connection.php');
session_start();
$rn=$_SESSION['rollno'];




if($rn==null){
  header("location:index.php");
  
}
$sql="select * from students where rollno='$rn'";
$table=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($table);

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

    <title>Issue Form</title>

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
  
      <a class="btn btn-danger" href="user_log_out.php" role = "button"> Log Out </a>



</ul>


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
  echo "<script>alert('Book Issued Successfully');window.location.href='user_books.php';</script>";

} else {
  echo "Error: " . $temp . "<br>" . mysqli_error($conn);
}

}

?>




  </body>
</html>