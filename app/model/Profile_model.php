<?php

class Profile_model{
    private $table = "profile";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAccount($email, $password){
        echo $email. $password;
        $this->db->query("SELECT * FROM ". $this->table . " WHERE email = :email AND password = :password");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        session_start();
        return $this->db->resultSet();
    }

    public function cekNI($no_induk){
        $this->db->query("SELECT * FROM ". $this->table . " WHERE no_induk = :no_induk");
        $this->db->bind(':no_induk', $no_induk);
        return $this->db->resultSet();        
    }
    
    public function cekEmail($email){
        $this->db->query("SELECT * FROM ". $this->table . " WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultSet();
    }

    public function signUp($no_induk, $email, $password){
        $this->db->query("UPDATE ". $this->table . " SET email = :email, password = :password WHERE no_induk = :no_induk");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':no_induk', $no_induk);
        return $this->db->resultSet();
    }

    public function VallPass(){
        $this->db->query("SELECT * FROM ". $this->table . " WHERE id = " . $_SESSION['id']);
        return $this->db->resultSet();
    }

    public function ChangeEmail($email){
        var_dump($email);
        $this->db->query("UPDATE  ". $this->table . " SET email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultSet();
    }
}