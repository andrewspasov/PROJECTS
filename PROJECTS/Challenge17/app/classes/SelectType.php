<?php

class Type extends DB
{
    protected static $table = 'vehicle_types';

    public static function getTypes($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }

}