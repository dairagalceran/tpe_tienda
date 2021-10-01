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

   

 

}