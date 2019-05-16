<?php 
class Application {	
	public function __construct() {
	}	
	public function run($offset) {
		$this->view($offset);
	}
	public function model($offset) {
		require_once 'application/config.php';
		require_once 'application/model/application.php';
		$applicationModel = new ApplicationModel($dbh, $offset);
		$this->view = $applicationModel->answer();
		return $this->view;
	}
	public function view($offset) {
		$arr = array();
		$arr = $this->model($offset);
		require_once 'application/view/application.php';
	}
}
?>