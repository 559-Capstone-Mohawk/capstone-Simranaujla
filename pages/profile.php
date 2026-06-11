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
        <form method="POST">
            <label>Full Name</label> <br>
            <input type = "text" name ="full_name" value = " <?php echo $user['full_name']; ?> " ><br><br>

            <input type = "email" value = " <?php echo $user['email']; ?> " disabled><br><br>

            <input type = "text" name ="phone" value = " <?php echo $user['phone']; ?> " ><br><br>

            <button type = "submit"> Update Profile </button>
        </form>
        <br>

        <a href = "dashboard.php">Back to Dashboard </a>



        
    </body>
</html>