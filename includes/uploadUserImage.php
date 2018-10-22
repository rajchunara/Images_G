<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');

  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      // File size allowed is 20MB
      if ($fileSize < 2000000) {
        // create new name of file
        $fileNameNew = 'profile'.$_SESSION['u_id'].".".$fileActualExt;

        // File destination
        $fileDestination = '../Uploads/User-Images/'.$fileNameNew;
        $_SESSION['path']= $fileDestination;
        // Move File
        $userId= $_SESSION['u_id'];
        move_uploaded_file($fileTmpName, $fileDestination);
        $finalFileDestination = 'Uploads/User-Images/'.$fileNameNew;

//Update profileimg table
          $sql = "UPDATE profileimg SET status = 1, path = '$finalFileDestination'
          WHERE userid = '$userId'";
          mysqli_query($conn, $sql);

//Update images table with user photo

          $sql = "UPDATE images SET user_path = '$finalFileDestination'
          WHERE userid = '$userId'";
          mysqli_query($conn, $sql);

        header("Location: ../my-profile.php?uploadPic=sucess");
      }else {
        header("Location: ../my-profile.php?uploadPic=bigFile");
      }

    }else {
      header("Location: ../my-profile.php?uploadPic=Error");
    }
  }else {
    header("Location: ../my-profile.php?uploadPic=invalidFileType");
  }
}
 ?>
