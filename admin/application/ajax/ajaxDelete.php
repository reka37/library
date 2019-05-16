<?php 
$id = $_POST['id'];
require_once '../config.php';
$query = "DELETE FROM books WHERE `id`=:id";
$stmt = $dbh->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
?>