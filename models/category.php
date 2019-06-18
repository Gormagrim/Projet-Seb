<?php

class category extends database {

    public $id = 0;
    public $category = '';
    public $id_al2jt_ouvrage = 0;
    public $type = '';

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

    public function getCategoryFromType() {
        $query = 'SELECT  `c`.`category`, `t`.`type`, `t`.`id` '
                . 'FROM `al2jt_category` AS `c` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `c`.`id` = `t`.`id_al2jt_category` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `p`.`id_al2jt_typeOfProduction` = `t`.`id` '
                . 'WHERE `p`.`type` = :id ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function getProductionFromCategory() {
        $query = 'SELECT  `t`.`id`, `c`.`category`, `t`.`type` '
                . 'FROM `al2jt_category` AS `c` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `c`.`id` = `t`.`id_al2jt_category` '
                . 'ORDER BY `t`.`id` '
                . 'WHERE `c`.`id` = `t`.`id_al2jt_category` ' ;
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
