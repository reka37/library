<!DOCTYPE html>
<html>
<head>
	<title>Библиотека</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="application/style.css" type="text/css"/>
</head>
<body>
<a href="admin/">Администратор</a><h1 align="center">Главная страница</h1>

<?php 
if (isset($_GET['result']) && $_GET['result'] == true) {
	echo '<p class="succ">Запись добавлена!!!</p>';
}
if (isset($_GET['result']) && $_GET['result'] == false) {
	echo '<p class="err">Запись не добавлена!!!</p>';
}
?>

<form name="myform" action="application/model/application.php" method="post">			
    <h3 class="head">Ведите данные</h3>  
    <input type="text" name="name" placeholder="Наименование" required><br><br>	  
	<select size="3" multiple name="autor[]" required>
		<option disabled>Выберите автора</option>
		<option value="Пушкин">Пушкин</option>
		<option selected value="Лермонтов">Лермонтов</option>
		<option value="Достоевский">Достоевский</option>
		<option value="Толстой">Толстой</option>
	</select><br><br> 
    <input type="text" name="udk" placeholder="УДК" required><br><br>
	<input type="text" name="bbk" placeholder="ББК" required><br><br> 
	<label>Дата публикации</label><br>
	<input type="date" name="date"  value="Дата публикации" required><br><br> 
	<input type="text" name="place" placeholder="Место публикации"><br><br> 
	<input type="text" name="anotation" placeholder="Аннотация"><br> 
	<input type="submit" name="submit" value="Добавить">
</form>
</body>
</html>