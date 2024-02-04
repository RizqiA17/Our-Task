<?php

class Profile_model{
    private $table = "akun";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAccount($email, $password){
        $this->db->query("SELECT * FROM  akun WHERE email = :email AND password = :password");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->resultSet();
    }
}