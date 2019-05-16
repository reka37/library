<?php 
class Application {
	
	public function __construct() {
	}	
	
	public function run() {
		$this->view();
	}
	
	public function view() {
		require_once 'application/view/application.php';
	}
}
?>
