<?php

class production extends database {

    public $id = 0;
    public $title = '';
    public $descriptionText = '';
    public $id_al2jt_company = 0;
    public $id_al2jt_typeOfProduction = 0;
    public $id_al2jt_city = 0;
    public $id_al2jt_user = 0;
    public $photo = '';
    public $description = '';

    public function __construct() {
        parent::__construct();
    }

    public function inserProduction() {
        $query = 'INSERT INTO `al2jt_production` (`title`, `descriptionText`, `id_al2jt_company`, `id_al2jt_typeOfProduction`, `id_al2jt_city`) '
                . 'VALUES (:title, :descriptionText, :id_al2jt_company, :id_al2jt_typeOfProduction, :id_al2jt_city) ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':descriptionText', $this->descriptionText, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_company', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_typeOfProduction', $this->id_al2jt_typeOfProduction, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        $queryExecute->execute();
        return $this->db->lastInsertId();
    }

    public function updateProduction() {
        $query = 'UPDATE `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'SET `p`.`title` = :title, `p`.`descriptionText` = :descriptionText, `photo`.`photo` = :photo, `photo`.`description` = :description, `p`.`id_al2jt_typeOfProduction` = :productionType '
                . 'WHERE `p`.`id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':descriptionText', $this->descriptionText, PDO::PARAM_STR);
        $queryExecute->bindValue(':photo', $this->photo, PDO::PARAM_STR);
        $queryExecute->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryExecute->bindValue(':productionType', $this->id_al2jt_typeOfProduction, PDO::PARAM_INT);

        return $queryExecute->execute();
    }

    public function getOneProductionInformation() {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `p`.`id` = :id';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function getProductionCategory() {
        $query = 'SELECT `cat`.`category` '
                . 'FROM `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `t`.`type` = :type ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function deleteProduction() {
        $query = 'DELETE FROM `al2jt_production` '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    public function searchProduction($search) {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `t`.`type` LIKE :productionSearch';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':productionSearch', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function searchProductionByZipcode($search) {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `c`.`zipcode` LIKE :zipSearch';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':zipSearch', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
     public function searchProductionByType($search) {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `t`.`id`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_production` AS `p` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `t`.`type` LIKE :type';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':type', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
