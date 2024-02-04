<?php
class Group extends Controller{
    public function index(){
        $data['title'] = 'Data Tugas';
        $data['tugas'] = $this->model('Tugas_group_model')->getAllTugas();
        $this->view("templates/header");
        $this->view("Group/index",$data);
        $this->view("templates/footer");
    }

    public function detail(){
        $this->view("Group/detail");
    }

    public function leader(){
        $this->view("Group/leader");
    }

    // public function task(){
    //     $this->view("Group/task");
    // }
}