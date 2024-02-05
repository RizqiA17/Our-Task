<?php
class Setting extends Controller
{
    public function index()
    {
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
    public function ChangeEmail()
    {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data['ChangeEmail'] = $this->model("Profile_model")->VallPass();
        if (!is_null($data)) {
            if ($password == $data['ChangeEmail'][0]['password']) {
                $this->model("Profile_model")->ChangeEmail($email);
                $_SESSION['email'] = $email;
                header("Location:".BASEURL."home");
            } 
        }
    }
}
