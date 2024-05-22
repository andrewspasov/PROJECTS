<?php

class DB
{
    protected static $instance = null;

    protected const DB_HOST = 'localhost';
    protected const DB_NAME = 'challenge17';
    protected const DB_USER = 'root';
    protected const DB_PASSWORD = '';

    private function __construct() {
        try {
            self::$instance = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME , self::DB_USER, self::DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }catch (Exception $e){
            echo  $e->getMessage();
        }
    }

    public static function connect() {
        if (is_null(self::$instance)){
            new self();
        }
        return self::$instance;
    }

    public static function select($table, $req = null, $pdo = null){

        if(is_null($pdo)){
            $pdo = self::connect();
        }
        
        $data = [];
        if(is_null($req)){
            $sql = "SELECT * FROM {$table}";
        } else {
            $sql = $req['sql'];
            $data = $req['data'];
        }
        
        $stmt = $pdo->prepare($sql);

        $stmt->execute($data);

        return $stmt->fetchAll();
    }
}