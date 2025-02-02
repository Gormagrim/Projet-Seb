<?php

class company extends database {

    public $id = 0;
    public $name = '';
    public $siret = '';
    public $address = '';
    public $presentationPhoto = '';
    public $leader = '';
    public $phoneNumber = '';
    public $numberOfEmploy = '';
    public $id_al2jt_user = '';
    public $id_al2jt_city = '';

    public function __construct() {
        parent::__construct();
    }

    /* Méthode permettant l'insertion de l'entreprise en même temps que l'utilisateur pro */
    public function inserCompany() {
        $query = 'INSERT INTO `al2jt_company` (`name`, `siret`, `address`, `leader`, `phoneNumber`, `id_al2jt_user`, `id_al2jt_city`) '
                . 'VALUES (:name, :siret, :address, :leader, :phoneNumber, :id_al2jt_user, :id_al2jt_city) ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':siret', $this->siret, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':leader', $this->leader, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    /* Méthode permettant d'obtenir l'id de l'entreprise à partir d'un utilisateur Pro */
    public function getCompanyId() {
        $query = 'SELECT  `id` '
                . 'FROM `al2jt_company` '
                . 'WHERE `id_al2jt_user` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    /* Méthodes permettant d'obtenir les information d'un chantier en fonction de son entreprise ou pas */
    public function getCompanyProductionInformation() {
        $query = 'SELECT `p`.`id`, `p`.`title`, `p`.`active`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `comp`.`id_al2jt_user` = :id AND `p`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCompanyProductionInformationByCompId() {
        $query = 'SELECT `p`.`id`, `p`.`title`, `p`.`active`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `comp`.`id` = :id AND `p`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getProductionInformation() {
        $query = 'SELECT `comp`.`id`, `p`.`title`, `u`.`active`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `comp`.`id_al2jt_user` = `u`.`id` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` '
                . 'WHERE `u`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getThisProductionInformation() {
        $query = 'SELECT `p`.`id`, `p`.`title`, `comp`.`name`, `p`.`descriptionText`, `t`.`type`, `cat`.`category`, `photo`.`photo`, `photo`.`description`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_photo` AS `photo` ON `p`.`id` = `photo`.`id_al2jt_production` '
                . 'INNER JOIN `al2jt_typeOfProduction` AS `t` ON `t`.`id` = `p`.`id_al2jt_typeOfProduction` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `p`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_category` AS `cat` ON `t`.`id_al2jt_category` = `cat`.`id` ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function getCompanyList() {
        $query = 'SELECT `comp`.`id`, `comp`.`name`, `u`.`active`, `comp`.`siret`,`comp`.`presentationPhoto`, `comp`.`address`, `comp`.`leader`, `comp`.`phoneNumber`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `comp`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `comp`.`id_al2jt_user` = `u`.`id` '
                . 'WHERE `u`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getOneCompanyInformation() {
        $query = 'SELECT `comp`.`id`, `comp`.`name`, `u`.`active`, `comp`.`siret`,`comp`.`presentationPhoto`, `comp`.`address`, `comp`.`leader`, `comp`.`phoneNumber`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `comp`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `comp`.`id_al2jt_user` = `u`.`id` '
                . 'ORDER BY `comp`.`name` ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function searchCompany($search) {
        $query = 'SELECT `comp`.`id`, `comp`.`name`, `u`.`active`, `comp`.`siret`,`comp`.`presentationPhoto`, `comp`.`address`, `comp`.`leader`, `comp`.`phoneNumber`, `c`.`zipcode`, `c`.`city` '
                . 'FROM `al2jt_company` AS `comp`'
                . 'INNER JOIN `al2jt_city` AS `c` ON `c`.`id` = `comp`.`id_al2jt_city` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `comp`.`id_al2jt_user` = `u`.`id` '
                . 'WHERE `comp`.`name` LIKE :companySearch AND `u`.`active` = 1';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':companySearch', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCompanyInformation() {
        $query = 'SELECT `comp`.`id`, `comp`.`name`, `comp`.`siret`,`comp`.`presentationPhoto`, `comp`.`address`, `comp`.`leader`, `comp`.`numberOfEmploy`, `comp`.`phoneNumber`, `c`.`zipcode`, `c`.`city` '
                . 'FROM al2jt_company AS `comp` '
                . 'INNER JOIN al2jt_city AS `c` ON `c`.`id` = `comp`.`id_al2jt_city` '
                . 'WHERE `comp`.`id` = :id ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
     public function checkProductionNumber() {
        $query = 'SELECT COUNT(`p`.`id`) AS `number` '
                . 'FROM `al2jt_company` AS `comp` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'WHERE `comp`.`id` = :id  AND `p`.`active` = 1 ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function checkProductionNumberWithId() {
        $query = 'SELECT COUNT(`p`.`id`) AS `prodNumber` '
                . 'FROM `al2jt_company` AS `comp` '
                . 'INNER JOIN `al2jt_production` AS `p` ON `comp`.`id` = `p`.`id_al2jt_company` '
                . 'INNER JOIN `al2jt_user` AS `u` ON `comp`.`id_al2jt_user` = `u`.`id` '
                . 'WHERE `u`.`id` = :id  AND `p`.`active` = 1 ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        $this->db = NULL;
    }

}
