<?php

class Task_group_distribution_model
{

    private $table = "task_group_distribution";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllTask(){
        $this->db->query("SELECT * FROM " . $this->table ." JOIN task_group ON ".$this->table.".id_task = task_group.id JOIN mapel ON task_group.id_mapel = mapel.id  WHERE id_profile = ". $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function getTaskDetail($id_task, $id){
        $this->db->query("SELECT * FROM " . $this->table ." JOIN task_group ON ".$this->table.".id_task = task_group.id JOIN mapel ON task_group.id_mapel = mapel.id JOIN profile ON ".$this->table.".id_profile = profile.id WHERE id_task = ".$id_task. " AND id_profile = ".$id);
        return $this->db->resultSet();
    }

    public function taskFile($id_task, $id){
        $this->db->query("SELECT * FROM `task_file` WHERE id_task = ".$id_task." AND id_profile = ".$id);
        return $this->db->resultSet();
    }

    public function addLeader($id_task, $id_leader, $id_profile){
        $this->db->query("UPDATE ".$this->table." SET `id_leader` = '".$id_leader."' WHERE ".$this->table.".id_task = ".$id_task." AND ".$this->table.".id_profile = ".$id_profile.";"); 
        // $this->db->query("UPDATE task_group_distribution SET `id_leader` = 168 WHERE id_task = 73 AND 'id_profile' = 152;"); 
        $this->db->execute();
    }

    public function getMember($id_task, $id){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_task = ".$id_task."");
        return $this->db->resultSet();

    }

    public function distributingTasks($id_task, $id_murid){
        echo $id_murid; 
        
        $this->db->query("INSERT INTO ".$this->table." (`id`, `id_task`, `id_leader`, `id_profile`) VALUES (NULL, ".$id_task.", NULL, ".$id_murid.");");
        $this->db->execute();
        // echo "complited";
    }
}
