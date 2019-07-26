<?php

class favoriteCompany extends database {

    public $id = 0;
    public $id_al2jt_company = 0;
    public $id_al2jt_user = 0;

    public function __construct() {
        parent::__construct();
    }

   public function addFavoriteToCompany() {
        $query = 'INSERT INTO `al2jt_favoriteCompany` (`id_al2jt_company`, `id_al2jt_user`) '
                . 'VALUES (:id_al2jt_company, :id_al2jt_user) ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_al2jt_company', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function checkFavoriteCompany() {
        $query = 'SELECT COUNT(`id`) as `number`, `id_al2jt_company` '
                . 'FROM `al2jt_favoriteCompany` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function deleteFavoriteCompany() {
        $query = 'DELETE FROM `al2jt_favoriteCompany` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    public function numberOfCompanyFavorite() {
        $query = 'SELECT COUNT(`id_al2jt_company`) as `likeNumber` '
                . 'FROM `al2jt_favoriteCompany` '
                . 'WHERE `id_al2jt_company` = :idComp ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idComp', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function listeOfFavoriteCompany() {
        $query = 'SELECT `comp`.`id`, `comp`.`presentationPhoto`, `comp`.`name`, `u`.`active`, `comp`.`address`, `comp`.`leader`, `comp`.`phoneNumber`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_favoriteCompany` AS `fc` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `fc`.`id_al2jt_user` = `u`.`id` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `fc`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `comp`.`id_al2jt_city` '
                . 'WHERE `fc`.`id_al2jt_user` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function numberTotalOfCompFavorite() {
        $query = 'SELECT COUNT(`f`.`id_al2jt_company`) as `likeNumber` '
                . 'FROM `al2jt_favoriteCompany` AS `f` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `f`.`id_al2jt_company` = `c`.`id` '
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