<?php

include_once('utils/DbUtils.php');

class UserModel {

    private $dbUtils;

    public function __construct() {
        $this->dbUtils = new DbUtils();
    }

    function getAll() {
        $query = $this->dbUtils->executeQuery('SELECT * FROM users');
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getById($id) {
        $query = $this->dbUtils->executeQuery('SELECT * FROM users where id =  ?', [$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function getByEmail($email) {
        $query = $this->dbUtils->executeQuery('SELECT * FROM users where email =  ?', [$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function delete($id){
        $this->dbUtils->executeQuery('DELETE  FROM users WHERE id = ?',[$id]);
    }

    function insert($email, $encryptedPassword){
        $this->dbUtils->executeQuery('INSERT INTO users(email,password) VALUES (?, ?)',[$email, $encryptedPassword]);
        return $this->dbUtils->getLastInsertId();
    }

    function update($id,$email, $encryptedPassword, $isAdmin){
        return $this->dbUtils->executeQuery('UPDATE users SET email = ?, password = ?, is_admin = ? WHERE id = ?',[$email, $encryptedPassword, $isAdmin, $id]);
    }
    
}

