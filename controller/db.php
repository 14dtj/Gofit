<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/2
 * Time: 20:10
 */
class db
{
    public static $pdo = null;

    private function __construct()
    {
    }


    public static function getPdo()
    {
        if (self::$pdo == null)
            self::$pdo = new PDO('sqlite:temp.db');
        return self::$pdo;
    }


}