
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
  background: rgb(34,193,195);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
background-size: 100% 100%;
background-repeat: no-repeat;
background-attachment:fixed ;
 }

 #log{
  font-family: Algerian;
  color:#e3d206;
  /* margin-right: 1 px; */
  font-size: 30px;

}

.table{

border-color: grey;

color: white;
background-color: #333;
}
tr:hover{
background-color: #777778;
}

.navbar-nav{
  font-weight: 550;
  font-size: 19px;
  font-family: Cambria;
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
    <h3 class="navbar-brand" id="log" >E-Library</h3>
      <li class="nav-item">
        <a class="nav-link " style="color:white;" href="home_user.php">Home</a>
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
        <a class="nav-link" style="color:white;" href="user_edit.php">Edit Profile</a>
      </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page"  style="color:white;" href="contact_us.php">Contact Us</a>
      </li>

   <!--   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#">Log Out</a>
      </li> 
-->
  
      <a class="btn btn-danger" href="user_log_out.php" role = "button"> Log Out </a>



</ul>


  </div>
</nav>

<section class="container contact">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    
                    <!--Grid column-->

                </div>
                <br>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <br>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <br>
                <!--Grid row-->
                <div class="text-center text-md-left">
                <button type="submit" class="btn btn-primary text-center" name="submit" >Submit</button>
            </div>
                

            </form>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Y19, IIT KANPUR</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+919006543291,gulshan@iitk.ac.in (Gulshan Kumar) </p>
                    <p>+919413373605,goyalr@iitk.ac.in (Rajat Goyal)</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p></p>
                    <p></p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>



  </body>
</html>