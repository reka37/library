<?php 

/**
 * @interface
 */
interface RunModelViewAble
{
    public function run($offset);
    
    public function model($offset);
    
    public function view($offset);
}

/**
 * Главный контроллер панели администратора
 */
class Application implements RunModelViewAble
{	
	public function __construct() {}	
        
        /**
         * Выводим вид
         * 
         * @param int $offset значение для пагинации
         */
	public function run($offset) 
        {
		$this->view($offset);
	}
        
        /**
         * Получаем данные из базы
         * 
         * @param int $offset значение для пагинации
         * 
         * @return array массив данных
         */
	public function model($offset) 
        {
            require_once 'application/config.php';
            require_once 'application/model/application.php';
            
            $applicationModel = new ApplicationModel($dbh, $offset);
            $this->view = $applicationModel->answer();
            
            return $this->view;
	}
        
        /**
         * Получаем вид
         * 
         * @param int $offset значение для пагинации
         * 
         * @return void
         */
	public function view($offset) 
        {
            $arr = array();
            $arr = $this->model($offset);
            require_once 'application/view/application.php';
	}
}
