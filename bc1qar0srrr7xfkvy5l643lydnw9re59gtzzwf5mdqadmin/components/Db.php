<?php

class Db
{
    public static function connection(){

        $dsn = 'mysql:host=localhost;dbname=toy_shop';

        try {
            $db = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }catch (PDOException $e){
            echo $e->getMessage();
        }

        


        $db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        return $db;
    }
}
