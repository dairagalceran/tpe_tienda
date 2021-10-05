<?php

include_once("config/Config.php");

class DbUtils
{

    private $dbConnection;
    public function __construct()
    {
        $host = Config::DB_HOST;
        $port = Config::DB_PORT;
        $dbName = Config::DB_NAME;
        $user = Config::DB_USER;
        $password = Config::DB_PASSWORD;
        $this->dbConnection =  new PDO("mysql:host=$host:$port;dbname=$dbName;charset=utf8", $user, $password);
    }

    public function executeQuery($query, $params = null){
        $query = $this->dbConnection->prepare($query);
        $query->execute($params);
        return $query;
    }

    public function getLastInsertId(){
        return $this->dbConnection->lastInsertId();
    }

}