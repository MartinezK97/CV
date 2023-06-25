<?php

require_once 'imodel.php';

class Model{
    protected $db;
    protected $pdo;
    function __construct(){
        $this->db = new Database();
    }

    function query($query){
        return $this->db->connect()->query($query);
    }
    function prepare($query){
        
        return $this->db->connect()->prepare($query);
    }

    public function getLastId(){
        return $this->db->pdo->lastInsertId();
    }

   
}

?>