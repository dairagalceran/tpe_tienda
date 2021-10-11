<?php


class LoginModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    function getUser($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email =?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
 
     function register($email, $userPassword){
        $query = $this->db->prepare('INSERT INTO users (email, password) VALUES (? , ?)');
        $query->execute([$email,$userPassword]);
 
    }

    function getByEmail($userEmail){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}