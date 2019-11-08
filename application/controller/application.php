<?php 
/**
 * 
 * @package Library
 * 
 * @subpackage Controllers
 * 
 * @abstract
 */

abstract class ParentApplication
{
    abstract function run();
    abstract function view();
}

/**
 * Главный контроллер
 * 
 * 
 */
class Application extends ParentApplication 
{
	
	public function __construct() {}	
	
        /**
         * 
         * Запускаем метод вывода вида
         * 
         * @return void
         */     
	public function run() 
        {
		$this->view();
	}
        
	/**
         * 
         * Метод вывода вида
         * 
         * @return void
         */       
	public function view() 
        {
		require_once 'application/view/application.php';
	}
}

