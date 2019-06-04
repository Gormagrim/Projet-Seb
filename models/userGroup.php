<?php

class userGroup extends database {
    public $id = 0;
    public $type = 0;
    
    public function __construct() {
        parent::__construct();
    }
    
     
    public function __destruct() {
        $this->db = NULL;
    }
}