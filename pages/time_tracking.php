<?php 
 session_start();
 if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Time Tracking</title>
    </head>

    <body>
        <h1>Time Tracking</h1>

        <p> Welcome, <?php echo $_SESSION['full_name']; ?> </p>

        <button>Punch In</button>
    </body>
</html>