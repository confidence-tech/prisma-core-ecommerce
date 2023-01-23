<?php

class Db
{
    public static function getConnection(){
        $dsn = 'mysql:host=localhost;dbname=toy_shop';
        $Db = null;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];
        try {
            $Db = new PDO($dsn, 'root', '', $options);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $Db;
    }

}

