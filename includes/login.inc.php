<?php

session_start();

  if (isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Error handlers

    //Check if inputs are empty

    if(empty($uid) || empty($pwd)){
      header("Location: ../login-form.php?login=empty");
      exit();
    }else {
      $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ? ";
      //Create prepared statement
      $stmt = mysqli_stmt_init($conn);
      //Prepare the prepared statement

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login-form.php?signup=SQL_ERROR");
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
          header("Location: ../login-form.php?login=noresults");
          exit();
        }else {
          if($row = mysqli_fetch_assoc($result)){
            //De-hashing the password

            $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
            if ($hashedPwdCheck == false) {
              header("Location: ../login-form.php?login=pad");
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

              header("Location: ../index.php?login=success");
              exit();
            }

          }
        }
      }

    }


  }else {
    header("Location: ../index.php?login=error");
    exit();
  }

 ?>
