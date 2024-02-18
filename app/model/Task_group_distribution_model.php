<?php

class Task_group_distribution_model
{

    private $table = "task_solo_distribution";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTask()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_profile = " . $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function distributingTasks($id_task, $id_murid)
    {
        echo $id_murid;

        $this->db->query("INSERT INTO " . $this->table . " (`id`, `id_task`, `id_profile`) VALUES('', " . $id_task . ", " . $id_murid . ");");
        $this->db->execute();
        echo "complited";
    }
}
