<?php

$user = "root";           
$pass = "";               
$server = "localhost";    
$dbname = "challenge";    
try {

    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}

?>
