<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$e = $_POST['product_id'];
$f = $_POST['suplier_id'];

// Validate contact number
if (!preg_match("/^\d{10}$/", $c)) {
    echo "Invalid contact number. Please enter a 10-digit number.";
    exit;
}

// query
$sql = "UPDATE customer 
        SET customer_name=?, address=?, contact=?, product_id=?, suplier_id=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$e,$f,$id));
header("location: customer.php");
?>
