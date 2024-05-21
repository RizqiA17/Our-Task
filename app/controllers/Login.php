<?php
class Login extends Controller
{
    public function index()
    {
        $this->view("Login/index");
    }

    public function signup()
    {
        // if (!isset($_SESSION['nama'])) {
        $this->view("Login/register");
        // } else {
        //     $this->view("Login/index");
        // }
    }

    public function signin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data['signin'] = $this->model('Profile_model')->getAccount($email, $password);
        var_dump($data);

        if (!empty($data['signin'])) {
            $_SESSION['nama'] = $data['signin'][0]['name'];
            $_SESSION['email'] =  $data['signin'][0]['email'];
            $_SESSION['id'] = $data['signin'][0]['id'];
            $_SESSION['status'] = $data['signin'][0]['status'];
            $mapel = $this->model('Mapel_model')->getMapel(841);
            $_SESSION['mapel'] = $mapel[0]['id_mapel'];

            header("Location:" . BASEURL . "home");
        } else {
            $_SESSION['login_err'] = "Incorrect Email or Password";
            header("Location:" . BASEURL . "login");
        }
    }

    public function register()
    {

        $no_induk = $_POST['no_induk'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cnfrmpass = $_POST['cnfrmpass'];
        $cek_ni = $this->model('Profile_model')->cekNI($no_induk);
        if (!empty($cek_ni)) {
            if ($password == $cnfrmpass) {
                $email_cek = $this->model('Profile_model')->cekEmail($email);
                if (!empty($email_cek)) {
                    $_SESSION['signup_err'] = "Email Alerdy in Use";
                    header("Location:" . BASEURL . "/login/signup");
                } else {
                    $this->model('Profile_model')->signUp($no_induk, $email, $password);
                    $data['signin'] = $this->model('Profile_model')->getAccount($email, $password);
                    var_dump($data);
                    if (!empty($data['signin'])) {
                        $_SESSION['nama'] = $data['signin'][0]['name'];
                        $_SESSION['email'] =  $data['signin'][0]['email'];
                        $_SESSION['id'] = $data['signin'][0]['id'];
                        $_SESSION['status'] = $data['signin'][0]['status'];
                        $mapel = $this->model('Mapel_model')->getMapel(841);
                        $_SESSION['mapel'] = $mapel[0]['id_mapel'];

                        header("Location:" . BASEURL . "home");
                    } else {
                        $_SESSION['signup_err'] = "Sign Failed";
                        // header("Location:" . BASEURL . "login/signup");
                    }
                }
            } else {
                $_SESSION['signup_err'] = "Please Enter the Same Password";
                header("Location:" . BASEURL . "login/signup");
            }
        } else {
            $_SESSION['signup_err'] = "NIS Not Found";
            header("Location:" . BASEURL . "login/signup");
        }
    }

    public function forgotPassword()
    {
        $this->view("Login/forgotPassword");
    }

    public function checkInputForgotPassword()
    {
        $data['profile'] =  $this->model('Profile_model')->ValEmailAndNis($_POST);
        // $_SESSION['status'] = 'guru';
        // var_dump($data);
        if (!empty($data['profile'])) {
            $_SESSION['id'] = $data['profile']['id'];
            header("Location:" . BASEURL . "Login/ChangePassword");
        } else {
            $this->view("Login/forgotPassword");
            $_SESSION['login_err'] = "Data Not Found";
        }
    }
    public function changePassword()
    {
        $this->view("Login/changePassword");
    }

    public function setNewPassword()
    {
        $password = $_POST['password'];
        $cnfrmpass = $_POST['cnfrmpass'];
        if ($password == $cnfrmpass) {
            if (!empty($this->model('Profile_model')->ChangePassword($password))) {
                Header("Location:".BASEURL."Login");
            }
        }
    }
}
