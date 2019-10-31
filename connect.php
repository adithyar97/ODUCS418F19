<?php

class databaseConnection{
    
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];

    public function getConnection(){
        try{
            $pdo = new PDO('mysql:host=handson-mysql; dbname=vet_prn; charset=utf8', 'kumar', 'kumar');
            echo "connection success!";
        }
        catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }
}




?>