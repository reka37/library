<?php 
require_once 'application/controller/application.php';
$application = new Application();
if (isset($_GET['offset'])) {
	$offset = $_GET['offset'];
} else {
	$offset = 0;
}
/*
if (isset($_GET['limit'])) {
	$limit = $_GET['limit'];
} else {
	$limit = 3;
*/
$application->run($offset);
?>




