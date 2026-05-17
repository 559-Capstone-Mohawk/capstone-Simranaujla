<?php
  $host = "localhost";
  $username="root";
  $password="root";
  $database="employee_time_tracking";

  $conn = mysqli_connect($host, $username, $password, $database);
  
  if(!$conn){
    die("Database connection failed : " .mysqli_connect_error());
  }
   

?>