<?php
class Group extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['status'])) {
            header("Location:" . BASEURL . "Login");
        }
        $data['title'] = 'Data Tugas';
        if ($_SESSION['status'] == 'guru') {
            $data['tugas'] = $this->model('Task_group_model')->getTaskForTeacher();
        } else {
            $data['tugas'] = $this->model('Task_group_distribution_model')->getAllTask();
        }
        $this->view("templates/header", $data);
        $this->view("Group/index", $data);
        $this->view("templates/footer");
    }


    public function detail()
    {
        session_start();
        $id = $_SESSION['id'];
        $id_task = $_SESSION['id_task'];
        $data['task'] = $this->model('Task_group_distribution_model')->getTaskDetail($id_task, $id);
        var_dump($data['task']);

        if ($data['task'][0]['id_leader'] != null) {
            $_SESSION['id_leader'] = $data['task'][0]['id_leader'];
            $data['member'] = $this->model('Task_group_distribution_model')->getMember($data['task'][0]['id_leader']);
        }
        $data['notmember'] = $this->model('Task_group_distribution_model')->getMemberNotInGroup($id_task);
        $leadercount = $this->model('Task_group_leader_model')->getAllLeader($id_task);
        // var_dump($data);
        $murid = $this->model('Kelas_model')->getAllSiswaWithKelas($data['task'][0]['id_kelas']);
        for ($totalmurid = 1; $totalmurid < sizeof($murid); $totalmurid++) {
            // var_dump($totalmurid);
        }
        // echo sizeof($leadercount);
        $grouplenght = $totalmurid / sizeof($leadercount);
        if ($totalmurid % sizeof($leadercount) != 0) {
            $grouplenght++;
        }
        // var_dump($totalmurid);
        $data['group_lenght'] = $grouplenght;
        // var_dump($grouplenght);

        // var_dump($data);
        $this->view("Group/detail", $data);
    }

    public function getDetail()
    {
        session_start();
        $id_task = $_POST['idtask'];
        var_dump($_POST['idtask']);
        $_SESSION['id_task'] = $id_task;
        header('Location:' . BASEURL . "Group/detail");
    }

    public function addMember()
    {
        session_start();
        $member_id = explode(',', $_POST['addMember']);
        for ($i = 1; $i < sizeof($member_id); $i++) {
            echo $member_id[$i - 1] . "<br>";
            // var_dump($_SESSION['id_leader']);
            $this->model("Task_group_distribution_model")->addLeader($_SESSION['id_task'], $_SESSION['id_leader'], $member_id[$i - 1]);
        }
        header("Location:" . BASEURL . "Group/detail");
    }

    public function subdetail()
    {
        $this->view("Group/sub_task_detail");
    }
    public function addtask()
    {
        session_start();
        $id = $_SESSION['id'];
        $id_task = $_SESSION['id_task'];
        $data['task'] = $this->model('Task_group_distribution_model')->getTaskDetail($id_task, $id);
        // var_dump($data['task']);

        if ($data['task'][0]['id_leader'] != null) {
            $_SESSION['id_leader'] = $data['task'][0]['id_leader'];
            $data['member_group'] = $this->model('Task_group_distribution_model')->getMember($data['task'][0]['id_leader']);
            // var_dump($data['member_group']);
        }
        $this->view("Group/addtask", $data);
    }

    public function leader()
    {
        $this->view("Group/leader");
    }

    public function upload()
    {
        $target_dir = "../public/image/";
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"]; // Menyimpan sementara file yang diupload
        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $targetFile = $target_dir . uniqid() . '.' . $imageFileType;

        // Mengecek apakah file telah diupload
        if (!empty($image_tmp)) {
            // Mengecek apakah file yang diupload adalah gambar
            $check = getimagesize($image_tmp);
            if ($check !== false) {
                // Memindahkan file yang diupload ke folder image
                if (move_uploaded_file($image_tmp, $targetFile)) {
                    // echo "The file " . basename($image_name) . " has been uploaded.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    header('Location:' . BASEURL . 'group/detail');
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    header('Location:' . BASEURL . 'group/detail');
                }
            } else {
                // echo "File is not an image.";
                $previous_url = $_SERVER['HTTP_REFERER'];
                header('Location:' . BASEURL . 'group/detail');
            }
        } else {
            // echo "No file uploaded.";
            $previous_url = $_SERVER['HTTP_REFERER'];
            header('Location:' . BASEURL . 'group/detail');
        }
    }
}
