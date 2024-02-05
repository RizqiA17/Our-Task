<?php
class Login extends Controller
{
    public function index()
    {
        // if(!isset($_SESSION['nama'])) {
        //     $this->view('Login/register');
        // } else {
        //     $this->view('Login/index');
        // }

        $this->view("Login/index");
    }
    public function signup()
    {
        if (!isset($_SESSION['nama'])) {
            $this->view("Login/register");
        } else {
            $this->view("Login/index");
        }
    }

    public function signin()
    {
        var_dump($_POST["email"]);
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data['signin'] = $this->model('Profile_model')->getAccount($email, $password);
        session_start();
        if (!is_null($data)) {
            // var_dump($data['signin'][0]['nama']);
            $_SESSION['nama'] = $data['signin'][0]['nama'];
            $_SESSION['email'] =  $data['signin'][0]['email'];
            $_SESSION['nis'] =  $data['signin'][0]['nis'];
            header("Location:" . BASEURL . "home");
        }
        // if($data['signin'] == null)
        //     header('Location:'.BASEURL.'404');
        // else
        //     foreach($data['signin'] as $row):
        //         $_SESSION['nama'] = $row['nama'];
        //         $_SESSION['email'] = $row['email'];
        //         // var_dump($row);
        //         header('Location:http://localhost/ourtaskmvc/public/home');
        //         endforeach;
    }
}   
