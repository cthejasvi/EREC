<?php
	//Start session
	session_start();
	



if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];

	SELECT password FROM users WHERE username='$username' && password='$password';
    $hashed_password=result of the query;


    

	if(password_verify($password,$hashed_password)){

    
	$_SESSION["loggedin"]=true;
	$_SESSION["username"]=$username;

	header("location:products.php");
	exit;
}
}
else{
	header("location:login.php");
	exit;
}




	
?>