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
          <button type="button" data-toggle="modal" data-target="#signupModal" id="upload-btn" class="btn btn-dark uploadBtn">Upload Image</button>
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





<!-- Background Image -->
<section class="bgImage">
  <div class="col-md-5 p-lg-5 mx-auto my-5 headline">
        <h1 class="display-4 font-weight-normal ">Image Gallery</h1>
        <p class="lead font-weight-normal">This website is for demo purpose only and some functionalities are disabled. All images shown here are taken from Pexels.com, I do not claim rights of any images.</p>
  </div>
</section>

<!-- Little Intro -->
<div class="Img-Intro container-fluid">

</div>

<!-- Images Display -->
<div class="Img-Display">
    <div class="row">

    <?php
    $sql = "SELECT * FROM images";
    $result = mysqli_query($conn , $sql);


    while ($row = $result->fetch_assoc()) {


    echo '    <div class="col-sm-4">
                <div class="Img-Card">
                  <div class="img-holder" style="background-image: url('.$row['path'].')"data-toggle="modal" data-target="#imageModal'.$row['id'].'">
                  </div>
                  <div class="like-holder">
                    <img class="relative" id="heart" src='.$row['user_path'].' alt="">
                    <p class="no-likes">'.$row['username'].'</p>
                    <img class="download" id="downloadarrow" src="Images/download-1.png" alt="">
                  </div>
                </div>
              </div>
              <!--Image Modal -->
              <div class="modal fade" id="imageModal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <img src='.$row['path'].' id="imagepreview" style="width: 100%; height: 100%;" >
                    </div>
                  </div>
                </div>
              </div>';

// echo $row['id']."<br>";
// echo $row['userid']."<br>";
// echo $row['path']."<br>";
// echo $row['username']."<br>";
// echo $row['user_path']."<br>";
}
?>


</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<?php
  if (!isset($_SESSION['u_id'])) {
    echo '<script src="JavaScript/source.js" type="text/javascript">
    </script>';
  }else {
    echo '<script>
    $("#heart").on({
        "click": function() {

             var src = ($(this).attr("src") === "Images/like-1.png")
                ? "Images/like.png"
                : "Images/like-1.png";
             $(this).attr("src", src);
        }
    });

    //       On Hover download
                  $("#downloadarrow").mouseenter(function(){
                       $(this).attr("src","Images/download-2.png");
                  });
                  $("#downloadarrow").mouseleave(function(){
                      $(this).attr("src","Images/download-1.png");
                  });
    document.getElementById("upload-btn").onclick = function () {
    location.href = "http://159.203.32.48/upload-image.php";
    };
    </script>';
  }
 ?>
  </body>
</html>
