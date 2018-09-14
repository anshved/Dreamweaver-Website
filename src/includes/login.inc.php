<?php
//Now this page can have sessions
session_start();
include_once 'connect.inc.php';
if(isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  //Error Handlers
  // Check if inputs are empty
  if(empty($email) || empty($pass)) {
    header("Location: ../login.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users where user_email='$email';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1) {
      header("Location: ../login.php?login=error");
      exit();
    } else {
      if($row = mysqli_fetch_assoc($result)) {
        // Dehashing the password
        $hashedPassCheck = password_verify($pass, $row['user_pass']);
        if($hashedPassCheck == false) {
          header("Location: ../login.php?login=error");
          exit();
        } elseif($hashedPassCheck == true) {
          // Login the user here use a common variable called $_SESSION
          $_SESSION['u_id'] = $row['user_id'];
          $_SESSION['u_email'] = $row['user_email'];
          $_SESSION['privilege'] = "admin";
          header("Location: ../dist/index.php");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../login.php");
  exit();
}