<?php
 require 'config.php';

 if($_POST){

 	$title = $_POST['title'];
 	$dec   = $_POST['description'];
 	$id    = $_POST['id'];

	$pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$dec' WHERE id='$id' ");
	$ans =$pdostatement->execute();

	if ($ans) {
		echo "<script>alert('NEW TODO is UPDATE');
              window.location.href='index.php';
             </script>";
	}

 } else{
 	$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id =".$_GET['id']);
 	$pdostatement->execute();
 	$res = $pdostatement->fetchAll();
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
			<h2>Edit New To Do</h2>
		    <form method="post" action="">	
		    	<input type="hidden" name="id" value="<?php echo $res[0]['id']?>">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $res[0]['title'] ?>" required="required">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control" rows="8" cols="70" required="required"><?php echo $res[0]['description'] ?> </textarea>
				</div>
				<div>
					<input type="submit" class="btn btn-primary"  value="Update">
					<a href="index.php">Back To Home Page</a>
				</div>
			</form>	
		</div>
	</div>	
</body>
</html>