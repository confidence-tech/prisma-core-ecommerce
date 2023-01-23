<?php
class Initialization
{
    public static function show_head($title, $meta_description, $meta_title, $meta_keywords, $lang)
    {
        echo '<!doctype html>
<html class="no-js" lang="'.$lang.'_'.strtoupper($lang).'">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>'.$title.'</title>
    
    <meta name="title" content="'.$meta_title.'" />
    <meta name="description" content="'.$meta_description.'" />
    <meta name="keywords" content="'.$meta_keywords.'" />
          
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add site Favicon -->
    <link rel="icon" href="/assets/img/favicon/favicon.ico"/>';
    }


    public static function lang($name){
        if (isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
            $lang = include('/language/'.$_SESSION['lang'].'/language.php');
        }else{
            $lang = include('/language/en/language.php');
        }
        return $lang[$name];
    }
}
