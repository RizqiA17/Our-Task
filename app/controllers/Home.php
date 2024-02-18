<?php
session_start();
class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        if ($_SESSION['status'] == 'guru') {
            $data['task_solo'] = $this->model('Task_solo_model')->getTaskForTeacher();
            $data['tugas_group'] = $this->model('Task_group_model')->getTaskForTeacher();
        } else {
            $data['task_solo'] = $this->model('Task_solo_distribution_model')->getAllTask();
            $data['tugas_group'] = $this->model('Task_group_distribution_model')->getAllTask();
        }
        // var_dump($data['task_solo']);

        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
    public function calender()
    {
        $this->view("Home/calender");
    }
    public function notification()
    {
        $this->view("Home/notification");
    }
    public function mapel()
    {
        $data['title'] = 'Mapel';
        $id = $this->model('Kelas_model')->getKelas();
        $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        $this->view("templates/header", $data);
        $this->view("Home/mapel", $data);
        $this->view("templates/footer");
    }

    public function addtask()
    {
        $this->view("Home/addtask");
    }

    public function addnewtask()
    {
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline = date('Y-m-d', strtotime($_POST['deadline']));
        $taskmode = $_POST['mode'];
        $filename = $_POST['file-name'];
        $kelas = $_POST['kelas'];
        echo $title . $detail . $deadline . $taskmode . $filename . $kelas . $_SESSION['mapel'];
        $addTask = $this->model('Task_' . $taskmode . '_model')->addTask($title, $detail, $deadline, $taskmode, $filename, $_SESSION['mapel'], $kelas);
        var_dump($addTask);
        $murid = $this->model('Kelas_model')->getAllSiswaWithKelas($kelas);
        // var_dump($murid);
        for ($i = 0; $i < sizeof($murid); $i++) {
            $this->model('Task_solo_distribution_model')->distributingTasks($addTask[0]['id'], $murid[$i]['id_profile']);
        }
        header("Location:" . BASEURL . "home");
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location:http://localhost/ourtaskmvc/public/login");
    }
}
