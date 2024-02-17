<?php

class Tugas_solo_model{
    private $table = "task_solo";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllTugas(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
}