<?php

class AdminModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    function getAllCategories() {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ); 

        return $categories;
    }

    function deleteCategory($id){
        $query = $this->db->prepare('DELETE  FROM  `categories` WHERE `id` = ?');
        $query->execute([$id]);
    }

    function insertCategory($category){
        $query = $this->db->prepare('INSERT INTO categories(name) VALUES (?)');
        $query->execute([$category]);
        return $this->db->lastInsertId();
    }

    function findCategoryById($id){
        $query = $this->db->prepare('SELECT * FROM `categories` WHERE id =?');
        $query->execute([$id]);    
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return !empty($category) ? $category[0] : null;
    }
 
    function updateCategory($id, $categoryName){
        $query = $this->db->prepare('UPDATE categories SET name = ? WHERE id = ?');
        $query->execute([$categoryName, $id]);
        return $id;
    }
 
        ///// products /////

    function getAllProducts() {
        $query = $this->db->prepare('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id
        FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id
        ');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $products;
    }

    function insertProduct($productName, $size, $price, $category_id){
        $query = $this->db->prepare('INSERT INTO `products`(`name`, `size`, `price`, `category_id`) VALUES (?,?,?,?)');
        $query->execute([$productName, $size, floatval($price), $category_id]);
        return $this->db->lastInsertId();
    }

    function deleteProduct($id){
        $query = $this->db->prepare('DELETE  FROM  `products`  WHERE id= ?');
        $query->execute([$id]);
        
    }

    function findProductById($id){
            $query = $this->db->prepare('SELECT `categories`.name as category, `categories`.id as category_id, `products`.name, `products`.price, `products`.size ,`products`.id FROM `products`INNER JOIN `categories` WHERE `categories`.id = `products`.category_id AND `products`.id = ?');
            $query->execute([$id]);
            $product = $query->fetch(PDO::FETCH_OBJ);
            return $product;
    }

    function updateProduct($productId , $productName,$productPrice, $productSize, $category_id){
        $query = $this->db->prepare('UPDATE `products` SET `name`= ?,`price`= ?,`size`= ?,`category_id`= ? WHERE `id`= ?');
        $query->execute([ $productName,$productPrice, $productSize, $category_id, $productId ]);
        return $productId ;
    }
}

