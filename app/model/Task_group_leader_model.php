<?php

class Task_group_leader_model extends Controller{
    private $table = "task_group_leader";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addLeader($leader_id, $task_id){
        $this->db->query("INSERT INTO ".$this->table." (`id`, `id_task`, `id_profile`) VALUES (NULL, :id_task, :id_leader); ");
        $this->db->bind(":id_task", $task_id);
        $this->db->bind(":id_leader", $leader_id);
        $this->db->execute();
        $this->db->query("SELECT * FROM ".$this->table." where id_task = :id_task; ");
        $this->db->bind(":id_task", $task_id);
        return $this->db->resultSet();
    }

    public function getAllLeader($id_task){
        $this->db->query("SELECT * FROM " . $this->table ." WHERE id_task = ".$id_task);
        return $this->db->resultSet();
    }

    public function getMaxMember($id_task){
        $this->db->query("SELECT id FROM ".$this->table." WHERE id_task = ".$id_task);
        return $this->db->resultSet();
    }
}