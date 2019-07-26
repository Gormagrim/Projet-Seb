<?php

class dislikeCompany extends database {

    public $id = 0;
    public $id_al2jt_company = 0;
    public $id_al2jt_user = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addDislikeToCompany() {
        $query = 'INSERT INTO `al2jt_dislike_company` (`id_al2jt_company`, `id_al2jt_user`) '
                . 'VALUES (:id_al2jt_company, :id_al2jt_user) ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_al2jt_company', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function checkDislikeCompany() {
        $query = 'SELECT COUNT(`id`) as `number`, `id_al2jt_company` '
                . 'FROM `al2jt_dislike_company` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function deleteDislikeCompany() {
        $query = 'DELETE FROM `al2jt_dislike_company` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    public function numberOfCompanyDislike() {
        $query = 'SELECT COUNT(`id_al2jt_company`) as `likeNumber` '
                . 'FROM `al2jt_dislike_company` '
                . 'WHERE `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function numberTotalOfCompDislike() {
        $query = 'SELECT COUNT(`dc`.`id_al2jt_company`) as `likeNumber` '
                . 'FROM `al2jt_dislike_company` AS `dc` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `dc`.`id_al2jt_company` = `c`.`id` '
                . 'INNER JOIN `al2jt_user` AS `user` ON `c`.`id_al2jt_user` = `user`.`id` '
                . 'WHERE `user`.`id` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
