<?php

class Controller
{
    public function view($view,  $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['nis'])) {
            require_once("../app/view/Login/index.php");
        }
        else{
            require_once("../app/view/" . $view . ".php");
        }
    }

    public function model($model)
    {
        require_once("../app/model/" . $model . ".php");
        return new $model;
    }
}
