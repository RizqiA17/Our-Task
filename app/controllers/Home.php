<?php

class Home extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("home/index");
        $this->view("templates/footer");
    }

    public function mapel(){
        $this->view("templates/header");
        $this->view("home/mapel");
        $this->view("templates/footer");
    }
    public function solo(){
        $this->view("templates/header");
        $this->view("home/soloproject");
        $this->view("templates/footer");
    }
    public function complited(){
        $this->view("templates/header");
        $this->view("home/complitedtask");
        $this->view("templates/footer");
    }
    public function calender(){
        $this->view("Home/calender");
    }
    public function notification(){
        $this->view("Home/notification");
    }
}