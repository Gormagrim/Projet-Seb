<?php

class type extends database {

    public $id = 0;
    public $type  = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function inserProduction() {
        $query = 'INSERT INTO `al2jt_typeOfProduction` (`type`) '
                . 'VALUES (:type) ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->execute();
        return $this->db->lastInsertId();
    }
    
    // METHODE PROVISOIRE, VOIR SON UTILITE.....
    
    public function getCategoryAndType() {
        $query = 'SELECT * '
                . 'FROM `al2jt_category` AS `c` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id_al2jt_category` = `c`.`id` '
                . 'WHERE `t`.`id` = :id ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function searchCategoryAndType($search) {
        $query = 'SELECT `id`, `zipcode`, `city` '
                . 'FROM `al2jt_city` '
                . 'WHERE `city` LIKE :search';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':search', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        $this->db = NULL;
    }
    
}
