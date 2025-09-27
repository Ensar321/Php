<?php

try{
    $pdo=new PDO("mysql:host=localhost;dbname=db","root","");
  
    $sql="ALTER TABLE users add email varchar(255)";
    $pdo->exec($sql);

    echo "Column Created succesfully";
}catch(PDOExpectiom $e){
    echo "Error creating column: ". $e->getMessage();
}

?>