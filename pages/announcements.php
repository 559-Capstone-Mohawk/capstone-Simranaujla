<?php 
    session_start();
    require_once '../config/database.php';
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit();

    }
    // Restrict announcement creation to Employer accounts
    if($_SESSION['role_id'] != 1){
        header("Location: dashboard.php");
        exit();

    }

    $message = "";

    //Process announcement form submission
    if ($_SERVER ["REQUEST_METHOD"] == "POST"){
        $title = trim($_POST['title']);
        $announcement = trim($_POST['message']);

        //Save announcement to database
        $sql = "INSERT INTO announcements
        (title,message,created_by)
        VALUES (?,?,?)";

        $stmt = mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssi",
            $title,
            $announcement,
            $_SESSION['user_id']
        );

        if (mysqli_stmt_execute($stmt)){
            $message = "Announcement posted successfully.";
        }else{
            $message = mysqli_error($conn);
        }


    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Announcements</title>
    </head>

    <body>
        <h1> Create Announcements</h1>
        <p><?php echo $message; ?></p>
        <form method="POST">
            <label>Title></label><br>
            <input type="text" name="title"><br><br>

            <label>Message</label><br>
            <textarea name="message" rows="5" cols="40" ></textarea><br><br>

            <button type="submit">Post Announcement</button>

        </form>
        <br>

        <a href="dashboard.php">Back to Dashboard</a>
    </body> 
</html>

