<?php
    // session_start();
class Task_file_model{
    
    private $table = "task_file";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getFile(){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_profile = ".$_SESSION['id']." AND id_task = ".$_SESSION['id_task']);
        $this->db->resultSet();
    }
}