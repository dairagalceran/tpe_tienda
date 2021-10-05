<?php

class CategoryModel {

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

   
    function getItemsCategory($category){
        $query = $this->db->prepare("SELECT `categorias`.categoria, `productos`.nombre_producto, `productos`.precio ,`productos`.id_producto FROM `productos`INNER JOIN `categorias` WHERE `categorias`.id_categoria = `productos`.id_categoria AND `categorias`.id_categoria = '?' ");
        $query->execute([$category]);
        $products = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas

        return $products;
    }
}
    
    
    


