<?php

$host="localhost";
$db="db";
$user="root";
$pass=""

try{
    $pdo=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $sqp="CREATE TABLE users (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) not null,
    password varchar(50) not null";

    $pdo->exec($sql);

    echo "Table created succesfully";


}catch(Exeption $e){
    echo "Error creaing table: " . $e->getMessage();

}

?>
