<?php
Class Setting extends Controller{
    public function index(){
        $this->view("Setting/index");
    }

    public function profile(){
        $this->view("Setting/profile");
    }
    public function myprofile(){
        $this->view("Setting/myprofile");
    }
    public function notification(){
        $this->view("Setting/notification");
    }
}