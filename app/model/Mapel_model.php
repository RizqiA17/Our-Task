<?php

class Mapel_model{

    private $table = "distribution_mapel";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getMapel($id){
        $this->db->query("SELECT * FROM ".$this->table." JOIN mapel ON ".$this->table.".id_mapel = mapel.id WHERE id_kelas = :id or id_profile = $id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function mengajar(){
        // echo$_SESSION['id'];
        $this->db->query("SELECT * FROM ".$this->table." JOIN kelas ON ".$this->table.".id_kelas = kelas.id WHERE id_profile = ".$_SESSION['id']);
        return $this->db->resultSet();        
    }

    

}
