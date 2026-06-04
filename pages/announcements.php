<?php 
    session_start();
    require_once '../config/database.php';
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Announcements</title>
    </head>

    <body>
        <h1>Announcements</h1>
        <p>Announcements system coming soon</p>

        <a href="dashboard.php">Back to Dashboard</a>
    </body> 
</html>

