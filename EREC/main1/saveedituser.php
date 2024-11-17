<?php
// configuration
include('../connect.php');
// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['username'];
$c = $_POST['password'];
$d = $_POST['profession'];
$e=$_POST['email'];
// query
$sql = "UPDATE user 
        SET name=?, username=?, password=?, profession=?,email=?
        WHERE id=?";
$q = $db->prepare($sql);
$q -> execute(array($a,$b,$c,$d,$e,$id));   
header("location: admin-settings.php");
?>
 