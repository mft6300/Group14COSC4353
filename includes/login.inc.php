<?php

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once "dbh.inc.php";
  require_once "functions.inc.php";

  if(emptyInputLogin($username, $password) !== false) {
    header("location: ../index.php?error=emptyinput");
    exit();
  }
  else if(loginUser($conn, $username, $password)) {
    header("location: ../index.php?error=invaliduser");
    exit();
  }
}
else {
  header("location: ../fuel-form.php");
  exit();
}