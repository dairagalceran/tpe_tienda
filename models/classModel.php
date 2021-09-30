<?php

class ClassModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    /**
     * Obtener todas las tareas de la DB
     */
    function getAllClasses() {
        // 1. Enviamos la consulta (2 sub pasos)
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // 2. obtengo la respuesta de la DB
        $classes = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas

        return $classes;
    }

}