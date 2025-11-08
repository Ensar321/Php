<?php
include_once("config.php");

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $temPass=$_POST['password'];
    $password=password_hash($temPass,PASSWORD_DEFAULT);

    if(empty($name) || empty ($surname) || empty ($username) || empty ($email) || empty ($password)){ 
        echo "Yopu need to fill all the fields"
    }else{
        $sql="SELECT username FROM users WHERE username=:username";
        $tempSql=$conn->prepare($sql);
        $tempSql->bindParam(':username',$username);
        $tempSql->execute();

        if($tempSql->rowCount()>0){
            echo "username exists!";
            header("refresh:2;url=signup.php");
        }else{
            $sql="INSERT INTO  users(name,surname,username,email,password)values (:name,:surname,:username,:email,:password)";
            $insertSql=$conn->prepare($sql);

            $insertsql->bindParam(':name',$name);
            $insertsql->bindParam(':username',$username);
            $insertsql->bindParam(':surname',$surname);
            $insertsql->bindParam(':email',$email);
            $insertsql->bindParam(':password',$password);

            $insertSql->execute();

            echo"Data saved succefully...";
            header("refresh:2;url=login.php");

        }
    }

}