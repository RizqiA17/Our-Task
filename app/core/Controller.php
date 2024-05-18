<?php

class Controller
{
    function IsSessionExist()
    {
        if (!isset($_SESSION['status'])) {
            header("Location:" . BASEURL . "Login");
            echo "Halo";
            // return false;
        }
        // else echo session_id();
    }

    public function view($view,  $data = [])
    {
        if (isset($_SESSION['id']) && $_SESSION['status'] != 'guru') {
            $id = $this->model('Kelas_model')->getKelas();
            $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        }

        require_once("../app/view/" . $view . ".php");
    }

    public function model($model)
    {
        require_once("../app/model/" . $model . ".php");
        return new $model;
    }
}
