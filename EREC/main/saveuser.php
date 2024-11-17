<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['username'];
$c = $_POST['password'];
$d = $_POST['Profession'];
$e = $_POST['email'];

// Validate email format
if (!preg_match("/^[a-z]+@[a-z]+\.[a-z]{2,3}$/", $e)) {
    echo "Invalid email format";
    exit;
}

// Validate username format
if (!preg_match("/^[a-z]{5,}$/", $b)) {
    echo "Username must contain minimum 5 lowercase letters.";
    exit;
}

// Validate password format
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/", $c)) {
    echo "Password must include at least 1 capital letter, 1 small letter, have a minimum length of 5 characters, and include at least one digit.";
    exit;
}









// query
$sql = "INSERT INTO user (name,username,password,Profession,email) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: admin-settings.php");


?>