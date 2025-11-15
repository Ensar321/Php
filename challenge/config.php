<?php

$user="root";
$pass="";
$server="localhost";
$dbname="challenge";

try {
	
	$conn =new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);


} catch (PDOException $e) {
	echo "error: " . $e->getMessage();
}




 ?>