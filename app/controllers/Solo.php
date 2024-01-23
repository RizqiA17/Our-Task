<?php
Class Solo extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("Solo/index");
        $this->view("templates/footer");
    }

    public function detail(){
        $this->view("Solo/solodetail");
    }
}