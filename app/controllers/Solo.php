<?php

class Solo extends Controller
{

    public function index()
    {
        $this->IsSessionExist();

        $data['title'] = 'Data Tugas';
        if ($_SESSION['status'] == 'guru') {
            $data['task'] = $this->model('Task_solo_model')->getTaskForTeacher();
        } else {
            $data['task'] = $this->model('Task_solo_distribution_model')->getAllTask();
        }
        // var_dump($data['task']);
        $this->view("templates/header", $data);
        $this->view("Solo/index", $data);
        $this->view("templates/footer");
    }

    public function getDetail()
    {
        $this->IsSessionExist();

        if ($_POST != null) {
            $_SESSION['id_task'] = $_POST['idtask'];
        }
        header("Location:" . BASEURL . "Solo/Detail");
    }

    public function detail($id_task)
    {
        $id = $_SESSION['id'];
        $_SESSION['id_task'] = $id_task;
        if ($_SESSION['status'] == 'guru') {
            $data['task'] = $this->model('Task_solo_model')->getTaskDetail($id_task, $id);
        } else {
            $data['task'] = $this->model('Task_solo_distribution_model')->getTaskDetail($id_task, $id);
        }
        $data['task_file'] = $this->model('Task_file_model')->getFile();
        // var_dump($data);
        $this->view("Solo/detail", $data);
    }

    public function complited()
    {
        var_dump($_SESSION['id_task']);
        echo "task selesai";

        $this->model('Task_solo_distribution_model')->taskComplited($_SESSION['id_task'], $_SESSION['id']);
        header("Location:" . BASEURL . "home");
    }

    public function upload()
    {
        $id = $_SESSION['id_task'];
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
                        $this->model('Task_file_model')->addFile($_POST, $file_name);
                    }else{
                        $this->model('Task_solo_model')->addAttachment($file_name, $id);
                    }
                    header('Location:' . BASEURL . 'solo/detail/' . $id);
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    header('Location:' . BASEURL . 'solo/detail/' . $id);
                }
            } else {
                // echo "File is not an image.";
                $previous_url = $_SERVER['HTTP_REFERER'];
                header('Location:' . BASEURL . 'solo/detail/' . $id);
            }
        } else {
            // echo "No file uploaded.";
            $previous_url = $_SERVER['HTTP_REFERER'];
            header('Location:' . BASEURL . 'solo/detail/' . $id);
        }
    }
}
