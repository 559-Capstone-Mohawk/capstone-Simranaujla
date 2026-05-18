<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <h1>Employee time Tracking System</h1>

        <h2>User Login</h2>

        <p><?php echo $message; ?> </p>

        <form method="POST">
            <label>Email Address</label><br>
            <input type="email" name="email"><br><br>

            <label>Password</label><br>
            <input type="password" name="password"><br><br>

            <button type="submit">Login</button>
        </form>
    </body>
</html>