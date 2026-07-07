<?php
session_start();
require_once '../config/database.php';


//Restrict access to Employer accounts
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1){
    header("Location: dashboard.php");
    exit();
}


$user_id = $_GET['id'];

//Fetch employee profile information
$sql = "SELECT full_name,email,phone
FROM users
WHERE user_id = ? ";

$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $user_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Edit Employee</title>
    </head>

    <body>
        <h1>Edit Employee</h1>

        <form method="POST">
            <label>Full Name</label><br>
            <input type="text"
            name="full_name"
            value="<?php echo $user['full_name']; ?> "><br><br>

            <label>Email</label><br>
            <input type="email"
            name="email"
            value="<?php echo $user['email']; ?> "><br><br>

            <label>Phone</label><br>
            <input type="text"
            name="phone"
            value="<?php echo $user['phone']; ?>"> <br><br>


            <button type="submit">Update Employee</button>


        </form>

        <br>

        <a href = "manage_employees.php">Back</a>

    </body>
</html>









