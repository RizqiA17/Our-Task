<?php
class Setting extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['status'])){
            header("Location:".BASEURL."Login");
        }
        $this->view("Setting/index");
    }

    public function profile()
    {
        $this->view("Setting/profile");
    }
    public function myprofile()
    {
        $this->view("Setting/myprofile");
    }
    public function notification()
    {
        $this->view("Setting/notification");
    }
    public function security()
    {
        $this->view("Setting/security");
    }
    public function ChangeEmail()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data['ChangeEmail'] = $this->model("Profile_model")->VallPass();
        var_dump($data);
        if (!is_null($data)) {
            if ($password == $data['ChangeEmail'][0]['password']) {
                $this->model("Profile_model")->ChangeEmail($email);
                $_SESSION['email'] = $email;
                header("Location:".BASEURL."home");
            } 
        }
    }
}
