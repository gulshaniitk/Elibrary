<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elibrary";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

 
  
// $bookid=$_POST['bookid'];
// $title=$_POST['title'];
// $publisher=$_POST['publisher'];
// $pages=$_POST['pages'];
// $year=$_POST['year'];
// $category=$_POST['category'];
// $author=$_POST['author'];
// $language=$_POST['language'];
// $status=$_POST['status'];
// $link=$_POST['link'];


// $sql = "INSERT INTO books (Bookid,Title,Publisher,Pages,Year,Category,Author,Language,Status,Link)
// VALUES ('$bookid','$title','$publisher','$pages','$year','$category','$author','$language','$status','$link')";

// if (mysqli_query($conn,$sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// mysqli_close($conn);
?>