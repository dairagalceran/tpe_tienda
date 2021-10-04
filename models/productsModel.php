<?php

class ProductsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    /**
     * 
     * Obtener todas los productos de la DB
     */
    function getAllProducts() {
        $query = $this->db->prepare('SELECT `categorias`.categoria, `productos`.nombre_producto, `productos`.precio ,`productos`.id_producto FROM `productos`INNER JOIN `categorias` WHERE `categorias`.id_categoria = `productos`.id_categoria
        ');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas

        return $products;
    }

    function getProduct($id){
        $query = $this->db->prepare('SELECT `categorias`.categoria, `productos`.nombre_producto, `productos`.precio ,`productos`.id_producto , `productos`.talle FROM `productos`INNER JOIN `categorias` WHERE `categorias`.id_categoria = `productos`.id_categoria AND id_producto=?');
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

 

}