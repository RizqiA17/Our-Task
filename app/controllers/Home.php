<?php

class Home extends Controller{
    public function index(){
        $data['title'] = 'Data Tugas';
        $data['tugas_solo'] = $this->model('Tugas_solo_model')->getAllTugas();
        $data['tugas_group'] = $this->model('Tugas_group_model')->getAllTugas();
        
        // var_dump($data);
        $this->view("templates/header");
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
        $this->view("templates/header");
        $this->view("Home/mapel");
        $this->view("templates/footer");
    }
}