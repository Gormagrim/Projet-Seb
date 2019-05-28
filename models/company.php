<?php

class company {
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
    private $db = NULL;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet_BTP_Test;charset=utf8', 'admin_btp', '123');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public function inserCompany() {
        $query = 'INSERT INTO `al2jt_company` (`name`, `siret`, `address`, `leader`, `phoneNumber`, `id_al2jt_user`, `id_al2jt_city`) '
                . 'VALUES (:name, :siret, :address, :leader, :phoneNumber, :id_al2jt_user, :id_al2jt_city) ' ;
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':siret', $this->siret, PDO::PARAM_INT);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':leader', $this->leader, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_user', $this->id_al2jt_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
}
