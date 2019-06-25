<?php

class fovoriteCompany extends database {

    public $id = 0;
    public $id_al2jt_company = 0;
    public $id_al2jt_user = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addFavoriteCompany() {
        $query = 'INSERT INTO `al2jt_favoriteCompany` (`id_al2jt_company`, `id_al2jt_user`) '
                . 'VALUES (:id_al2jt_company, :id_al2jt_user) ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id_al2jt_company', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        return $queryExecute->execute();  
    }
    
    public function checkFavoriteCompany() {
        $query = 'SELECT COUNT(`id`) as `number` '
                . 'FROM `al2jt_favoriteCompany` '
                . 'WHERE `id_al2jt_user` = :id AND `id_al2jt_company` = :idCompany ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id_al2jt_user, PDO::PARAM_INT);
         $queryExecute->bindValue(':idCompany', $this->id_al2jt_company, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}