<?php

class Controller
{
    public function view($view,  $data = [])
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // var_dump($_SESSION['nama']);
        if (isset($_SESSION['nama'])) {
            require_once("../app/view/" . $view . ".php");
        } else {
            $url = BASEURL . $view;
            // var_dump($url);
            if ($url == BASEURL.'Login/register') {
                require_once("../app/view/Login/register.php");
            } else {
                require_once("../app/view/Login/index.php");
            }
        }
    }

    public function model($model)
    {
        require_once("../app/model/" . $model . ".php");
        return new $model;
    }
}
