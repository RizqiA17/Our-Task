<?php

class Profile_model{
    private $table = "akun";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAccount($email, $password){
        $this->db->query("SELECT * FROM ". $this->table . " WHERE email = :email AND password = :password");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        session_start();
        return $this->db->resultSet();
    }
    
    public function VallPass(){
        $this->db->query("SELECT * FROM ". $this->table . " WHERE " . $_SESSION['nis']);
        return $this->db->resultSet();
    }

    public function ChangeEmail($email){
        // var_dump($email);
        $this->db->query("UPDATE  ". $this->table . " SET email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultSet();
    }
}