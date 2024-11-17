<?php
session_start();
include('../connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];

// Validate contact number
if (!preg_match("/^\d{10}$/", $c)) {
    echo "Invalid contact number. Please enter a 10-digit number.";
    exit;
}

// query
$sql = "INSERT INTO supliers (suplier_name, suplier_address, suplier_contact, contact_person, note) VALUES (:a, :b, :c, :d, :e)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c, ':d' => $d, ':e' => $e));

header("location: supplier.php");
?>
