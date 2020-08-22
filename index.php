<?php

	require 'config.php';

	$pdostatement = $pdo->prepare("SELECT * FROM todo");
	$pdostatement->execute();
	$res = $pdostatement->fetchAll();   
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>TO DO HOME PAGE</h2>
			<a href="add.php" type="button" class="btn btn-success">Create New</a><br><br>
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Created</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<?php 
						$i=1;
					    if($res){
					    	foreach ($res as $value) {
					?> 
					       <tr>
							<td><?php echo $i ?></td>
							<td><?php echo $value['title'] ?></td>
							<td><?php echo $value['description'] ?></td>
							<td><?php echo date('m/d/Y', strtotime($value['created_at'])) ?></td>
							<td>
								<a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'] ?>">Edit</a>
								<a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'] ?>">Delete</a>
							</td>
						   </tr>
					    <?php
					    $i++;		
					    	}
					    }
					?>

				</tbody>
			</table>		
		</div>	
	</div>
</body>
</html>