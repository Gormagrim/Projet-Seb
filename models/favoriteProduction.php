<?php

class favoriteProduction extends database {

    public $id = 0;
    public $id_al2jt_production = 0;
    public $id_al2jt_user = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addProductionToFavorite() {
        $query = 'INSERT INTO `al2jt_favoriteProduction` (`id_al2jt_production`, `id_al2jt_user`) '
                . 'VALUES (:id_al2jt_production, :id_al2jt_user) ';

        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_al2jt_production', $this->id_al2jt_production, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function checkFavoriteProduction() {
        $query = 'SELECT COUNT(`id`) as `number`, `id_al2jt_production` '
                . 'FROM `al2jt_favoriteProduction` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_production` = :idProd ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idProd', $this->id_al2jt_production, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function deleteFavoriteProduction() {
        $query = 'DELETE FROM `al2jt_favoriteProduction` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_production` = :idProd ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':idProd', $this->id_al2jt_production, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    public function numberOfFavorite() {
        $query = 'SELECT COUNT(`id_al2jt_production`) as `number` '
                . 'FROM `al2jt_favoriteProduction` '
                . 'WHERE `id_al2jt_production` = :idProd ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idProd', $this->id_al2jt_production, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function listeOfFavorite() {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `u`.`active`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_favoriteProduction` AS `fp` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `fp`.`id_al2jt_user` = `u`.`id` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `fp`.`id_al2jt_production` = `p`.`id` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `fp`.`id_al2jt_user` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function numberOfFavoritePerCompany() {
        $query = 'SELECT COUNT(`fp`.`id_al2jt_production`) as `number` '
                . 'FROM `al2jt_favoriteProduction` AS `fp` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `fp`.`id_al2jt_production` = `p`.`id` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `p`.`id_al2jt_company` = `c`.`id` '
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
