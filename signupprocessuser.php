<?php
// Initialize error message variable
$errors = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are empty
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $errors['empty_fields'] = "All fields are required";
    } else {
        // Retrieve username, password, and email from the POST request
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $email = $_POST['email'];

        // Validate email format
        if (!preg_match("/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,3}$/", $email)) {
            $errors['invalid_email'] = "Invalid email format";
        }

        // Validate username format
        if (!preg_match("/^[a-z]{5,}$/", $username)) {
            $errors['invalid_username'] = "Username must contain exactly 5 lowercase letters.";
        }

        // Validate password format
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/", $password)) {
            $errors['invalid_password'] = "Password must include at least 1 capital letter, 1 small letter, have a minimum length of 5 characters, and include at least one digit.";
        }

        if (empty($errors)) {
            // Prepare and execute the SQL statement to insert data into the admin table
            $stmt = $conn->prepare("INSERT INTO user (username, password, name, profession, email) VALUES (?, ?, ?, ?, ?)");

            // Bind parameters and execute the statement
            $stmt->bind_param("sssss", $username, $password, $name, $profession, $email);

            if ($stmt->execute()) {
                // If insertion is successful, redirect to index.php
                header("Location: index.php");
                exit;
            } else {
                // If an error occurs, set the error message
                $errors['database_error'] = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }
}

// Close the database connection

?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <script>
        window.onload = function() {
            <?php
            if (!empty($errors)) {
                echo "alert('";
                foreach ($errors as $error) {
                    echo $error . "\\n";
                }
                echo "');";
            }
            ?>
        };
    </script>
</head>
<body>
    <h2>Signup</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <label for="profession">Profession:</label>
        <input type="text" id="profession" name="profession" required><br><br>
        
        <label for="email
