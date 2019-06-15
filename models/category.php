<?php

class category extends database {

    public $id = 0;
    public $category = '';
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
        $query = 'SELECT  `c`.`category`, `t`.`type` '
                . 'FROM `al2jt_category` AS `c` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `c`.`id` = `t`.`id_al2jt_category` '
                . 'WHERE `t`.`type` = :type ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
