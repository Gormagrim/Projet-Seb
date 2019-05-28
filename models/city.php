<?php

class city {
    public $id = 0;
    public $city = '';
    public $zipcode = '';
    private $db = NULL;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet_BTP_Test;charset=utf8', 'admin_btp', '123');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
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
    
    public function __destruct() {
        $this->db = NULL;
    }
}
