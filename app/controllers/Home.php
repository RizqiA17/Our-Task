<?php
session_start();
class Home extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['status'])){
            header("Location:".BASEURL."Login");
        }
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
        // $this->model('Mapel_model')->mengajar();
        $data['kelas']=$this->model('Mapel_model')->mengajar();
        $i = 0;
        foreach($data['kelas'] as $kelas){
            $data['siswa'.$i]=$this->model('Kelas_model')->getSiswa($kelas['id_kelas']);
            $i++;
        }
        // var_dump($data);
        $this->view("Home/addtask", $data);
    }

    public function addnewtask()
    {
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline = date('Y-m-d', strtotime($_POST['deadline']));
        // $taskmode = $_POST['mode'];
        // $filename = $_POST['file-name'];
        $kelas = $_POST['kelas'];
        // echo $title . $detail . $deadline . $taskmode . $filename . $kelas . $_SESSION['mapel'];
        // $addTask = $this->model('Task_' . $taskmode . '_model')->addTask($title, $detail, $deadline, $taskmode, $filename, $_SESSION['mapel'], $kelas);
        $addTask = $this->model('Task_solo_model')->addTask($title, $detail, $deadline,'', $_SESSION['mapel'], $kelas);
        var_dump($addTask);
        $murid = $this->model('Kelas_model')->getAllSiswaWithKelas($kelas);
        var_dump($murid);
        for ($i = 0; $i < sizeof($murid); $i++) {
            $this->model('Task_solo_distribution_model')->distributingTasks($addTask[0]['id'], $murid[$i]['id_profile']);
        }
        header("Location:" . BASEURL . "home");
    }
    public function getDetail()
    {
        $id_task = $_POST['idtask'];
        echo $id_task;
        // session_start();
        // $data['task'] = $this->model('Task_solo_distribution_model')->getTaskDetail($_SESSION['id_task'], $_SESSION['id']);
        // $data['task_file'] = $this->model('Task_solo_distribution_model')->taskFile($_SESSION['id_task'], $_SESSION['id']);
        // var_dump($data);
        // $this->view("Solo/detail", $data);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location:http://localhost/ourtaskmvc/public/login");
    }
}
