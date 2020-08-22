<?php
	require 'config.php';
	if($_POST) {
		$title = $_POST['title'];
		$desc  = $_POST['description'];

		$sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
		$pdostatement = $pdo->prepare($sql);
		$result = $pdostatement->execute(
			array(
				':title' => $title,
				':description' => $desc,
			)
		);

		echo "<script>alert('NEW TODO is added');
              window.location.href='index.php';
             </script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Page</title>
	<!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New To Do</h2>
		    <form method="post" action="add.php">	
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="" required="required">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control" rows="8" cols="70" required="required"></textarea>
				</div>
				<div>
					<input type="submit" class="btn btn-primary"  value="SUBMIT">
					<a href="index.php" >Back To Home Page</a>
				</div>
			</form>	
		</div>
	</div>	
</body>
</html>