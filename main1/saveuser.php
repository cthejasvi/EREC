<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['username'];
$c = $_POST['password'];
$d = $_POST['Profession'];
$e = $_POST['email'];
// query
$sql = "INSERT INTO user (name,username,password,Profession,email) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: admin-settings.php");


?>