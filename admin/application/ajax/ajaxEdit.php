<?php 
$id = $_POST['id'];
require_once '../config.php';
$query = "SELECT * FROM `books` WHERE id = '$id'";
		$stmt = $dbh->prepare($query);
		$stmt->execute();
		$items = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
            $items[] = array(
			"id"     	 => (int)$row['id'],
			"name"   	 => $row['name'],
			"autor"		 => $row['autor'],
			"udk"    	 => $row['udk'],
			"bbk"   	 => $row['bbk'],
			"date"   	 => $row['date'],
			"place"    	 => $row['place'],
			"name"    	 => $row['name'],
			"anotation"  => $row['anotation']
            );       
        }

echo '<h1 align="center">Редактирование</h1>';
echo '<form action="" method="POST" onsubmit="saveEdit(this);return false;">';
echo '<table border="1" width="100%"><tr><th>Наименование</th><th>Авторы</th><th>Дата публикации</th><th>Классификация (УДК)</th><th>Классификация (ББК)</th><th>Сохранение</th></tr>';
foreach ($items as $key => $result) {
	echo '<tr><td><input type="hidden" id="id" name="id" value="'.$result['id'].'"><input type="text" id="name" name="name" value="'.$result['name'].'"></td><td><input type="text" id="autor" name="autor" value="'.$result['autor'].'"></td><td><input type="text" id="date" name="date" value="'.$result['date'].'"></td><td><input type="text" id="udk" name="udk" value="'.$result['udk'].'"></td><td><input type="text" name="bbk" value="'.$result['bbk'].'"></td><td><input type="submit" name="submit" value="Сохранить"></td></tr>';
}
echo '</table></form>';
?>