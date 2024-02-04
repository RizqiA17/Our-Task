<?php
class Complited extends Controller{
    public function index(){
        $data['title'] = 'Data Tugas';
        $data['tugas_solo'] = $this->model('Tugas_solo_model')->getAllTugas();
        $data['tugas_group'] = $this->model('Tugas_group_model')->getAllTugas();

        $this->view("templates/header");
        $this->view("Complited/index", $data);
        $this->view("templates/footer");
    }
}