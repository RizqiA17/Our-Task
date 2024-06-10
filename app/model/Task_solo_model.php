<?php

class Task_solo_model
{

    private $table = "task_solo";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTask()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getTaskForTeacher()
    {
        $this->db->query("SELECT task_solo.id, name, grade, tgl_dibuat, tgl_deadline FROM " . $this->table . " JOIN kelas ON " . $this->table . ".id_kelas = kelas.id WHERE id_guru = :id");
        $this->db->bind(':id', $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function getTaskDetail($id_task)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = " . $id_task);
        return $this->db->single();
    }

    public function addTask($title, $detail, $deadline, $filename, $mapel, $kelas)
    {
        $this->db->query("INSERT INTO " . $this->table . " (`id`, `name`, `description`, `task_description_file`, `id_mapel`, `id_kelas`, `id_guru`, `tgl_dibuat`, `tgl_deadline`) VALUES (NULL, '" . $title . "', '" . $detail . "', '" . $filename . "', " . $mapel . ", " . $kelas . ", " . $_SESSION['id'] . ", current_timestamp() ,'" . $deadline . "');");
        $this->db->execute();
        $this->db->query("SELECT id FROM " . $this->table . " ORDER BY id DESC LIMIT 1");
        return $this->db->resultSet();
    }

    public function addAttachment($filename, $id)
    {
        $this->db->query("UPDATE " . $this->table . " SET task_description_file = '" . $filename . "' WHERE id = " . $id);
        $this->db->execute();
    }
}
