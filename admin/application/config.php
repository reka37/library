<?php  
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "library");	
$dbh = new PDO('mysql:host=localhost;dbname=' . DB, USER, PASS);  
?>