<?php

namespace Confidence;

class PageSetting
{
    public static function getPageData($slug){
        require_once MAIN_URL.'/components/Db.php';
        $db = Db::getConnection();

        $query = "SELECT * FROM page_setting WHERE page_slug='{$slug}'";
        $res = $db->query($query);

        return $res;
    }
}