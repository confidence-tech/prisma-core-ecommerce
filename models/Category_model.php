<?php
require_once MAIN_URL . '/components/Db.php';

class Category_model
{
    public static function displayCategory(){
        $db = Db::getConnection();
        $query = "SELECT * FROM typewear";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getBrands(){
        $db = Db::getConnection();
        $query = "SELECT id, name_ru AS brand FROM country";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getCategoryForFilter($filter_name, $filter_name_two = null){
        $db = Db::getConnection();
        $query = "SELECT * FROM typewear WHERE {$filter_name}=1";
        if($filter_name_two == 'is_not_accessorize'){
            $query .= " AND is_accessorize=0";
        }elseif($filter_name_two != null && $filter_name_two != 'is_not_accessorize'){
            $query .= " AND {$filter_name_two}=1";
        }
        
        
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}