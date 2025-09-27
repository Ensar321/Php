<?php

try{
    $pdo=new PDO("mysql:host=localhost;dbname=db","root","");
    $sql="ALTER TABLE userws DROP COLUMN username";

    $pdo->exce($sql);

    echo "Column dropped succesfully";
}catch(PDOExpectiom $e){
    echo $e.getMessage();
}

?>