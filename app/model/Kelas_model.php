<?php

class Kelas_model{

    private $table = "distribution_kelas";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getKelas(){
        $this->db->query("SELECT id_kelas FROM ". $this->table . " WHERE id_profile = :id");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function getAllSiswaWithKelas($kelas){
        $this->db->query("SELECT id_profile FROM ". $this->table . " WHERE id_kelas = :id");
        $this->db->bind(':id', $kelas);
        return $this->db->resultSet();
    }

}
