<?php

class Registration
{
    protected static $table = 'registration';
    protected static $table1 = 'vehicle_models';
    protected static $table2 = 'vehicle_types';
    protected static $table3 = 'fuel_types';


    public static function getReg($pdo = null)
    {



        $req['sql'] = 'SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id';

        $req['data'] = [];

        return DB::select(self::$table, $req, $pdo);
    }

    public static function getSingleReg($id, $pdo = null)
    {
        // $req['sql'] = 'SELECT * FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN ' . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id WHERE registration.id = :id';


        $req['sql'] = 'SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id  WHERE registration.id = :id';

        $req['data'] = ['id' => $id];

        return DB::select(self::$table, $req, $pdo);
    }


    public static function extendReg($params, $pdo = null)
    {
        
        if(is_null($pdo)){
            $pdo = DB::connect();
        }

        $sql = 'UPDATE ' . self::$table . ' SET registration_to = :registration_to WHERE id=:id';

        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)){
            return 'Registration successfully updated';
        } else {
            return 'Something went wrong';
        }
    }

    // public static function query($sql, $params, $pdo = null){
    //     if(is_null($pdo)){
    //         $pdo = DB::connect();
    //     }

    //     $stmt = $pdo->prepare($sql);

    //     if($stmt->execute($params)){
    //         return 'Query successful.';
    //     } else {
    //         return 'Something went wrong';
    //     }
    // }


    public static function createNewRegistration($params, $pdo = null)
    {
        if (is_null($pdo)) {
            $pdo = DB::connect();
        }

        $sql = 'INSERT INTO ' . self::$table . ' (vehicle_model_id, vehicle_type_id, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type_id, registration_to) VALUES (:vehicle_model_id, :vehicle_type_id, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type_id, :registration_to)';

        $params = [
            'vehicle_model_id' => $_POST['select-model'],
            'vehicle_type_id' => $_POST['select-type'],
            'vehicle_chassis_number' => $_POST['chassis'],
            'vehicle_production_year' => $_POST['productionYear'],
            'registration_number' => $_POST['reg'],
            'fuel_type_id' => $_POST['select-fuel'],
            'registration_to' => $_POST['expDate']
        ];

        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($params)) {
            return 'New registration created';
        } else {
            return 'Something went wrong';
        }
    }


    public static function createNewModel($param, $pdo = null)
    {
        if (is_null($pdo)) {
            $pdo = DB::connect();
        }

        $sql = 'INSERT INTO ' . self::$table1 . ' (vehicle_model) VALUES (:vehicle_model)';

        $param = [
            'vehicle_model' => $_POST['newModel']
        ];

        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($param)) {
            return 'New model created';
        } else {
            return 'Something went wrong';
        }
    }



    public static function searchReg($search, $pdo = null)
    {

        // $req['sql'] = 'SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id';


        $req['sql'] = 'SELECT registration.id AS id, vehicle_models.vehicle_model AS vehicle_model, vehicle_types.vehicle_type AS vehicle_type, registration.vehicle_chassis_number AS vehicle_chassis_number, registration.vehicle_production_year AS vehicle_production_year, registration.registration_number AS registration_number, fuel_types.fuel_type AS fuel_type, registration.registration_to AS registration_to FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id  WHERE vehicle_models.vehicle_model LIKE :search OR registration.registration_number LIKE :search OR registration.vehicle_chassis_number LIKE :search';


        // $req['sql'] = 'SELECT * FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id WHERE vehicle_models.vehicle_model LIKE :search OR registration.registration_number LIKE :search OR registration.vehicle_chassis_number LIKE :search registration.id = :id';

        $req['data'] = ['search' => $search];

        return DB::select(self::$table, $req, $pdo);
    }


    public static function searchRegPlate($search, $pdo = null)
    {
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' JOIN ' . self::$table1 . ' ON registration.vehicle_model_id = vehicle_models.id JOIN ' . self::$table2 . ' ON registration.vehicle_type_id = vehicle_types.id JOIN '  . self::$table3 . ' ON registration.fuel_type_id = fuel_types.id WHERE registration.registration_number LIKE :search';

        $req['data'] = ['search' => $search];

        return DB::select(self::$table, $req, $pdo);
    }

    public static function updateReg($params, $pdo = null){
        if(is_null($pdo)){
            $pdo = DB::connect();
        }

        
        $sql = 'UPDATE ' . self::$table . ' SET vehicle_model_id=:vehicle_model_id, vehicle_type_id=:vehicle_type_id, vehicle_chassis_number=:vehicle_chassis_number, vehicle_production_year=:vehicle_production_year,registration_number=:registration_number, fuel_type_id=:fuel_type_id WHERE id=:id';

        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)){
            return 'Registration successfully updated';
        } else {
            return 'Something went wrong';
        }
    }

    public static function deleteReg($id, $pdo = null){
        if(is_null($pdo)){
            $pdo = DB::connect();
        }

        $sql = 'DELETE FROM registration WHERE id = :id';

        $stmt = $pdo->prepare($sql);

        if($stmt->execute(['id' => $id])){
            return 'Question deleted.';
        } else {
            return 'Something went wrong';
        }
    }



    public static function searchModel($model, $pdo = null)
    {
        $req['sql'] = 'SELECT vehicle_model FROM ' . self::$table1 . '  WHERE vehicle_model = :vehicle_model';

        $req['data'] = ['model' => $model];

        return DB::select(self::$table, $req, $pdo);
        
    }

}
