<?php

class Admin {
    protected static $table = 'admins';

    public static function getAdmin($username, $pdo = null){
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' WHERE username = :username LIMIT 1';
        $req['data'] = ['username' => $username];
        return DB::select(self::$table, $req, $pdo);
    }
}