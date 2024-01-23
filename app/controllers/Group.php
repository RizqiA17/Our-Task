<?php
class Group extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("Group/index");
        $this->view("templates/footer");
    }

    public function detail(){
        $this->view("Group/groupdetail");
    }

    public function leader(){
        $this->view("Group/leader");
    }

    // public function task(){
    //     $this->view("Group/task");
    // }
}