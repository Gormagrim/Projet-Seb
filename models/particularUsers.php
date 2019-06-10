<?php

class particularUsers extends database {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $phoneNumber = '';
    public $address = '';
    public $mail = '';
    public $password = '';
    public $id_al2jt_userGroup = 0;
    public $id_al2jt_city = 0;

    public function __construct() {
        parent::__construct();
    }

    public function inserParticularUser() {
        $query = 'INSERT INTO `al2jt_user` (`lastname`, `firstname`, `phoneNumber`, `address`, `mail`, `password`, `id_al2jt_userGroup`, `id_al2jt_city`) '
                . 'VALUES (:lastname, :firstname, :phoneNumber, :address, :mail, :password, :id_al2jt_userGroup, :id_al2jt_city) ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_userGroup', $this->id_al2jt_userGroup, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        $queryExecute->execute();
        return $this->db->lastInsertId();
    }

    /**
     * Méthode permettant de voir si l'utilisateur existe dans la base de données
     * Je l'utilise à l'inscription pour ne pas inscrire deux fois le même utilisateur
     * et dans la connexion pour vérifier si l'utilisateur existe dans la base de données
     * @return object
     */
    public function checkUser() {
        $query = 'SELECT COUNT(`id`) as `number` '
                . 'FROM `al2jt_user` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant de récupérer le hash du mot de passe, on pourra le 
     * comparer à celui tapé lors de la connexion
     * @return object
     */
    public function getHashByMail() {
        $query = 'SELECT `password`, `id`, `id_al2jt_userGroup` '
                . 'FROM `al2jt_user` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function getUserInformation() {
        $query = 'SELECT `u`.`id`, `u`.`lastname`, `u`.`firstname`, `u`.`phoneNumber`, `u`.`address`, `u`.`mail`, `ug`.`type`, `u`.`id_al2jt_city`, `c`.`city`, `c`.`zipcode` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `u`.`id_al2jt_city` = `c`.`id` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `u`.`id` = :id ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
         
    public function getProfessionnalInformation() {
        $query = 'SELECT `u`.`id`, `u`.`lastname`, `u`.`firstname`,`u`.`mail`, `u`.`id_al2jt_city`, `c`.`address`, `city`.`city`, `city`.`zipcode`, `ug`.`type`, `c`.`name`, `c`.`siret`, `c`.`presentationPhoto`, `c`.`leader`, `c`.`phoneNumber`, `c`.`numberOfEmploy` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `u`.`id` = `c`.`id_al2jt_user` '
                . 'INNER JOIN `al2jt_city` AS `city` ON `u`.`id_al2jt_city` = `city`.`id` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `u`.`id` = :id ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function updateUserProfil() {
        $query = 'UPDATE `al2jt_user` '
                . 'SET `lastname` = :lastname, `firstname` = :firstname, `phoneNumber` = :phoneNumber, `address` = :address, `mail` = :mail, `id_al2jt_city` = :id_al2jt_city '
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        return $queryExecute->execute();  
    }
    
    public function updateProfessionnalUserProfil() {
        $query = 'UPDATE `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `u`.`id` = `c`.`id_al2jt_user` '
                . 'INNER JOIN `al2jt_city` AS `city` ON `u`.`id_al2jt_city` = `city`.`id` '
                . 'SET `u`.`lastname` = :lastname, `u`.`firstname` = :firstname, `u`.`phoneNumber` = :phoneNumber, `u`.`address` = :address, `u`.`mail` = :mail, `u`.`id_al2jt_city` = :id_al2jt_city, `c`.`name` = :name, `c`.`siret` = :siret, `c`.`presentationPhoto` = :presentationPhoto, `c`.`leader` = :leader, `c`.`numberOfEmploy` = :numberOfEmploy  '
                . 'WHERE `u`.`id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':siret', $this->siret, PDO::PARAM_STR);
        $queryExecute->bindValue(':presentationPhoto', $this->presentationPhoto, PDO::PARAM_STR);
        $queryExecute->bindValue(':leader', $this->leader, PDO::PARAM_STR);
        $queryExecute->bindValue(':numberOfEmploy', $this->numberOfEmploy, PDO::PARAM_STR);
        return $queryExecute->execute();  
    }
    
    public function deleteUser() {
        $query = 'DELETE FROM `al2jt_user` '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function __destruct() {
        $this->db = NULL;
    }

}