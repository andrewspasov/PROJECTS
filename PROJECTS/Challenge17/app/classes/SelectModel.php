<?php

class Model extends DB
{
    protected static $table = 'vehicle_models';

    public static function getModels($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }

    // public static function createModel($params, $pdo = null){
    //     if(is_null($pdo)){
    //         $pdo = DB::connect();
    //     }

    //     $sql = 'INSERT INTO ' . self::$table . ' (vehicle_model) VALUES (:vehicle_model)';

    //     $params = [
    //         'vehicle_model' => $_POST['select-model']
    //     ];

    //     $stmt = $pdo->prepare($sql);

    //     if($stmt->execute($params)){
    //         return 'New registration created';
    //     } else {
    //         return 'Something went wrong';
    //     }
        
    // }

}