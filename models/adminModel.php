<?php

class AdminModel {

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

    function insertProduct($product, $talle, $precio, $categoria){
        $query = $this->db->prepare('INSERT INTO `productos`(`nombre_producto`, `talle`, `precio`, `id_categoria`) VALUES (?,?,?,?)');
        $query->execute([$product, $talle, floatval($precio), $categoria]);
        return $this->db->lastInsertId();
    }

    function insertClass($class){
        $query = $this->db->prepare('INSERT INTO categorias(categoria) VALUES (?)');
        $query->execute([$class]);
        return $this->db->lastInsertId();
    }
   
   
    function findClassById($id){
        $query = $this->db->prepare('SELECT * FROM `categorias` WHERE id_categoria =?');
        $query->execute([$id]);    
        $class = $query->fetchAll(PDO::FETCH_OBJ);
        return !empty($class) ? $class[0] : null;
    }
    
    function updateClass($id, $categoria){
        $query = $this->db->prepare('UPDATE `categorias` set categoria = ? WHERE id_categoria = ?');
        $query->execute([$categoria, $id]);
            return $id;
        }
        
    function getAllProducts() {
        $query = $this->db->prepare('SELECT `categorias`.categoria, `productos`.nombre_producto, `productos`.precio, `productos`.talle ,`productos`.id_producto FROM `productos`INNER JOIN `categorias` WHERE `categorias`.id_categoria = `productos`.id_categoria
        ');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas
    
        return $products;
    }

    function deleteProduct($id){
        $query = $this->db->prepare('DELETE  FROM  `productos`  WHERE id_producto= ?');
        $query->execute([$id]);

        
    }
}

