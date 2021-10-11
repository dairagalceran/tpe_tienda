<?php

class CategoriesModel {

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

    function getByID($id){
        $query = $this->db->prepare('SELECT * FROM categories WHERE id =?');
        $query->execute([$id]);
        $category = $query->fetch(PDO::FETCH_OBJ); 
        return $category;
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM categories WHERE id =?');
        $query->execute([$id]);
    }


    function insert($name){
        $query =$this->db->prepare('INSERT INTO categories(name)VALUES (?)');
        $query->execute([$name]);
        return $this->db->lastInsertId();
    }

    function update($id, $name){
        $query =$this->db->prepare('UPDATE categories SET name = ? WHERE id =?');
        $query->execute([$name, $id]);
        return  $id;
    }
    
   

}
    
    
    


