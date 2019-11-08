<?php 
interface AnswerAble
{
    public function answer();
}

/**
 * Выбор данных из базы
 * 
 * @autor iirek
 */
class ApplicationModel implements AnswerAble
{
    private $result;

    public function __construct($dbh, $offset) {
        $query_ = "SELECT COUNT(*) FROM `books`";       
        $stmt = $dbh->prepare($query_);      
        $stmt->execute();       
        $number_of_rows = $stmt->fetchColumn(); 
        $limit = 20;
        
        if ($offset != 0) $offset = $offset - 1;		
        $offset = $limit * $offset;	
        $query = "SELECT * FROM `books` LIMIT $limit OFFSET $offset";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $items = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
            $items[] = array(
                "id"     		 => (int)$row['id'],
                "name"   		 => $row['name'],
                "autor"   		 => $row['autor'],
                "udk"   		 => $row['udk'],
                "bbk"   		 => $row['bbk'],
                "date"			 => $row['date'],
                "place"    		 => $row['place'],
                "name"    		 => $row['name'],
                "anotation"    	 => $row['anotation'],
                "number_of_rows" => $number_of_rows
            );       
        }      
       $this->result = $items;		
    }
    
    /**
     * 
     * @return array многомерный массив данных
     */
    public function answer() 
    {
            return $this->result;
    }
}
