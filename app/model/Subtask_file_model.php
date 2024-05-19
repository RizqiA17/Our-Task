<?php
// session_start();
class Subtask_file_model
{

    private $table = "subtask_file";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getFile()
    {
        $this->db->query("SELECT * FROM `" . $this->table . "` WHERE id_subtask = :id_task AND id_profile = :id");
        $this->db->bind(":id_task", $_SESSION['id_subtask']);
        $this->db->bind(":id", $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function addFile($data, $file_name)
    {
        $this->db->query("INSERT INTO " . $this->table . " (`id`, `id_subtask`, `id_profile`, `task_answer_file`, `name`, `date`) VALUES (NULL, :id_task, :id_profile, :file_name, :name, CURRENT_TIMESTAMP)");
        $this->db->bind(":id_task", $_SESSION['id_subtask']);
        var_dump($_SESSION['id_task']);
        $this->db->bind(":id_profile", $_SESSION['id']);
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":file_name", $file_name);

        $this->db->execute();
    }
}
