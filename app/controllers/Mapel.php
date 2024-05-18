<?php

Class Mapel extends Controller{
    public function index(){
        $this->IsSessionExist();

        $data['title'] = 'Mapel';
        $id = $this->model('Kelas_model')->getKelas();
        $data['mapel'] = $this->model('Mapel_model')->getMapel($id[0]['id_kelas']);
        $this->view("templates/header", $data);
        $this->view("Home/mapel", $data);
        $this->view("templates/footer");        
    }
}