<?php
session_start();

ini_set('display_errors', 0);


if (isset($_SESSION['lang']) && !empty($_SESSION['lang'])){
    setcookie('lang', $_SESSION['lang'], time()+2*60*60*60);
}else{
    if (isset($_COOKIE['lang']) && !empty($_COOKIE['lang'])){
        $_SESSION['lang'] = $_COOKIE['lang'];
    }else{
        setcookie('lang', 'ru', time()+2*60*60*60);
        $_SESSION['lang'] = 'ru';
    }
}





error_reporting(E_ALL);


define('MAIN_URL', dirname(__FILE__));

$lang = include_once MAIN_URL.'/language/ru/language.php';


require_once MAIN_URL.'/components/Db.php';
require_once MAIN_URL.'/core/Initialization.php';

require_once MAIN_URL.'/components/Router.php';

$router = new Router();
$router->run();


?>
