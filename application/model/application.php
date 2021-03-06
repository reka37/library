<?php 
/**
 * 
 * @abstract
 * 
 */

abstract class ParentApplicationModel
{
    private $result;
    
    abstract function answer();
}

/**
 * Запись данных по книге
 * 
 * @autor irek 
 * 
 * @package Library
 * 
 * @subpackage Model
 * 
 */
class ApplicationModel extends ParentApplicationModel
{
		
    public function __construct($dbh, $name, $autor, $udk, $bbk, $date, $place, $anotation) 
    {
        try {
            $dbh->beginTransaction();
            $query = "INSERT INTO `books` "
                        . "(`name`, `autor`, `udk`, `bbk`, `date`, `place`, `anotation`) "
                        . "VALUES "
                        . "(:name, :autor, :udk, :bbk, :date, :place, :anotation)";
            $stmt = $dbh->prepare($query);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':autor', $autor, PDO::PARAM_STR);
            $stmt->bindValue(':udk', $udk, PDO::PARAM_STR);
            $stmt->bindValue(':bbk', $bbk, PDO::PARAM_STR);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
            $stmt->bindValue(':place', $place, PDO::PARAM_STR);
            $stmt->bindValue(':anotation', $anotation, PDO::PARAM_STR);
            $res = $stmt->execute();
            $dbh->commit();
            
            if ($res) {
                $this->result = true;
            } else {
                $this->result = false; 
            }           
        } catch( PDOException $e ) {
            $dbh->rollback();
            $this->result = false;
        }    
    }

    /**
     * 
     * Вывод результата взаимодействия с базой
     * 
     * @return boolean
     */
    public function answer() 
    {
            return $this->result;
    }
}

if (!empty($_POST['submit'])) {
    require_once '../config.php';
    $autor = implode(',', $_POST['autor']);
    $applicationModel = new ApplicationModel($dbh, $_POST['name'], $autor, $_POST['udk'], $_POST['bbk'], $_POST['date'], $_POST['place'], $_POST['anotation']);
    
    if ($applicationModel->answer()) {
            header('Location: ../../index.php?result=true');
    } else {
            header('Location: ../../index.php?result=false');
    }
}
