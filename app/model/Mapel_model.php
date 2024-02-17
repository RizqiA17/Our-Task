<?php

class Mapel_model{

    private $table = "distribution_mapel";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getMapel($id){
        $this->db->query("SELECT mapel FROM ".$this->table." JOIN mapel ON ".$this->table.".id_mapel = mapel.id WHERE id_kelas = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

}
