<?php

include_once('utils/DbUtils.php');

class ProductModel {

    private $dbUtils;

    public function __construct() {
        $this->dbUtils = new DbUtils();
    }

    /**
     * 
     * Obtener todas los productos de la DB
     */
    function getAll() {
        $query = $this->dbUtils->executeQuery('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id');
        $products = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas
        return $products;
    }

    function getById($id){
        $query = $this->dbUtils->executeQuery('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id AND `products`.id = ?', array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    function getByCategory($categoryId){
        $query = $this->dbUtils->executeQuery('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id AND `products`.category_id = ?', array($categoryId));
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }

 

}