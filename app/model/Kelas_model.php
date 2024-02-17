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
        // $_SESSION['id_kelas'] = $this->db->resultSet();
        // var_dump($this->db->resultSet());
        return $this->db->resultSet();
    }

}
