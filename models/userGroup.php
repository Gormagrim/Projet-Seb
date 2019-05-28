<?php

class userGroup {
    public $id = 0;
    public $type = 0;
    private $db = NULL;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet_BTP_Test;charset=utf8', 'admin_btp', '123');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    
    
    public function __destruct() {
        $this->db = NULL;
    }
}