<?php

class production extends database {

    public $id = 0;
    public $title  = '';
    public $descriptionText  = '';
    public $id_al2jt_company = 0;
    public $id_al2jt_typeOfProduction = 0;
    public $id_al2jt_city = 0;
    public $id_al2jt_user = 0;
    
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
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `photo`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `p`.`id_al2jt_city` = `c`.`id` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `p`.`id_al2jt_typeOfProduction` = `t`.`id` '
                . 'INNER JOIN `al2jt_company` AS `comp` ON `p`.`id_al2jt_company` = `comp`.`id` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id`'
                . 'SET `p`.`id` = :id, `p`.`title` = :title, `comp`.`name` = :name, `p`.`descriptionText` = :descriptionText, `t`.`type` = :type, `cat`.`category` = :category, `photo`.`photo` = :photo, `photo`.`description` = :description, `c`.`zipcode` = :zipcode, `c`.`city` = :city '
                . 'WHERE `comp`.`id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':descriptionText', $this->descriptionText, PDO::PARAM_STR);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->bindValue(':category', $this->category, PDO::PARAM_STR);
        $queryExecute->bindValue(':photo', $this->photo, PDO::PARAM_INT);
        $queryExecute->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryExecute->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
        $queryExecute->bindValue(':city', $this->city, PDO::PARAM_STR);
        return $queryExecute->execute();  
    }
    
    public function __destruct() {
        $this->db = NULL;
    }
    
}

