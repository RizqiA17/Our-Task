<?php
class Login extends Controller{
    public function index(){
        $this->view("Login/index");
    }
    public function signup(){
        $this->view("Login/register");
    }

    public function signin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $data['signin'] = $this->model('Profile_model')->getAccount($email, $password);

        session_start();
        if($data['signin'] == null)
            header('Location:'.BASEURL.'404');
        else
            foreach($data['signin'] as $row):
                $_SESSION['nis'] = 'berisi';
                // var_dump($row);
                header('Location:http://localhost/ourtaskmvc/public/home');
                endforeach;
    }
}