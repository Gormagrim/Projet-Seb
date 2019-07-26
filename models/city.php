<?php

class city extends database {
    public $id = 0;
    public $city = '';
    public $zipcode = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    /* Méthode permettant de rechercher une ville par son nom */
    public function searchCity($search) {
        $query = 'SELECT `id`, `zipcode`, `city` '
                . 'FROM `al2jt_city` '
                . 'WHERE `city` LIKE :search';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':search', $search.'%', PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    /* Méthode permettant de rechercher une ville par son code postal */
    public function searchZipcode($zipSearch) {
        $query = 'SELECT `id`, `zipcode`, `city` '
                . 'FROM `al2jt_city` '
                . 'WHERE `zipcode` LIKE :zipcodeSearch';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':zipcodeSearch', $zipSearch.'%', PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        $this->db = NULL;
    }
}
