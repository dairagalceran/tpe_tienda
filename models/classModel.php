<?php

class ClassModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    /**
     * Obtener todas las categorias de la DB
     */
    function getAllClasses() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        $classes = $query->fetchAll(PDO::FETCH_OBJ); 

        return $classes;
    }

    function deleteClass($id){
        $query = $this->db->prepare('DELETE  FROM  categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }

    function insertClass($class){
        $query = $this->db->prepare('INSERT INTO categorias(categoria) VALUES (?)');
        $query->execute([$class]);
        return $this->db->lastInsertId();
    }
   

    
    
    
}

