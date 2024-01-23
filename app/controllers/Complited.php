<?php
class Complited extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("Complited/index");
        $this->view("templates/footer");
    }
}