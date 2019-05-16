<?php 
	$id = $_POST['id'];
	$name = $_POST['name'];
	$autor = $_POST['autor'];
	$udk = $_POST['udk'];
	$bbk = $_POST['bbk'];
	require_once '../config.php';
	$query = "UPDATE books SET name = :name, autor = :autor, udk = :udk, bbk = :bbk WHERE `id`=:id";
	$stmt = $dbh->prepare($query);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);	
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);	
	$stmt->bindValue(':autor', $autor, PDO::PARAM_STR);	
	$stmt->bindValue(':udk', $udk, PDO::PARAM_STR);	
	$stmt->bindValue(':bbk', $bbk, PDO::PARAM_STR);	
	$stmt->execute();
?>