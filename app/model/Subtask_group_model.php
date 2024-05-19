
<?php

class Subtask_group_model{

    private $table = "subtask_group";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addtask($title, $detail, $deadline, $filename, $id_task){
        $this->db->query("INSERT INTO ".$this->table." (id, name, description, description_file, deadline, id_task) VALUES (null, '".$title."', '". $detail ."', '". $filename ."', '".$deadline."', ".$id_task.")");
        $this->db->execute();
        $this->db->query("SELECT id FROM ".$this->table." ORDER BY id DESC LIMIT 1");
        return $this->db->resultSet();
    }

    public function getSubtask($id_task){
        $this->db->query("SELECT * FROM " . $this->table ." WHERE id_task = ".$id_task );
        return $this->db->resultSet();
    }

    public function complited($id_subtask){
        $this->db->query("UPDATE ".$this->table." SET `progress` = 'finish' WHERE `".$this->table."`.`id` = ".$id_subtask);
        $this->db->execute();
    }
}