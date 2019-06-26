<?php

class likeProduction extends database {

    public $id = 0;
    public $id_al2jt_production = 0;
    public $id_al2jt_user = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addLikeToProduction() {
        $query = 'INSERT INTO `al2jt_like_production` (`id_al2jt_production`, `id_al2jt_user`) '
                . 'VALUES (:id_al2jt_production, :id_al2jt_user) ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_al2jt_production', $this->id_al2jt_production, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->execute();
        return $this->db->lastInsertId();
    }
    
    public function checkLikeProduction() {
        $query = 'SELECT COUNT(`id`) as `number` '
                . 'FROM `al2jt_like_production` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_production` = :idProd ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
         $queryExecute->bindValue(':idProd', $this->id_al2jt_production, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}