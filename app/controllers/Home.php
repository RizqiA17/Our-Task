<?php
session_start();
class Home extends Controller{
    public function index(){
        $data['title'] = 'Data Tugas';
        $data['tugas_solo'] = $this->model('Tugas_solo_model')->getAllTugas();
        $data['tugas_group'] = $this->model('Tugas_group_model')->getAllTugas();
        
        // var_dump($_SESSION['nama']);
        if(isset($_SESSION['nama'])) {
            $this->view("templates/header");
            $this->view("home/index",$data);
            $this->view("templates/footer");
        } else {
            header("Location: http://localhost/ourtaskmvc/public/login");
            $this->view("Login/index");
        }
    }
    public function calender(){
        $this->view("Home/calender");
    }
    public function notification(){
        $this->view("Home/notification");
    }
    public function mapel(){
        $this->view("templates/header");
        $this->view("Home/mapel");
        $this->view("templates/footer");
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location:http://localhost/ourtaskmvc/public/login");
    }
}