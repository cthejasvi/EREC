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


// Validate email format
if (!preg_match("/^[a-z]+@[a-z]+\.[a-z]{2,3}$/", $e)) {
        echo "Invalid email format";
        exit;
    }
    
    // Validate username format
    if (!preg_match("/^[a-z]{5}$/", $b)) {
        echo "Username must contain exactly 5 lowercase letters.";
        exit;
    }


// Validate password format
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/", $c)) {
        echo "Password must include at least 1 capital letter, 1 small letter, have a minimum length of 5 characters, and include at least one digit.";
        exit;
    }
    





// query
$sql = "UPDATE user 
        SET name=?, username=?, password=?, profession=?,email=?
        WHERE id=?";
$q = $db->prepare($sql);
$q -> execute(array($a,$b,$c,$d,$e,$id));   
header("location: admin-settings.php");
?>
 