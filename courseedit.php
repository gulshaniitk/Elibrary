<?php 
include('connection.php');
$cid=$_GET['cid'];
$sql="select * from courses where courseid=$cid";
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
                <h2 class="text-center">Course Update Form</h1>
                <form class="form-group" action=" " method="post">
                <Label>Course Name:</Label>
                      <input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>">
                      <br>
                <Label>Instructors:</Label>
                      <input type="text" name="instructors" class="form-control" value="<?php echo $res['instructors']; ?>">
                  <br>
                  <label>Link:</label>
                  <input type="text" name="link" class="form-control" value="<?php echo $res['link']; ?>" >
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <label>Year:</label>
                    <input type="number" name="year" class="form-control" value="<?php echo $res['year']; ?>">
                  </div>
                  <div class="col-lg-6">
                    <label>Language:</label>
                    <input type="text" name="language" class="form-control" value="<?php echo $res['language']; ?>">

                  </div>
                </div>
                <br>
                <label>Skills:</label>
                <textarea type="text" name="skills" class="form-control"  rows="4" cols="50"><?php echo $res['skills']; ?></textarea>
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
    $sql="update courses set name='$_POST[name]',instructors='$_POST[instructors]',skills='$_POST[skills]',year='$_POST[year]',link='$_POST[link]',language='$_POST[language]' where courseid=$cid";
   
if (mysqli_query($conn,$sql) === TRUE) {
  echo "<script>alert('Course updated successfully');window.location.href='courses.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>

  </body>
</html>