<?php

class Subtask_group_distribution_model{

    private $table = "subtask_group_distribution";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function distributingTasks($id_task, $id_murid){
        echo $id_murid; 
        
        $this->db->query("INSERT INTO ".$this->table." (`id`, `id_subtask`, `id_profile`) VALUES (NULL, ".$id_task.", ".$id_murid.");");
        $this->db->execute();
        // echo "complited";
    }

    public function getDetail($id_profile, $id_task){
        $this->db->query("SELECT * FROM ".$this->table." JOIN subtask_group ON ".$this->table.".id_subtask = subtask_group.id WHERE id_subtask = ".$id_task." AND id_profile = ".$id_profile."");
        return $this->db->resultSet();
    }
}
