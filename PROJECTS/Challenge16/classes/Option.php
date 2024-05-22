<?php

class Option extends DB
{


    public function __construct(){
        parent::__construct();
    }

    public function getOptions()
    {
        $pdo = $this->instance;
        
        $sql = 'SELECT * FROM select_option';
        
        $stmt = $pdo->query($sql);
        
        return $stmt->fetchAll();
    }
}