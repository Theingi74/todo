<?php

	require 'config.php';

	$pdostatement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
	$ans = $pdostatement->execute();

	header("Location: index.php");


?>