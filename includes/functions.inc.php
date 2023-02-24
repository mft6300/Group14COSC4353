<?php
session_start();
/*****************SIGNUP*****************/
function emptyInputSignup($email, $phonenum, $username, $password, $passwordRepeat) {
  $result = false;
  if (empty($email) || empty($phonenum) || empty($username) || empty($password) || empty($passwordRepeat)) {
    $result = true;
  }
  return $result;
}

function invalidEmail($email) {
  $result = false;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  return $result;
}

function invalidPhoneNum($phonenum) {
  $result = false;
  if (!preg_match("/^[0-9]*$/", $phonenum)) {
    $result = true;
  }
  return $result;
}

function invalidUsername($username) {
  $result = false;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  return $result;
}

function passwordMatch($password, $passwordRepeat) {
  $result = false;
  if ($password !== $passwordRepeat) {
    $result = true;
  }
  return $result;
}
/*****************FUNCT USED FOR SIGNUP AND LOGIN*****************/
function usernameOrEmailExists($conn, $username, $email) {
  
  $sql = "SELECT * FROM User_Account WHERE (username = ? OR user_email_address = ?) AND deleted_flag = false;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  } 

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $phonenum, $username, $password) {
  $sql = "INSERT INTO User_Account (username, user_pass, user_phone_num, user_email_address) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../memp.php?error=stmtfailed");
    exit();
  } 
  
  $hashedPass = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPass, $phonenum, $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  $userExists = usernameOrEmailExists($conn, $username, $email);
  // session_start();
  $_SESSION["userID"] = $userExists["user_ID"];
  $_SESSION["userRole"] = $userExists["user_role"];
  $_SESSION["username"] = $userExists["username"];
  $status = "success";
  header("location: ../info.php?status=".$status);
  exit();
}
/*****************LOGIN*****************/
function emptyInputLogin($username, $password) {
  $result = false;
  if (empty($username) || empty($password)) {
    $result = true;
  }
  return $result;
}


function loginUser($conn, $username, $password) {
  $userExists = usernameOrEmailExists($conn, $username, $username);
  if (!$userExists) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  if ($username !== 'admin1') {
    $hashedPass = $userExists["user_pass"];
    $checkPassword = password_verify($password, $hashedPass);
    if (!$checkPassword) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }
  }
  else {
    if(strcmp($password, $userExists["user_pass"]) !== 0) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }
  }
  $_SESSION["userID"] = $userExists["user_ID"];
  $_SESSION["userRole"] = $userExists["user_role"];
  $_SESSION["username"] = $userExists["username"];
  header("location: ../index.php");
  exit();
}

/*****************DEBUGGING HELPER*****************/
function debug_to_console($data) {
      $output = $data;
      if (is_array($output))
          $output = implode(',', $output);
  
      echo "<script>console.log('Debug Objects: " . $output . "');</script>";
}
  