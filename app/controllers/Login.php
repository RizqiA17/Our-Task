<?php
class Login extends Controller{
    public function index(){
        $this->view("Login/index");
    }
    public function signup(){
        $this->view("Login/register");
    }
}