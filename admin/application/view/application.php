<!DOCTYPE html>
<html>
<head>
	<title>Библиотека</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="application/style.css" type="text/css"/>	
	<script type="text/javascript" src="application/jquery3.3.1.js"></script>
	<script src="application/javascript.js"></script>
</head>
<body>
<a href="../index.php">Главня страница</a><h1 align="center">Cтраница администратора</h1>
<form action="" method="post" class="search" onsubmit="searchWord(this);return false;">
	<input type="search" id="search" name="search" placeholder="поиск" class="input" />
	<input type="submit" name="submit" value="" class="submit" />
</form>
<div id="edit"></div>
<h1 align="center">Каталог библиотеки</h1>
<table border="1" width="100%"><tr><th>Наименование</th><th>Авторы</th><th>Дата публикации</th><th>Классификация (УДК, ББК)</th><th>Редактировать</th><th>Удалить</th></tr>
<?php 
foreach ($arr as $key => $result) {
	$number_of_rows = $result['number_of_rows'];
	echo '<tr><td>'.$result['name'].'</td><td>'.$result['autor'].'</td><td>'.$result['date'].'</td><td>'.$result['udk'].','.$result['bbk'].'</td><td><span class="cursor" onclick="editRecord('.$result['id'].')">Редактировать</span></td><td><span class="cursor" onclick="deleteRecord('.$result['id'].')">Удалить</span></td></tr>';
}
 ?>
</table>
<ul class="pagination">
<?php 
if (isset($number_of_rows)) { 
	$count = ceil($number_of_rows / 20); 
	$res = $count - floor($number_of_rows); 
	if ($res != 0) {
		for ($i = 1; $i <= $count; $i++)  {
			echo '<li><a href="?offset=' . $i . '">' .$i. '</a></li>';
		}
	}
		
}
?>
</ul>
</body>
</html>