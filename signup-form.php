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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav1">
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
        <?php
          if (isset($_SESSION['u_id'])) {
            echo '<form class="" action="includes/logout.inc.php" method="post">
              <li class="nav-item">
                <button type="submit" name="submit" class="btn btn-space btn-secondary">Logout</button>
              </li>
            </form>
            <li class="nav-item">
              <button type="button" data-toggle="modal" data-target="#signupModal" class="btn btn-dark">Upload Image</button>
            </li>';
          }else {
            echo '<li class="nav-item">
              <button type="button" data-toggle="modal" data-target="#loginModal" id="login-btn" class="btn btn-space btn-secondary">Login</button>
            </li>';
          }
         ?>
      </ul>
  </nav>

  <!-- Signup Modal -->
  <!-- <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> -->



        <div class="signupFormBody">

          <!-- Error Display -->

          <?php

           if (isset($_GET['signup'])) {
             $signupCheck = $_GET['signup'];

             if ($signupCheck == "empty") {
               echo '<div class="alert alert-danger" role="alert">
               <p>You did not fill in all fields!</p>
               </div>';
             }elseif ($signupCheck == "invalid") {
               echo '<div class="alert alert-danger" role="alert">
               <p>You used invalid characters!</p>
               </div>';
             }elseif ($signupCheck == "invalidEmail") {
               echo '<div class="alert alert-danger" role="alert">
               <p>You used invalid E-mail!</p>
               </div>';
             }elseif ($signupCheck == "userTaken") {
               echo '<div class="alert alert-danger" role="alert">
               <p>Username is already registered, please use different username!</p>
               </div>';
             }
           }

             ?>
          <form action="includes/signup.inc.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail2">First Name</label>
              <input type="text" name="first" class="form-control" aria-describedby="emailHelp" placeholder="Enter First Name">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Last Name</label>
              <input type="text" name="last" class="form-control" aria-describedby="emailHelp" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail2">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail2">User Name</label>
              <input type="text" name="uid" class="form-control" aria-describedby="emailHelp" placeholder="Enter User Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Password</label>
              <input type="password" name="pwd" class="form-control" id="exampleInputPassword2" placeholder="Password">
            </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary mr-auto">Sign up</button>
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
    document.getElementById("login-btn").onclick = function () {
    location.href = "http://159.203.32.48/login-form.php";
    };
  </script>

</body>
</html>
