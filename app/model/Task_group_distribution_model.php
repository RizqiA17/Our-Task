<?php

class Task_group_distribution_model
{

    private $table = "task_group_distribution";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTask()
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN profile ON " . $this->table . ".id_profile = profile.id JOIN task_group ON " . $this->table . ".id_task = task_group.id JOIN task_group_leader ON " . $this->table . ".id_task = task_group_leader.id_task AND task_group.id = task_group_leader.id_task AND " . $this->table . ".id_leader = task_group_leader.id JOIN mapel ON task_group.id_mapel = mapel.id WHERE " . $this->table . ".id_profile = " . $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function getTaskDetail($id_task, $id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN profile ON " . $this->table . ".id_profile = profile.id JOIN task_group ON " . $this->table . ".id_task = task_group.id JOIN mapel ON task_group.id_mapel = mapel.id WHERE id_task = " . $id_task . " AND id_profile = " . $id);
        return $this->db->resultSet();
    }

    public function taskFile($id_task, $id)
    {
        $this->db->query("SELECT * FROM `task_file` WHERE id_task = " . $id_task . " AND id_profile = " . $id);
        return $this->db->resultSet();
    }

    public function addLeader($id_task, $id_leader, $id_profile, $id_leader_profile)
    {
        $this->db->query("UPDATE " . $this->table . " SET `id_leader` = '" . $id_leader . "', id_profile_leader = :id WHERE " . $this->table . ".id_task = " . $id_task . " AND " . $this->table . ".id_profile = " . $id_profile . ";");
        $this->db->bind(":id", $id_leader_profile);
        // $this->db->query("UPDATE task_group_distribution SET `id_leader` = 168 WHERE id_task = 73 AND 'id_profile' = 152;"); 
        echo $id_task;
        echo $id_leader;
        echo $id_profile."<br>";
        echo $id_leader_profile;
        $this->db->execute();
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_task = " . $id_task . " AND id_profile = " . $id_profile . ";");
        return $this->db->resultSet();
    }

    public function getMember($id_leader)
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN profile ON " . $this->table . ".id_profile = profile.id WHERE id_leader = " . $id_leader . "");
        return $this->db->resultSet();
    }

    public function getMemberInGroup()
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN profile ON " . $this->table . ".id_profile = profile.id WHERE id_leader is not null");
        return $this->db->resultSet();
    }

    public function getAllMember($id_task, $id_leader)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_task = " . $id_task . " id_leader = " . $id_leader . "");
        return $this->db->resultSet();
    }

    public function memberRemaining($id_task)
    {
        $this->db->query("SELECT * FROM task_group_leader WHERE id_task = " . $id_task . "");
    }

    public function getMemberNotInGroup($id_task)
    {
        $this->db->query("SELECT * FROM " . $this->table . " JOIN profile ON " . $this->table . ".id_profile = profile.id WHERE id_task = " . $id_task . " AND id_profile_leader is null");
        return $this->db->resultSet();
    }


    public function distributingTasks($id_task, $id_murid)
    {
        echo $id_murid;

        $this->db->query("INSERT INTO " . $this->table . " (`id`, `id_task`, `id_leader`, `id_profile`) VALUES (NULL, " . $id_task . ", NULL, " . $id_murid . ");");
        $this->db->execute();
        // echo "complited";
    }
}
