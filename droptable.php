<?php

try{
    $pdo=new PDO("mysql:host=localhost;dbname=db","root","");
    $sql="DROP TABLE users";

    $pdo->exce($sql);

    echo "Column dropped succesfully";
}catch(PDOExpection $e){
    echo $e.getMessage();
}

?>