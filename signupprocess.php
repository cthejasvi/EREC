<?php
// Establish a connection to the database
include 'connect.php';

// Check if form fields are empty
if(empty($_POST['username']) || empty($_POST['password'])) {
    echo "All fields are required";
    exit;
}

// Retrieve username and password from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password


// Prepare and execute the SQL statement to insert data into the admin table
$stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");

// Bind parameters and execute the statement
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    // If insertion is successful, redirect to index.php
    header("Location: index.php");
    exit;
} else {
    // If an error occurs, display the error message
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
