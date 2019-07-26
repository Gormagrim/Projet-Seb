<?php

/*
 * MODEL de l'utilisateur
 * 
 * je crée ma classe particularUsers (objet) dans mon model
 * Je crée une classe par table présente dans ma base de données
 * 
 */

class particularUsers extends database {
    
    /*
     * je crée mes attributs en fonction des champs de ma table user
     * $id est un attribut
     * un attribut est égal à un champ
     * 0 de l'attribut $id est une valeur par défaut 
     * je mets une valeur par défaut pour sécuriser l'affichage
     * On définit nos attributs en "public" pour pouvoir les appeler en dehors de ma classe 
     */

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $phoneNumber = '';
    public $address = '';
    public $mail = '';
    public $password = '';
    public $id_al2jt_userGroup = 0;
    public $id_al2jt_city = 0;
    public $active = 0;
    public $cle = '';
    
    /*
     * Attention si je crée la méthode magique "contruct", je dois également crée la méthode magique "destruct"
     * Entre ses deux méthodes je crée des méthodes me permettant l'affichage des informations dont j'ai besoin
     */

    public function __construct() {
        parent::__construct();
    }

    public function inserParticularUser() {
        /*
         * dans ma variable $query, je crée une requête SQL pour insérer dans la table particularUsers l'ensemble des attributs qui se trouvent entre parenthèses 
         * j'utilise le mot-clé "value" pour insérer mes données dans la tables particularUsers 
         * On utilise les marqueurs nominatifs pour récupèrer les données renseignés dans le formulaire par l'utilisateur
         * 
         */
        $query = 'INSERT INTO `al2jt_user` (`lastname`, `firstname`, `phoneNumber`, `address`, `mail`, `password`, `id_al2jt_userGroup`, `id_al2jt_city`, `active`, `cle`) '
                . 'VALUES (:lastname, :firstname, :phoneNumber, :address, :mail, :password, :id_al2jt_userGroup, :id_al2jt_city, :active, :cle) ';
        /*
         * Une requête préparée (prepare($query)), c'est en quelque sorte une requête stockée en mémoire (pour la session courante), et que l'on peut exécuter à loisir (execute())
         */
        $queryExecute = $this->db->prepare($query);
        /*
         * bindValue est une méthode qui nous permet de sécuriser ma requête
         * il faut renseigner 3 données : 
         *  - le marqueur nominatif
         *  - la valeur à lui associer ($this->attribut) 
         *  - le type de valeur à envoyer, on utilise pour cela les constantes de PDO. (PDO::PARAM_INT (pour un entier) ou PDO::PARAM_STR (pour une chaîne de caractères))
         */

        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_userGroup', $this->id_al2jt_userGroup, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        $queryExecute->bindValue(':active', $this->active, PDO::PARAM_BOOL);
        $queryExecute->bindValue(':cle', $this->cle, PDO::PARAM_STR);
        /*
         * return me sert à exécuter la requête. Je le fais sur $this->db->lastInsertId() pour récupérer la dernière id inserée dans la table car je n'ai pas souhaité faire de transaction.
         */
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
        $query = 'SELECT `password`, `id`, `id_al2jt_userGroup`, `active`, `cle`  '
                . 'FROM `al2jt_user` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    /* Méthode permettant d'obtenir les informations d'un utilisateur particulier */
    public function getUserInformation() {
        $query = 'SELECT `u`.`id`, `u`.`lastname`, `u`.`firstname`, `u`.`phoneNumber`, `u`.`address`, `u`.`mail`,`u`.`active`, `u`.`cle`, `ug`.`type`, `u`.`id_al2jt_city`, `c`.`city`, `c`.`zipcode` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `u`.`id_al2jt_city` = `c`.`id` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `u`.`id` = :id ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    /* M2thode permettant d'obtenir les information d'un utilisateur Pro et de son entreprise */     
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
    
    /* Méthode permettant l'update d'un utilisateur particulier */
    public function updateUserProfil() {
        $query = 'UPDATE `al2jt_user` '
                . 'SET `lastname` = :lastname, `firstname` = :firstname, `phoneNumber` = :phoneNumber, `address` = :address, `id_al2jt_city` = :id_al2jt_city '
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        return $queryExecute->execute();  
    }
    /* Méthode permettant l'update d'un utilisateur Pro et de son entreprise */
    
    public function updateProfessionnalUserProfil() {
        $query = 'UPDATE `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `u`.`id` = `c`.`id_al2jt_user` '
                . 'INNER JOIN `al2jt_city` AS `city` ON `u`.`id_al2jt_city` = `city`.`id` '
                . 'SET `u`.`lastname` = :lastname, `u`.`firstname` = :firstname, `c`.`phoneNumber` = :phoneNumber, `c`.`address` = :address, `u`.`id_al2jt_city` = :id_al2jt_city, `c`.`name` = :name, `c`.`siret` = :siret, `c`.`presentationPhoto` = :presentationPhoto, `c`.`leader` = :leader, `c`.`numberOfEmploy` = :numberOfEmploy  '
                . 'WHERE `u`.`id` = :id ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_city', $this->id_al2jt_city, PDO::PARAM_INT);
        $queryExecute->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryExecute->bindValue(':siret', $this->siret, PDO::PARAM_STR);
        $queryExecute->bindValue(':presentationPhoto', $this->presentationPhoto, PDO::PARAM_STR);
        $queryExecute->bindValue(':leader', $this->leader, PDO::PARAM_STR);
        $queryExecute->bindValue(':numberOfEmploy', $this->numberOfEmploy, PDO::PARAM_STR);
        return $queryExecute->execute();  
    }
    
    /* Méthode permettant la desactivation d'un utilisateur quel qu'il soit. */
    public function deleteUser() {
        $query = 'UPDATE `al2jt_user` '
                . 'SET `active` = 0 '
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    /* Méthode permettant l'activation d'un utilisateur quel qu'il soit. */
    public function activeUser() {
        $query = 'UPDATE `al2jt_user` '
                . 'SET `active` = 1 '
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
        
    }
    
    /* Méthode permettant de compter le nombre d'utilisateur Particuliers */
    public function countParticularUser() {
        $query = 'SELECT COUNT(`u`.`id`) AS `user`, `ug`.`type` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `ug`.`type` = \'Particulier\' AND `u`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    /* Méthode permettant de compter le nombre d'utilisateur Pro et donc le nombre d'entreprise */
    public function countProfessionnalUser() {
        $query = 'SELECT COUNT(`u`.`id`) AS `user`, `ug`.`type` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `ug`.`type` = \'Professionnel\' AND `u`.`active` = 1 ';
               
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    /* Méthode permettant d'obtenir la liste des utilisateur Particuliers pour l'administrateur */
    public function getPartUserList() {
        $query = 'SELECT `u`.`id`, `u`.`active`, `u`.`lastname`, `u`.`firstname`, `u`.`phoneNumber`, `u`.`address`, `u`.`mail`, `ug`.`type`, `u`.`id_al2jt_city`, `c`.`city`, `c`.`zipcode` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_city` AS `c` ON `u`.`id_al2jt_city` = `c`.`id` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `ug`.`id` = 2 '
                . 'GROUP BY `u`.`id` ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    /* Méthode permettant d'obtenir la liste des entreprises pour l'administrateur */
    public function getProUserList() {
        $query = 'SELECT `u`.`id`, `u`.`lastname`, `u`.`active`, `u`.`firstname`,`u`.`mail`, `u`.`id_al2jt_city`, `c`.`address`, `city`.`city`, `city`.`zipcode`, `ug`.`type`, `c`.`name`, `c`.`siret`, `c`.`presentationPhoto`, `c`.`leader`, `c`.`phoneNumber`, `c`.`numberOfEmploy` '
                . 'FROM `al2jt_user` AS `u` '
                . 'INNER JOIN `al2jt_company` AS `c` ON `u`.`id` = `c`.`id_al2jt_user` '
                . 'INNER JOIN `al2jt_city` AS `city` ON `u`.`id_al2jt_city` = `city`.`id` '
                . 'INNER JOIN `al2jt_userGroup` AS `ug` ON `u`.`id_al2jt_userGroup` = `ug`.`id` '
                . 'WHERE `ug`.`id` = 3 ';
        
        $queryExecute = $this->db->prepare($query);
        $queryExecute->execute();
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        $this->db = NULL;
    }

}