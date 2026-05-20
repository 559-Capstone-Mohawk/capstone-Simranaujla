<?php
   //Start session
   session_start();

   //Check if user is logged in 
   if (!isset($_SESSION['user_id'])){
    header ("Location : login.php");
    exit();
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
    </head>

    <body>
        <h1>Dashboard</h1>

        <p>Welcome, <?php echo $_SESSION['full_name']; ?> </p>
        <p>You are successfully logged in. </p>

        <?php
          if ($_SESSION['role_id']== 1){
            echo "<h3>Employer Dashboard</h3>";
            echo "<p>Manage employees and announcements.</p>";
          }

          else{
            echo "<h3>Employee Dashboard</h3>";
            echo "<p>View work hours and punch records.</p>";

          }

        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>

