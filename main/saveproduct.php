<?php
session_start();
include('../connect.php');

$b = $_POST['name'];
$d = $_POST['price'];
$f = $_POST['qty'];
$i = $_POST['category_id'];
$j = $_POST['date_arrival'];



// query
$sql = "INSERT INTO products (product_name,price,qty,category_id,date_arrival) VALUES (:b,:d,:f,:i,:j)";

$q = $db->prepare($sql);
$q->execute(array(':b'=>$b,':d'=>$d,':f'=>$f,':i'=>$i,':j'=>$j));
header("location: products.php");
?>
