<?php

class AdminModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }


    function getAllCategories() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        $classes = $query->fetchAll(PDO::FETCH_OBJ); 

        return $classes;
    }

    function deleteCategory($id){
        $query = $this->db->prepare('DELETE  FROM  categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }

    function insertCategory($category){
        $query = $this->db->prepare('INSERT INTO categorias(categoria) VALUES (?)');
        $query->execute([$category]);
        return $this->db->lastInsertId();
    }

    function getAllProducts() {
        $query = $this->db->prepare('SELECT `categorias`.categoria, `productos`.nombre_producto, `productos`.precio ,`productos`.id_producto FROM `productos`INNER JOIN `categorias` WHERE `categorias`.id_categoria = `productos`.id_categoria
        ');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas

        return $products;
    }
}