<?php
  session_start();
  include_once 'includes/dbh.inc.php';
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
    <?php

      if (isset($_SESSION['u_id'])) {
        $userID = $_SESSION['u_id'];
        $sqlImg = "SELECT * FROM profileimg WHERE userid = '$userID'";

        $resultImg = mysqli_query($conn , $sqlImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
          if($rowImg['status'] == 1){
            $pic = $rowImg['path'];
          }else {
            $pic = 'Images/defaultUserImage.png';
          }
        }
        echo '<div class="userInfo">
        <div class="userImage">
          <a href="http://159.203.32.48/my-profile.php"><img src="'.$pic.'" id="userImage" ></a>
        </div>
        <div class="userName" id="userName">
        <a href="http://159.203.32.48/my-profile.php">'. $_SESSION['u_uid'].'</a>
        </div>
        </div>
        <div class="sideBtn">
        <form class="" action="includes/logout.inc.php" method="post">
          <li class="nav-item">
            <button type="submit" name="submit" class="btn btn-space logoutBtn btn-secondary">Logout</button>
          </li>
        </form>
        <li class="nav-item">
          <button type="button" data-toggle="modal" data-target="#signupModal" class="btn btn-dark uploadBtn">Upload Image</button>
        </li>
        </div>';
      }else {
        echo '<div class="sideBtn2">
        <li class="signupBtn">
          <button type="button" data-toggle="modal" data-target="#signupModal" id="signup-btn" class="btn  btn-dark">Signup</button>
        </li>
        <li class="loginBtn">
          <button type="button" data-toggle="modal" data-target="#loginModal" id="login-btn" class="btn btn-space btn-secondary">Login</button>
        </li>


        </div>';
      }
     ?>
  </ul>
</nav>

<div class="imageUploadBody">

  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
    </div>
    <div class="modal-body">
      <img class="modalDefaultImg"src="Images/defaultUserImage.png" alt="">
    </div>
    <div class="modal-footer">
      <form class="" action="includes/uploadImages.php" method="post" enctype="multipart/form-data">
        <input type="file" class="profileInput" name="file" value="">
        <button type="submit" name="submit"class="btn uploadProfileBtn btn-primary">Upload</button>
      </form>
    </div>
  </div>
 </div>

</body>
</html>
