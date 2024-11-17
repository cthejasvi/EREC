<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
    </head>
    <body>
        <h2>Signup</h2>
        <form action="signupprocess.php" method="post"
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="signup">
    </form>
        
        <p>already have an account? <a href="index.php">sign in</a></p>
    </body>
</html>