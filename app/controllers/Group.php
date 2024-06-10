<?php
class Group extends Controller
{
    public function index()
    {
        $this->IsSessionExist();

        if (!isset($_SESSION['status'])) {
            header("Location:" . BASEURL . "Login");
        }
        $data['title'] = 'Data Tugas';
        if ($_SESSION['status'] == 'guru') {
            $data['tugas'] = $this->model('Task_group_model')->getTaskForTeacher();
        } else {
            $data['tugas'] = $this->model('Task_group_distribution_model')->getAllTask();
            $data['group_member'] = $this->model('Task_group_distribution_model')->getMemberInGroup();
        }

        // var_dump($data);

        $this->view("templates/header", $data);
        $this->view("Group/index", $data);
        $this->view("templates/footer");
    }


    public function detail($id_task)
    {
        $this->IsSessionExist();

        $id = $_SESSION['id'];
        $_SESSION['id_task'] = $id_task;

        if ($_SESSION['status'] == 'siswa') {
            $data['task'] = $this->model('Task_group_distribution_model')->getTaskDetail($id_task, $id);
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

            if (!is_null($data['task'][0]['id_profile_leader'])) {
                $data['subtask'] = $this->model("Subtask_group_model")->getSubtask($id_task, $data['task']['id_profile_leader']);
            }
        } else {
            $data['task'] = $this->model('Task_group_model')->getTaskDetail($id_task);
        }
        // var_dump($data['task']);

        // var_dump($data);
        $this->view("Group/detail", $data);
    }

    public function getDetail()
    {
        $this->IsSessionExist();

        $id_task = $_POST['idtask'];
        // var_dump($_POST['idtask']);
        $_SESSION['id_task'] = $id_task;
        header('Location:' . BASEURL . "Group/detail");
    }

    public function addMember()
    {
        $this->IsSessionExist();

        $member_id = explode(',', $_POST['addMember']);
        for ($i = 1; $i < sizeof($member_id); $i++) {
            echo $member_id[$i - 1] . "<br>";
            // var_dump($_SESSION['id_leader']);
            $this->model("Task_group_distribution_model")->addLeader($_SESSION['id_task'], $_SESSION['id_leader'], $member_id[$i - 1], $_SESSION['id']);
        }
        header("Location:" . BASEURL . "group/detail/" . $_SESSION['id_task']);
    }

    public function subtask($id_task)
    {
        $this->IsSessionExist();

        // $id_task = $_POST['id_task'];
        $_SESSION['id_subtask'] = $id_task;
        $id_profile = $_SESSION['id'];
        $data['task'] = $this->model("Subtask_group_distribution_model")->getDetail($id_profile, $id_task);
        $data['task_file'] = $this->model("Subtask_file_model")->getFile();
        // var_dump($data);
        $this->view("Group/sub_task_detail", $data);
    }
    public function addtask()
    {
        $this->IsSessionExist();

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

    public function addnewtask()
    {
        $this->IsSessionExist();

        $id_task = $_SESSION['id_task'];
        // var_dump($id_task);
        $title = $_POST['title'];
        // var_dump($title);
        $detail = $_POST['detail'];
        // var_dump($detail);
        $deadline = date('Y-m-d', strtotime($_POST['deadline']));
        // var_dump($deadline);
        $taskTo = explode(',', $_POST['leader']);
        var_dump($taskTo);

        $target_dir = "../public/image/";
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"]; // Menyimpan sementara file yang diupload
        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $imageFileType;
        $targetFile = $target_dir . $filename;
        // var_dump($targetFile);


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

        $getTotalSubTask = $this->model('subtask_group_model')->getSubtask($_SESSION['id_task']);
        // var_dump($getTotalSubTask);

        $totalcomplited = 0;
        for ($i = 0; $i < sizeof($getTotalSubTask); $i++) {
            // var_dump(sizeof($getTotalSubTask));
            if ($getTotalSubTask[$i]['progress'] != 'unfinished') {
                $totalcomplited++;
                // var_dump($totalcomplited);
                $progress = $totalcomplited / (sizeof($getTotalSubTask) + 1) * 100;
                // var_dump($progress);
                $this->model('Task_group_leader_model')->setProgress($progress, $_SESSION['id_leader']);
                // var_dump($_SESSION);
            }
        }

        $addTask = $this->model('Subtask_group_model')->addTask($title, $detail, $deadline, $filename, $id_task);

        // $member = $this->model('Task_group_distribution_model')->getMember($_SESSION['id_leader']);

        for ($i = 0; $i < sizeof($taskTo); $i++) {
            if ($taskTo[$i] != null) $this->model('Subtask_group_distribution_model')->distributingTasks($addTask[0]['id'], $taskTo[$i]);
        }

        header("Location:" . BASEURL . "group/detail/" . $_SESSION['id_task']);
    }

    public function leader()
    {
        $this->IsSessionExist();
        $this->view("Group/leader");
    }

    public function upload()
    {
        $this->IsSessionExist();

        $target_dir = "../public/image/";
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"]; // Menyimpan sementara file yang diupload
        $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $file_name = uniqid() . '.' . $imageFileType;
        $targetFile = $target_dir . $file_name;

        // Mengecek apakah file telah diupload
        if (!empty($image_tmp)) {
            // Mengecek apakah file yang diupload adalah gambar
            $check = getimagesize($image_tmp);
            if ($check !== false) {
                // Memindahkan file yang diupload ke folder image
                if (move_uploaded_file($image_tmp, $targetFile)) {
                    // echo "The file " . basename($image_name) . " has been uploaded.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    if ($_SESSION['status'] == 'siswa') {
                        $this->model('Subtask_file_model')->addFile($_POST, $file_name);
                    } else {
                        $this->model('Task_group_model')->addAttachment($file_name, $_SESSION['id_task']);
                    }
                    header('Location:' . BASEURL . 'group/detail/' . $_SESSION['id_task']);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    // header('Location:' . BASEURL . 'group/detail');
                }
            } else {
                echo "File is not an image.";
                $previous_url = $_SERVER['HTTP_REFERER'];
                // header('Location:' . BASEURL . 'group/detail');
            }
        } else {
            echo "No file uploaded.";
            $previous_url = $_SERVER['HTTP_REFERER'];
            // header('Location:' . BASEURL . 'group/detail');
        }
    }

    public function complited()
    {
        $this->IsSessionExist();

        $this->model('Subtask_group_model')->complited($_SESSION['id_subtask']);

        // var_dump($_SESSION['id_subtask']);
        // echo "task selesai";

        $getTotalSubTask = $this->model('subtask_group_model')->getSubtask($_SESSION['id_task']);
        // var_dump($getTotalSubTask);

        $totalcomplited = 0;
        for ($i = 0; $i < sizeof($getTotalSubTask); $i++) {
            if ($getTotalSubTask[$i]['progress'] != 'unfinished') {
                // var_dump(sizeof($getTotalSubTask));
                $totalcomplited++;
                // var_dump($totalcomplited);
                $progress = $totalcomplited / sizeof($getTotalSubTask) * 100;
                // var_dump($progress);
                $this->model('Task_group_leader_model')->setProgress($progress, $_SESSION['id_leader']);
                // var_dump($_SESSION);
            }
        }
        // $this->model('')
        header("Location:" . BASEURL . "home");
    }
}
