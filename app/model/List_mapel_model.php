<?php

class List_mapel_model{

    private $table = "mapel";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getKelas(){
        $this->db->query("SELECT mapel FROM ". $this->table . "");
        // var_dump($this->db->resultSet());
        return $this->db->resultSet();
    }

}