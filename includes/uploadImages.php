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
        $fileNameNew = uniqid('',true).".".$fileActualExt;
        // File destination
        $fileDestination = '../Uploads/Images/'.$fileNameNew;
        $_SESSION['path']= $fileDestination;
        // Move File
        $userId= $_SESSION['u_id'];
        $username= $_SESSION['u_uid'];
        move_uploaded_file($fileTmpName, $fileDestination);
        $finalFileDestination = 'Uploads/Images/'.$fileNameNew;
        //Get path of user image from profileimg table
        $sql1 = "SELECT * FROM profileimg WHERE userid = '$userId'";
        $result1=mysqli_query($conn, $sql1);
        $row1 = $result1->fetch_assoc();
        $userImagePath = $row1['path'];

        //Insert info for new image into images table
        $sql = "INSERT INTO images (userid, path, username, user_path) VALUES(?, ?, ?, ?);";

           $stmt = mysqli_stmt_init($conn);

           if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location: ../upload-images.php?upload=SQL_ERROR");
             exit();
           }else {
             mysqli_stmt_bind_param($stmt, "ssss", $userId, $finalFileDestination, $username,$userImagePath);
             mysqli_stmt_execute($stmt);
             header("Location: ../my-profile.php?upload=sucess");
           }


      }else {
        header("Location: ../my-profile.php?upload=bigFile");
      }

    }else {
      header("Location: ../my-profile.php?upload=Error");
    }
  }else {
    header("Location: ../my-profile.php?upload=invalidFileType");
  }
}
 ?>
