<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$b = $_POST['name'];
$d = $_POST['price'];

$i = $_POST['date_arrival'];
$j = $_POST['qty'];
// query
$sql = "UPDATE products 
        SET   product_name=?,  price=?,date_arrival=?, qty=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$d,$i,$j,$id));
header("location: products.php");
?>