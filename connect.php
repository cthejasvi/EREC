<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'abcd'; 

/* End config */
$conn=new mysqli($db_host,$db_user,$db_pass,$db_database);

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>