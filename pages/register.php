<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Employee Time Tracking System</h2>

        <form method="POST">
            <label>Full Name</label><br>
            <input type="text" name="full_name"><br><br>

            <label>Email</label><br>
            <input type="email" name="email"><br><br>

            <label>Phone Number</label><br>
            <input type="text" name="phone"><br><br>

            <label>Password</label><br>
            <input type="password" name="password"><br><br>

            <label>Role</label><br>
            <select name="role_id">
                <option value="2">Employee</option>
                <option value="1">Employer</option>
            </select><br><br>

            <button type="submit">Register</button>

        </form>
    </body>
</html>