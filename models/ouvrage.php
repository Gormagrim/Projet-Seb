<?php

class ouvrage extends database {

    public $id = 0;
    public $ouvrage = '';

    public function __construct() {
        parent::__construct();
    }

    public function getOuvrageCategoryAndTypeOfCategory() {
        $query = 'SELECT  * '
                . 'FROM `al2jt_ouvrage` AS `o` '
                . 'INNER JOIN `al2jt_category` AS `c` ON `c`.`id_al2jt_ouvrage` = `o`.`id` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `c`.`id` = `t`.`id_al2jt_category` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'WHERE `p`.`id` = :id ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function getOuvrage() {
        $query = 'SELECT  `id`, `ouvrage` '
                . 'FROM `al2jt_ouvrage` '
                . 'ORDER BY `id` ' ;

        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getOuvrageAndCategory() {
        $query = 'SELECT  `c`.`id`, `o`.`ouvrage`, `c`.`category` '
                . 'FROM `al2jt_ouvrage` AS `o` '
                . 'INNER JOIN `al2jt_category` AS `c` ON `o`.`id` = `c`.`id_al2jt_ouvrage` '
                . 'ORDER BY `o`.`id` ' ;
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getProduction() {
        $query = 'SELECT  `t`.`id`, `o`.`ouvrage`, `c`.`category`, `t`.`type` '
                . 'FROM `al2jt_ouvrage` AS `o` '
                . 'INNER JOIN `al2jt_category` AS `c` ON `o`.`id` = `c`.`id_al2jt_ouvrage` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `c`.`id` = `t`.`id_al2jt_category` '
                . 'ORDER BY  `o`.`ouvrage`' ;
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}

