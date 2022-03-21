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

   </style>
    
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
    <div class="container">
        <br>
    <a href="homepage.php" class="btn btn-danger" >home</a>
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
      <th scope="col">Delete</th>
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
      <td><?php echo 10; ?></td>
      <td><a href="issuebookdelete.php?rn=<?php echo $rn ?>&bi=<?php echo $res['Bookid'] ?>" class="btn btn-danger" >Delete</a></td>
      
    </tr>
    <?php   } ?>
  </tbody>
</table>

</div>
    <div class="container">
              <div id="ui">
                <h2 class="text-center">Book Issue Form</h1>
                <form class="form-group" action=" " method="post">
                <div class="row">
                  <div class="col-lg-4">
                    <label>Book Id(ISBN)</label>
                    <input type="text" name="bookid" class="form-control" required>
                  </div>
                  <div class="col-lg-4">
                    <label>Issuedate:</label>
                    <input type="date" name="issuedate" class="form-control" value="<?php echo date('Y-m-d') ?>" disabled>
                  </div>
                  <div class="col-lg-4">
                    <label>Issuedays:</label>
                    <input type="number" name="issuedays" class="form-control" required>

                  </div>
                </div>
                <br>
                <button type="issue" class="btn btn-primary" name="issue" >Issue</button>
                </form>
              </div>

    </div>

    <?php 
if(isset($_POST['issue']))
{  $days=$_POST['issuedays'];
    $returndate=date('Y-m-d',strtotime('+'.$days.'days'));
    $issuedate=date('Y-m-d');
   
    $sql="insert into issuebook(rollno,bookid,issuedays,issuedate,returndate) values ('$rn','$_POST[bookid]','$_POST[issuedays]','$issuedate','$returndate')";
   
if (mysqli_query($conn,$sql) === TRUE) {
  echo "<script>alert('Book issued successfully');window.location.href='issuebook.php?rn=$rn';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>

  </body>
</html>