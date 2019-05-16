<?php 
$search = $_REQUEST['search'];
$search_ = $search;
require_once '../config.php';
$query = 'SELECT * FROM `books` WHERE `name` LIKE :search OR `autor` LIKE :search OR `udk` LIKE :search OR `bbk` LIKE :search';
$stmt = $dbh->prepare($query);
$search = "%$search%";
$stmt->bindValue(':search', $search, PDO::PARAM_STR);
$stmt->execute();
$res = $stmt->rowCount();
if ($res > 0) {
	echo '<div>Результаты поиска по слову " ' . $search_ .' "</div>';	     
	while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
		?>
		<table border="1" width="100%"><tr><th>Наименование</th><th>Авторы</th><th>Дата публикации</th><th>Классификация (УДК, ББК)</th></tr>
<?php 
	echo '<tr><td>'.$item['name'].'</td><td>'.$item['autor'].'</td><td>'.$item['date'].'</td><td>'.$item['udk'].','.$item['bbk'].'</td></tr>';
?>
</table>
<?php 
	}    
} else {
	echo '<div>По слову ' .$search_. ' результаты не найдены </div>'; 
}
?>