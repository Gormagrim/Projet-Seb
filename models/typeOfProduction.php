<?php

class typeOfProduction extends database {
    public $id = 0;
    public $type = '';
    public $id_al2jt_category = 0;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getTypeOfProductionWithCategory() {
        $query = 'SELECT `id`, `type`, `id_al2jt_category` '
                . 'FROM `al2jt_typeOfProduction` ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_category, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
       public function __destruct() {
        $this->db = NULL;
    }
}