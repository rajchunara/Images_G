<?php
  session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.php">
    <title>Image Gallery</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="index.php">Image Gallery</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
      <ul class="nav justify-content-end">
          <li class="nav-item">
            <button type="button" data-toggle="modal" data-target="#signupModal" id="signup-btn" class="btn btn-dark">Signup</button>
          </li>
      </ul>
  </nav>

  <!-- Login Modal -->

  <!-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->

        <div class="signupFormBody">

          <!-- Error Display -->

          <?php

           if (isset($_GET['login'])) {
             $loginCheck = $_GET['login'];

             if ($loginCheck == "empty") {
               echo '<div class="alert alert-danger" role="alert">
               <p>You did not fill in all fields!</p>
               </div>';
             }elseif ($loginCheck == "noresults") {
               echo '<div class="alert alert-danger" role="alert">
               <p>User with this username does not exist!</p>
               </div>';
             }elseif ($loginCheck == "pad") {
               echo '<div class="alert alert-danger" role="alert">
               <p>Invalid username or password!</p>
               </div>';
             }
           }

          ?>

           <form action="includes/login.inc.php" method="post">

             <div class="form-group">
               <label for="exampleInputEmail1">Username</label>
               <input type="text" name="uid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
               <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>

         <div class="modal-footer">
           <button type="submit" name="submit" class="btn btn-primary mr-auto">Login</button>
         </div>
         </form>
         </div>
      <!-- </div>
    </div>
  </div> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

  <script type="text/javascript">
  document.getElementById("signup-btn").onclick = function () {
    location.href = "http://159.203.32.48/signup-form.php";
  };
  </script>



</body>
</html>
