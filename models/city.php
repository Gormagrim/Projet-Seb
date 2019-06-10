<?php

class city extends database {
    public $id = 0;
    public $city = '';
    public $zipcode = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function searchCity($search) {
        $query = 'SELECT `id`, `zipcode`, `city` '
                . 'FROM `al2jt_city` '
                . 'WHERE `city` LIKE :search';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':search', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    // METHODE CREE AU CAS OU, PAS DE RECHERCHE AU CODE POSTAL AU 06/06/2019 !
    
    public function searchZipcode($zipSearch) {
        $query = 'SELECT `id`, `zipcode`, `city` '
                . 'FROM `al2jt_city` '
                . 'WHERE `zipcode` LIKE :zipSearch';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':zipSearch', $zipSearch.'%', PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        $this->db = NULL;
    }
}
