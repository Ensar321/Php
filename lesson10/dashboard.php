<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th{
            border:1px solid black;
            border-collapse:collapse;
        }

        td,th{
            padding:10px 20px;
        }
        </style>
</head>
<body>
    <?php
        include_once("config.php");
        $sql="SELECT * FROM USER";
        $getUser=$conn->prepare($sql);
        $getUser->execute();
        $user=$getUser->fetchAll();

    ?>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php
            foreach($user as $users){
            ?>
            <tr>
                <td><?= $users['id']?></td>
                <td><?= $users['name']?></td>
                <td><?= $users['username']?></td>
                <td><?= $users['email']?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>