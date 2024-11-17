<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .signup-form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .signup-title {
            text-align: center;
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $errors['empty_fields'] = "Do you want to continue?";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $email = $_POST['email'];

        if (!preg_match("/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,3}$/", $email)) {
            $errors['invalid_email'] = "Invalid email format";
        }

        if (!preg_match("/^[a-z]{5,}$/", $username)) {
            $errors['invalid_username'] = "Username must contain minimum 5 lowercase letters.";
        }

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/", $password)) {
            $errors['invalid_password'] = "Password must include at least 1 capital letter, 1 small letter, have a minimum length of 5 characters, and include at least one digit.";
        }

        if (empty($errors)) {
            // Your database logic here
        }
    }
}

if (!empty($errors)) {
    echo '<script>alert("';
    foreach ($errors as $error) {
        echo $error . "\\n";
    }
    echo '");</script>';
}
?>
    <div class="signup-form">
        <h2 class="signup-title">Signup</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="profession">Profession:</label>
            <input type="text" id="profession" name="profession" required><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br><br>
            <input type="submit" value="Signup">
        </form>
        <p>Already have an account? <a href="index.php">Sign in</a></p>
    </div>
</body>
</html>
