<?php
  session_start();
  include_once 'includes/dbh.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
// If user is logged in
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
          <img src="'.$pic.'" id="userImage" >
        </div>
        <div class="userName">
        '. $_SESSION['u_uid'].'
        </div>
        </div>
        <div class="sideBtn">
        <form class="" action="includes/logout.inc.php" method="post">
          <li class="nav-item">
            <button type="submit" name="submit" class="btn btn-space logoutBtn btn-secondary">Logout</button>
          </li>
        </form>
        <li class="nav-item">
          <button type="button" data-toggle="modal" data-target="#signupModal" id="upload-btn"class="btn btn-dark uploadBtn">Upload Image</button>
        </li>
        </div>';
      }else {
        echo '<div class="sideBtn2">
          <button type="button" data-toggle="modal" data-target="#signupModal" id="signup-btn" class="btn  btn-dark">Signup</button>
          <button type="button" data-toggle="modal" data-target="#loginModal" id="login-btn" class="btn btn-space btn-secondary">Login</button>

        </div>';
      }
     ?>
  </ul>
</nav>

    <div class="headerBackgroundImage">
      <div class="profileImageDiv">
        <?php echo '<img class="profileImage" src="'.$pic.'" alt="" >' ?>
        <p class="profileName">MY NAME</p>
        <img class="editicon" src="Images/editicon.png" data-toggle="modal" data-target="#uploadProfileImgModal" alt="">

        <!-- Upload Image Modal -->
        <!-- Modal -->
        <?php
          if (isset($_SESSION['u_id'])) {
            echo '<div class="modal fade" id="uploadProfileImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img class="modalDefaultImg"src="Images/defaultUserImage.png" alt="">
                  </div>
                  <div class="modal-footer">
                    <form class="" action="includes/uploadUserImage.php" method="post" enctype="multipart/form-data">
                      <input type="file" class="profileInput" name="file" value="">
                      <button type="submit" name="submit"class="btn uploadProfileBtn btn-primary">Upload</button>
                      <button type="button" class="btn closebtn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>';
          }else {
            echo '<div class="modal fade" id="uploadProfileImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>You are not logged in</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn closebtn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';
          }
         ?>



      </div>
    </div>

    <div class="myImagesDiv">
      <p class="profileImagesTitle"><strong>My Images</strong></p>
    </div>

    <div class="Img-Display">
        <div class="row">

        <?php
        $userId = $_SESSION['u_id'];
        $sql = "SELECT * FROM images WHERE userid = '$userId'";
        $result = mysqli_query($conn , $sql);


        while ($row = $result->fetch_assoc()) {


        echo '    <div class="col-sm-4">
                    <div class="Img-Card" >
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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script type="text/javascript">
    document.getElementById("upload-btn").onclick = function () {
    location.href = "http://159.203.32.48/upload-image.php";
    };
    $(".editicon").click(function () {
         $('#uploadProfileImgModal').modal('show');
     });


     //       On Hover download
                   $("#downloadarrow").mouseenter(function(){
                        $(this).attr("src","Images/download-2.png");
                   });
                   $("#downloadarrow").mouseleave(function(){
                       $(this).attr("src","Images/download-1.png");
                   });

    </script>

  </body>
</html>
