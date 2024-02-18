<?php

class Task_solo_distribution_model{

    private $table = "task_solo_distribution";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllTask(){
        $this->db->query("SELECT * FROM " . $this->table ." JOIN task_solo ON ".$this->table.".id_task = task_solo.id JOIN mapel ON task_solo.id_mapel = mapel.id  WHERE id_profile = ". $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function getTaskDetail($id_task, $id){
        $this->db->query("SELECT * FROM " . $this->table ." JOIN task_solo ON ".$this->table.".id_task = task_solo.id JOIN mapel ON task_solo.id_mapel = mapel.id WHERE id_task = ".$id_task. " AND id_profile = ".$id);
        return $this->db->resultSet();
    }

    public function taskFile($id_task, $id){
        $this->db->query("SELECT * FROM `task_file` WHERE id_task = ".$id_task." AND id_profile = ".$id);
        return $this->db->resultSet();
    }

    public function distributingTasks($id_task, $id_murid){
        echo $id_murid; 
        
        $this->db->query("INSERT INTO ".$this->table." (`id`, `id_task`, `id_profile`) VALUES('', ".$id_task.", ".$id_murid.");");
        $this->db->execute();
        echo "complited";
    }

}
