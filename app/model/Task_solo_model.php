<?php

class Task_solo_model{

    private $table = "task_solo";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addTask($title, $detail, $deadline, $taskmode, $filename, $mapel, $kelas){
        $this->db->query("INSERT INTO ".$this->table." (`id`, `name`, `description`, `task_description_file`, `id_mapel`, `id_kelas`, `id_guru`, `tgl_dibuat`, `tgl_deadline`) VALUES('', '".$title."', '".$detail."', '".$filename."', ".$mapel.", ".$kelas.", ".$_SESSION['id'].", current_timestamp() ,'".$deadline."');");
        $this->db->execute();
        $this->db->query("SELECT id FROM ".$this->table." ORDER BY id DESC LIMIT 1");
        return $this->db->resultSet();
    }

}
