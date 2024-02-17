<?php
session_start();
class Home extends Controller{
    public function index(){
        $data['title'] = 'Home';
        $data['task_solo'] = $this->model('Tugas_solo_model')->getAllTugas();
        $data['tugas_group'] = $this->model('Tugas_group_model')->getAllTugas();
        
            $this->view("templates/header",$data);
            $this->view("home/index",$data);
            $this->view("templates/footer");
    }
    public function calender(){
        $this->view("Home/calender");
    }
    public function notification(){
        $this->view("Home/notification");
    }
    public function mapel(){
        $data['title'] = 'Mapel';
        $id = $this->model('Kelas_model')->getKelas();
        $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        $this->view("templates/header", $data);
        $this->view("Home/mapel", $data);
        $this->view("templates/footer");
    }

    public function addtask(){
        $this->view("Home/addtask");
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:http://localhost/ourtaskmvc/public/login");
    }
}