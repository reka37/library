<?php 

/**
 * Library - блок администратора
 * 
 * @package Library
 * 
 * @subpackage Admin
 * 
 * @autor irek 
 */

require_once 'application/controller/application.php';

$application = new Application();

if (isset($_GET['offset'])) {
	$offset = $_GET['offset'];
} else {
	$offset = 0;
}

$application->run($offset);




