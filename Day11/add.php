<?php
include_once('config.php');

if(isset($_POST['submit'])) {


    $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (empty($username) || empty($name) || empty($surname) || empty($password) || empty($email)) {
        echo "All fields are required.";
        exit;
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO users(username, name, surname, password, email) VALUES (:username, :name, :surname, :password, :email)";


    $insertSql = $conn->prepare($sql);


    $insertSql->bindParam(':username', $username);
    $insertSql->bindParam(':name', $name);
    $insertSql->bindParam(':surname', $surname);
    $insertSql->bindParam(':password', $hashedPassword); 
    $insertSql->bindParam(':email', $email);


    if ($insertSql->execute()) {
        echo "The user has been added successfully.";
        echo "<br><a href='dashboard.php'>Dashboard</a>";
    } else {
        echo "There was an error adding the user.";
    }

} else {

    echo '<h2>Add User</h2>';
    echo '<form action="add.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>
            
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required><br><br>
            
            <label for="surname">Surname:</label><br>
            <input type="text" name="surname" id="surname" required><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br><br>

            <input type="submit" name="submit" value="Add User">
          </form>';
}
?>


	}


?>