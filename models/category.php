<?php

class category extends database {
    public $id = 0;
    public $category = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCategory() {
        $query = 'SELECT `id`, `category` '
                . 'FROM `al2jt_category` ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
       public function __destruct() {
        $this->db = NULL;
    }
}