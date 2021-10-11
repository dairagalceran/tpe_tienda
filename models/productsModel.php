<?php

class ProductsModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda; charset=utf8', 'root', '');
    }


    function getAllProducts() {
        $query = $this->db->prepare('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id
        ');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
        return $products;
    }

    function getProduct($id){
        $query = $this->db->prepare('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size , `products`.image, `products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id AND `products`.id = ?');
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    function getByCategory($id){
        $query = $this->db->prepare("SELECT `categories`.name as `category`, `categories`.id as category_id, `products`.name, `products`.price ,`products`.size,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id AND `products`.category_id =?");
        $query->execute(array($id));
        $product = $query->fetchAll(PDO::FETCH_OBJ);     
        return $product;
    }

}