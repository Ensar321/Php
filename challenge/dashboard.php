<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		table {
			border: 1px solid black;
		}
		tr, td, th {
			border: 1px solid black;
		}
		table, tr, td {
			border-collapse: collapse;
		}
		td {
			padding: 10px;
		}
	</style>
</head>
<body>

<?php 
	include_once('config.php');

$getusers = $conn->prepare("SELECT * FROM challenge");
$getusers->execute();


$users = $getusers->fetchAll(PDO::FETCH_ASSOC);

?>

<a href="index.php">Add User</a>

<table>
<thead>
	<tr>
		<th>ID</th>
		<th>title</th>
		<th>description</th>
		<th>quantity</th>
		<th>prices</th>
	</tr>
</thead>

<tbody>

<?php foreach ($users as $challenge): ?>
	<tr>
		<td><?= $challenge['id'] ?></td>
		<td><?= $challenge['title'] ?></td>
		<td><?= $challenge['description'] ?></td>
		<td><?= $challenge['quantity'] ?></td>
		<td><?= $challenge['prices'] ?></td>
		<td>
			<a href="delete.php?id=<?= $challenge['id'] ?>">Delete</a> |
			<a href="edit.php?id=<?= $challenge['id'] ?>">Update</a>
		</td>
	</tr>
<?php

endforeach;

?>

</tbody>
</table>

</body>
</html>
