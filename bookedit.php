<?php 
include('connection.php');

session_start();

$adminid=$_SESSION['id'];

if($adminid==null)
{
  header("location:index.php");
}

$bid=$_GET['bookid'];
$sql="select * from books where Bookid=$bid";
$table=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($table);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>Edit Book</title>
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
    color: #fff;
  }

   </style>
    
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div id="ui">
                <h2 class="text-center">Book Update</h1>
                <form class="form-group" action=" " method="post">
                <Label>Title:</Label>
                      <input type="text" name="title" class="form-control"  value="<?php echo $res['Title'] ?>">
                      <br>
                      <Label>Author:</Label>
                      <input type="text" name="author" class="form-control"  value="<?php echo $res['Author'] ?>" >
                  <br>
                  <label>Link:</label>
                  <input type="text" name="link" class="form-control" value="<?php echo $res['Link'] ?>" >
                <br>
                  <label>Publisher:</label>
                  <input type="text" name="publisher" class="form-control"  value="<?php echo $res['Publisher'] ?>" >
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Book Id(ISBN)</label>
                    <input type="text" class="form-control" name="bookid"  value="<?php echo $res['Bookid'] ?>" >
                  </div>
                  <div class="col-lg-6">
                    <label>Pages:</label>
                    <input type="number" name="pages" class="form-control"  value="<?php echo $res['Pages'] ?>" > 
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-4">
                    <label>Year:</label>
                    <input type="number" name="year" class="form-control" value="<?php echo $res['Year'] ?>" required>
                  </div>
                  <div class="col-lg-4">
                    <label>Language:</label>
                    <input type="text" name="language" class="form-control" value="<?php echo $res['Language'] ?>" required>

                  </div>
                  <div class="col-lg-4">
                  <label>Quantity:</label>
                  <input type="number" name="quantity" class="form-control" value="<?php echo $res['Quantity'] ?>" required>
                  </div>
                </div>
                <br>
                <label>Category:</label>
                <input type="text" name="category" class="form-control"  value="<?php echo $res['Category'] ?>" rows="4" cols="50"></input>
                <br>
                <button type="submit" class="btn btn-primary" name="update" >Update</button>
                </form>
              </div>

            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php 
if(isset($_POST['update']))
{  
    $sql="update books set Bookid='$_POST[bookid]',Title='$_POST[title]',Author='$_POST[author]',Publisher='$_POST[publisher]',Category='$_POST[category]',Pages='$_POST[pages]',Year='$_POST[year]',Link='$_POST[link]',Language='$_POST[language]',Quantity='$_POST[quantity]' where Bookid=$bid";
    
if (mysqli_query($conn,$sql) === TRUE) {
  echo "<script>alert('Book updated successfully');window.location.href='books.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>

  </body>
</html>