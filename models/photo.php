<?php

class photo extends database {

    public $id = 0;
    public $photo  = '';
    public $title  = '';
    public $description  = '';
    public $id_al2jt_production = 0;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function inserPhoto() {
        $query = 'INSERT INTO `al2jt_photo` (`photo`, `title`, `description`, `id_al2jt_production`) '
                . 'VALUES (:photo, :title, :description, :id_al2jt_production) ';
        $queryExecute = $this->db->prepare($query);

        $queryExecute->bindValue(':photo', $this->photo, PDO::PARAM_STR);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_al2jt_production', $this->id_al2jt_production, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
    public function __destruct() {
        $this->db = NULL;
    }
    
}