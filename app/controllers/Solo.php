<?php
Class Solo extends Controller{
    public function index(){
        $data['title'] = 'Data Tugas';
        $data['tugas'] = $this->model('Tugas_solo_model')->getAllTugas();
        $this->view("templates/header");
        $this->view("Solo/index",$data);
        $this->view("templates/footer");
    }

    public function detail(){
        $this->view("Solo/detail");
    }
}