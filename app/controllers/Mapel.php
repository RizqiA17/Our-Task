<?php

Class Mapel extends Controller{
    public function index(){
        $this->IsSessionExist();

        $data['title'] = 'Mapel';
        $id = $this->model('Kelas_model')->getKelas();
        $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        $this->view("templates/header", $data);
        $this->view("Mapel/index", $data);
        $this->view("templates/footer");        
    }

    public function Task($id){
        $this->IsSessionExist();

        $data['title'] = 'Task';
        $data['task_solo'] = $this->model('Task_solo_distribution_model')->getTaskByClass($id);
        $data['tugas_group'] = $this->model('Task_group_distribution_model')->getTaskbyClass($id);
        $data['group_member'] = $this->model('Task_group_distribution_model')->getMemberInGroup();

        $this->view("templates/header", $data);
        $this->view("Mapel/task", $data);
        $this->view("templates/footer");  
    }
}