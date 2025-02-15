<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];

// Validate mobile number
if (!preg_match("/^\d{10}$/", $c)) {
    echo "Invalid mobile number. Please enter a 10-digit number.";
    exit;
}

// query
$sql = "UPDATE supliers 
        SET suplier_name=?, suplier_address=?, suplier_contact=?, contact_person=?, note=?
		WHERE suplier_id=?";
$q = $db->prepare($sql);
$q->execute(array($a, $b, $c, $d, $e, $id));
header("location: supplier.php");
?>
