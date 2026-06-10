<?php
    session_start();
    require_once '../config/database.php';

    //Verify user login session
    if (!isset ($_SESSION['user_id'])){
        header("Location:login.php");
        exit();
    }

    //Fetch employee profile information

    $sql = "SELECT full_name,email,phone
    FROM users 
    WHERE use_id = ?";

    $stmt = mysqli_prepare($conn,$sql);

    mysqli_stmt_bind_param(
        $stmt,
        "i",
        $_SESSION['user_id']

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $user = mysqli_fetch_assoc($result);

    ?>


<!DOCTYPE html >
<html>
    <head>
        <title>Profile</title>
    </head>

    <body>
        <h1>My Profile</h1>
        <p><strong>Name:</strong><?php echo $user['full_name']; ?></p>
        <p><strong>Email:</strong><?php echo $user['email']; ?></p>
        <p><strong>Phone:</strong><?php echo $user['phone']; ?></p>
        <br>

        <a href = "dashboard.php">Back to Dashboard </a>



        
    </body>
</html>