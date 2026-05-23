<?php 
 session_start();
 require_once '../config/database.php';

 // Verify user login session
 if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
 }

 $message = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];

    $work_date = date("Y-m-d");


    // Save punch in timestamp
    $punch_in = date ("Y-m-d H:i:s");

    // Insert time record into database
    $sql = "INSERT INTO time_Records
     (user_id, work_date, punch_in) 
     VALUES (?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt){
         die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "iss",
        $user_id,
        $work_date,
        $punch_in
    );

    if (mysqli_stmt_execute($stmt)){
        $message = "Punch In successful.";
    }else{
        $message = mysqli_error($conn);
    }
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

        <p><?php echo $message; ?> </p>
        <form method="POST">

        <button type="submit">Punch In</button>

        </form>

        <a href="dashboard.php">Back to Dashboard</a>
    </body>
</html>