<?php
session_start();
include('../connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$contact = $_POST['contact']; // Correctly accessing the contact number from the form
$e = $_POST['product_id'];
$f = $_POST['suplier_id'];

// Validate contact number
if (!preg_match("/^\d{10}$/", $contact)) {
    echo "Invalid contact number. Please enter a 10-digit number.";
    exit;
}

// Mobile number is valid, proceed with insertion
// Query to insert data into the database
$sql = "INSERT INTO customer (customer_name, address, contact, product_id, suplier_id) VALUES (:a, :b, :c, :e, :f)";
$q = $db->prepare($sql);

// Bind parameters and execute the query
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $contact, ':e' => $e, ':f' => $f));

// Redirect to customer.php after successful insertion
header("location: customer.php");
?>
