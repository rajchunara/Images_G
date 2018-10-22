<?php

session_start();

  if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $uniqueid = uniqid();

    //Error Hnadlers

    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
      header("Location: ../signup-form.php?signup=empty");
      exit();
    }else {
      //Check if input characters are valid
      if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){
        header("Location: ../signup-form.php?signup=invalid");
        exit();
      }else {
        // check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          header("Location: ../signup-form.php?signup=invalidEmail");
          exit();
        }else {
          $sql = "SELECT * FROM users WHERE user_uid='$uid'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../signup-form.php?signup=userTaken");
            exit();
          }else {
            // Hashing the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert The User into user table
            $sql = "INSERT INTO users (user_unique_id, user_first, user_last, user_email,
               user_uid, user_pwd) VALUES(?, ?, ?, ?, ?, ?);";

               $stmt = mysqli_stmt_init($conn);

               if (!mysqli_stmt_prepare($stmt, $sql)) {
                 header("Location: ../signup-form.php?signup=SQL_ERROR");
                 exit();
               }else {
                 mysqli_stmt_bind_param($stmt, "ssssss", $uniqueid, $first, $last, $email, $uid, $hashedPwd);
                 mysqli_stmt_execute($stmt);

                 //login after signup

                 $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ? ";
                 //Create prepared statement
                 $stmt = mysqli_stmt_init($conn);
                 //Prepare the prepared statement

                 if (!mysqli_stmt_prepare($stmt, $sql)) {
                   header("Location: ../signup-form.php?signup=SQL_ERROR");
                   exit();
                 }else {
                   // Bind Parameters to placeholders
                   mysqli_stmt_bind_param($stmt, "ss", $uid, $pwd);

                   //Run parameters inside database
                   mysqli_stmt_execute($stmt);
                   $result = mysqli_stmt_get_result($stmt);
                   $resultCheck = mysqli_num_rows($result);
                   //Check if any users match
                   if($resultCheck < 1){
                     header("Location: ../signup-form.php?login=noresults");
                     exit();
                   }else {
                     if($row = mysqli_fetch_assoc($result)){
                       //De-hashing the password

                       $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                       if ($hashedPwdCheck == false) {
                         header("Location: ../signup-form.php?login=ERROR");
                         exit();
                       }elseif($hashedPwdCheck == true) {
                         //Log in the user here
                         $_SESSION['u_id'] = $row['user_id'];
                         $_SESSION['u_unique_id'] = $row['user_unique_id'];
                         $_SESSION['u_first'] = $row['user_first'];
                         $_SESSION['u_last'] = $row['user_last'];
                         $_SESSION['u_email'] = $row['user_email'];
                         $_SESSION['u_uid'] = $row['user_uid'];
                         $_SESSION['u_pwd'] = $row['user_pwd'];

                         //Insert user into profile image table

                         $sql = "INSERT INTO profileimg (userid, status, path) VALUES(?, ?, ?);";

                            $stmt = mysqli_stmt_init($conn);
                            $status = 0;
                            $defaultImgPath='Images/defaultUserImage.png';

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                              header("Location: ../signup-form.php?signup=SQL_ERROR");
                              exit();
                            }else {
                              mysqli_stmt_bind_param($stmt, "sss", $row['user_id'], $status,$defaultImgPath);
                              mysqli_stmt_execute($stmt);

                              header("Location: ../index.php?signup=success");
                              exit();
                            }
                       }
                     }
                    }
                  }
                }
          }

  }
}
}
}
  else {
    header("Location: ../index.php");
    exit();
  }

 ?>
