<?php

class Fuel extends DB
{

    protected static $table = 'fuel_types';

    public static function getFuels($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }

}