<?php

class particularUsers {
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $phoneNumber = 0;
    public $address = '';
    public $mail = '';
    public $password = '';
    public $id_al2jt_userGroup = 0;
    public $id_al2jt_city = 0;
    private $db = NULL;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet_BTP_Test;charset=utf8', 'admin_btp', '123');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public function inserParticularUser() {
        $query = 'INSERT INTO `al2jt_user` (`lastname`, `firstname`, `phoneNumber`, `address`, `mail`, `password`, `id_al2jt_userGroup`, `id_al2jt_city`) '
                . 'VALUES (:lastname, :firstname, :phoneNumber, :address, :mail, :password, :id_al2jt_userGroup, :id_al2jt_city) ' ;
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_userGroup', $this->id_al2jt_userGroup, PDO::PARAM_INT); 
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    
    
    public function __destruct() {
        $this->db = NULL;
    }
}

