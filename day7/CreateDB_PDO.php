<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    try{
        $conn = new PDO("mysql:host=$host", $user ,$pass);
        $sql = "Create database testdb1";
        $conn->exec($sql);
        echo "Database is created";

    }catch(exepction $e){
        echo "Data base not created, something went wrong";
    }
?>