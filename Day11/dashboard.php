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
	include_once('config.php'); // Ensure the connection is correctly set up

	// Fetch all records from the 'challenge' table
	$getusers = $conn->prepare("SELECT * FROM challenge");
	$getusers->execute();

	// Fetch the results into an associative array
	$users = $getusers->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="index.php">Add User</a>

<table>
<thead>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Description</th>
		<th>Quantity</th>
		<th>Prices</th>
	</tr>
</thead>

<tbody>

<?php foreach ($users as $products): ?>
	<tr>
		<td><?= $products['id'] ?></td>
		<td><?= $products['title'] ?></td>
		<td><?= $products['description'] ?></td>
		<td><?= $products['quantity'] ?></td>
		<td><?= $products['prices'] ?></td>
		<td>
			<a href="delete.php?id=<?= $products['id'] ?>">Delete</a> |
			<a href="edit.php?id=<?= $products['id'] ?>">Update</a>
		</td>
	</tr>
<?php endforeach; ?>

</tbody>
</table>

</body>
</html>
