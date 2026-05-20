<?php
  //Start session
  session_start();

  //Remove all session variables
  session_unset();

  //Destroy session
  session_destroy();

  //Redirect user to login page
  header("Location: login.php");

  exit();

?>
