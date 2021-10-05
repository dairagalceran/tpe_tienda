<?php

include_once('utils/DbUtils.php');

class CategoryModel {

    private $dbUtils;

    public function __construct() {
        $this->dbUtils = new DbUtils();
    }

    /**
     * Obtener todas las categorias de la DB
     */
    function getAll() {
        $query = $this->dbUtils->executeQuery('SELECT * FROM categories');
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getById($id) {
        $query = $this->dbUtils->executeQuery('SELECT * FROM categories where id =  ?', [$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    function delete($id){
        $this->dbUtils->executeQuery('DELETE  FROM categories WHERE id = ?',[$id]);
    }

    function insert($name){
        $this->dbUtils->executeQuery('INSERT INTO categories(name) VALUES (?)',[$name]);
        return $this->dbUtils->getLastInsertId();
    }

    function update($id,$name){
        return $this->dbUtils->executeQuery('UPDATE categories SET name = ? WHERE id = ?',[$name, $id]);
    }
    
}

