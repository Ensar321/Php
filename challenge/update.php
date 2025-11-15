<?php

include_once('config.php');

if(isset($_POST['update'])) {
   
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 


    if (empty($username) || empty($name) || empty($surname) || empty($email)) {
        echo "All fields except password are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }


    if (!empty($password)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username=:username, name=:name, surname=:surname, email=:email, password=:password WHERE id=:id";
    } else {

        $sql = "UPDATE users SET username=:username, name=:name, surname=:surname, email=:email WHERE id=:id";
    }


    $prep = $conn->prepare($sql);


    $prep->bindParam(':id', $id);
    $prep->bindParam(':username', $username);
    $prep->bindParam(':name', $name);
    $prep->bindParam(':surname', $surname);
    $prep->bindParam(':email', $email);


    if (!empty($password)) {
        $prep->bindParam(':password', $hashedPassword);
    }

    if ($prep->execute()) {

        header("Location: dashboard.php?message=User updated successfully");
    } else {

        echo "There was an error updating the user.";
    }
} else {
    echo "No form submitted.";
}

?>
