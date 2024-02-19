<?php
session_start();
class Home extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['status'])) {
            header("Location:" . BASEURL . "Login");
        }
        $data['title'] = 'Home';
        if ($_SESSION['status'] == 'guru') {
            $data['task_solo'] = $this->model('Task_solo_model')->getTaskForTeacher();
            $data['tugas_group'] = $this->model('Task_group_model')->getTaskForTeacher();
        } else {
            $data['task_solo'] = $this->model('Task_solo_distribution_model')->getAllTask();
            $data['tugas_group'] = $this->model('Task_group_distribution_model')->getAllTask();
        }
        // var_dump($data['task_solo']);

        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
    public function calender()
    {
        $this->view("Home/calender");
    }
    public function notification()
    {
        $this->view("Home/notification");
    }
    public function mapel()
    {
        $data['title'] = 'Mapel';
        $id = $this->model('Kelas_model')->getKelas();
        $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        $this->view("templates/header", $data);
        $this->view("Home/mapel", $data);
        $this->view("templates/footer");
    }

    public function addtask()
    {
        // $this->model('Mapel_model')->mengajar();
        $data['kelas'] = $this->model('Mapel_model')->mengajar();
        $i = 0;
        foreach ($data['kelas'] as $kelas) {
            $data['siswa' . $i] = $this->model('Kelas_model')->getSiswa($kelas['id_kelas']);
            $i++;
        }
        // var_dump($data);
        $this->view("Home/addtask", $data);
    }

    public function addnewtask()
    {
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline = date('Y-m-d', strtotime($_POST['deadline']));
        $taskmode = $_POST['mode'];
        $kelas = $_POST['kelas'];
        var_dump($_POST['leader']);
        $leader = explode(",", $_POST['leader']);
        var_dump($leader);
        // echo $title . $detail . $deadline . $taskmode . $filename . $kelas . $_SESSION['mapel'];

        // $addTask = $this->model('Task_solo_model')->addTask($title, $detail, $deadline,'', $_SESSION['mapel'], $kelas);

        $target_dir = "../public/image/";
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"]; // Menyimpan sementara file yang diupload
        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $imageFileType;
        $targetFile = $target_dir . $filename;
        
        var_dump($_SESSION['id']);
        $addTask = $this->model('Task_' . $taskmode . '_model')->addTask($title, $detail, $deadline, $filename, $_SESSION['mapel'], $kelas);
        
        
        var_dump($addTask);
        if ($taskmode == 'Group') {
            for ($i = 0; $i <= sizeof($leader); $i++) {
                if ($leader[$i] != null) {
                    $addLeader = $this->model('Task_group_leader_model')->addLeader($leader[$i], $addTask[0]['id']);
                }
            }
        }

        // Mengecek apakah file telah diupload
        if (!empty($image_tmp)) {
            // Mengecek apakah file yang diupload adalah gambar
            $check = getimagesize($image_tmp);
            if ($check !== false) {
                // Memindahkan file yang diupload ke folder image
                if (move_uploaded_file($image_tmp, $targetFile)) {
                     echo "The file " . basename($image_name) . " has been uploaded.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    //header('Location:' . BASEURL . 'home');
                } else {
                     echo "Sorry, there was an error uploading your file.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    //header('Location:' . BASEURL . 'home');
                }
            } else {
                 echo "File is not an image.";
                $previous_url = $_SERVER['HTTP_REFERER'];
                //header('Location:' . BASEURL . 'home');
            }
        } else {
             echo "No file uploaded.";
            $previous_url = $_SERVER['HTTP_REFERER'];
            //header('Location:' . BASEURL . 'home');
        }

        var_dump($addTask);
        $murid = $this->model('Kelas_model')->getAllSiswaWithKelas($kelas);
        var_dump($murid);
        for ($i = 0; $i < sizeof($murid); $i++) {
            $this->model('Task_'.$taskmode.'_distribution_model')->distributingTasks($addTask[0]['id'], $murid[$i]['id_profile']);
        }
        // header("Location:" . BASEURL . "home");

    }
    public function getDetail()
    {
        $id_task = $_POST['idtask'];
        echo $id_task;
        // session_start();
        // $data['task'] = $this->model('Task_solo_distribution_model')->getTaskDetail($_SESSION['id_task'], $_SESSION['id']);
        // $data['task_file'] = $this->model('Task_solo_distribution_model')->taskFile($_SESSION['id_task'], $_SESSION['id']);
        // var_dump($data);
        // $this->view("Solo/detail", $data);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location:http://localhost/ourtaskmvc/public/login");
    }
}
