<?php

class Tugas_group_model{
    private $table = "tugas_group";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllTugas(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
}