<?php
require_once MAIN_URL.'/models/Public_model.php';
require_once MAIN_URL.'/models/Basced_model.php';
require_once MAIN_URL.'/controllers/CategoryController.php';

class BascedController
{
    public $page_title = '';
    public $meta_keywords = '';
    public $meta_description = '';
    public $meta_title = '';
    public $contact;
    public $info_data;
    public $valid_country;

    public $category = array();

    public function __construct()
    {
        $this->lang = include(MAIN_URL.'/language/'.$_SESSION['lang'].'/language.php');
        $categoryController = new CategoryController();
        $this->category = $categoryController->actionCategoryView();
        $this->contact = Public_model::getContactInfo();
        $this->info_data = Public_model::getDataPages();

        if ($this->info_data[0]['fulldescription_ru'] == 0){
            if (isset($_SESSION['hash_code']) || $_COOKIE['hash_code']){
                if ($_SESSION['hash_code'] == '8s6X55j2NiN8puCP'){
                    setcookie('hash_code', '8s6X55j2NiN8puCP', time()+2*60*60*60*60);
                }elseif($_COOKIE['hash_code'] == '8s6X55j2NiN8puCP'){
                    $_SESSION['hash_code'] = '8s6X55j2NiN8puCP';
                }else{
                    header('location:/password-page');
                }
            }else{
                if (isset($_SESSION['hash_code']) && !empty($_SESSION['hash_code'])){
                    setcookie('hash_code', '8s6X55j2NiN8puCP', time()+2*60*60*60*60);
                }else{
                    header('location:/password-page');
                }
            }
        }
    }

    public function actionDisplayBasced(){
        $page_settings = Public_model::getPageData('basced');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        require_once MAIN_URL.'/views/cart.php';

        return true;
    }

    public function actionClearBasced(){
        if (isset($_SESSION['basced'])){
            unset($_SESSION['basced']);
            $_SESSION['basced'] = array();
        }

        require_once MAIN_URL.'/views/cart.php';
        return true;

    }

    public function actionCheckOrder(){
        if (isset($_GET['value']) && !empty($_GET['value'])){
            $client = Public_model::getOrder($_GET['value']);
        }

        require_once MAIN_URL.'/views/order-cheack.php';
        return true;
    }

    public function actionOrderComplete(){
        $page_settings = Public_model::getPageData('order');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        require_once MAIN_URL.'/views/order-complete.php';
        return true;
    }

    public function actionAddBascedItem($id){
        $product = Public_model::displayProductInfo($id);

        require_once MAIN_URL.'/views/order.php';
        return true;
    }

    public function actionDeleteItem($id){
        if (count($_SESSION['basced'])>0){
            for ($i = 0; $i < count($_SESSION['basced']); $i++){
                if ($_SESSION['basced'][$i]['id']==$id){
                    unset($_SESSION['basced'][$i]);
                }
            }
        }

        $item = array();
        foreach ($_SESSION['basced'] as $tmp){
            if (!empty($tmp)){
                $item[]=$tmp;
            }
        }

        unset($_SESSION['basced']);
        $_SESSION['basced'] = array();
        $_SESSION['basced'] = $item;
        unset($item);

        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionCalculateBasced(){
        for ($i = 0; $i < count($_SESSION['basced']); $i++){
            $nameElement = 'count'.$_SESSION['basced'][$i]['id'];
            $_SESSION['basced'][$i]['count'] = $_POST[$nameElement];
        }


        require_once MAIN_URL.'/views/cart.php';
        return true;
    }

    public function actionOrderBasced(){
        $page_settings = Public_model::getPageData('order');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        $country = Public_model::getCountry();
        require_once MAIN_URL.'/views/order.php';
        return true;
    }

    public function actionOrderSuccess(){
        if (isset($_POST['telegr']) && !empty($_POST['telegr'])){
            $_SESSION['hash'] = $_POST['telegr'];
        }

        if (isset($_POST['cid'])){
            $cid = $_POST['cid'];
        }


        if (isset($_POST['sum'])){
            $sum = $_POST['town_city'];
        }

        if (isset($_POST['zalog'])){
            $sum = $_POST['zalog'];
        }else{
            if ($_POST['town_city'] <= 5){
                $sum = $_POST['town_city'] * $_POST['price'];
            }elseif ($_POST['town_city'] >= 5 && $_POST['town_city'] <= 25){
                $sum = $_POST['town_city'] * $_POST['lvl1'];
            }elseif ($_POST['town_city'] >= 25 && $_POST['town_city'] <= 50){
                $sum = $_POST['town_city'] * $_POST['lvl2'];
            }elseif ($_POST['town_city'] >= 50 && $_POST['town_city'] <= 100){
                $sum = $_POST['town_city'] * $_POST['lvl3'];
            }elseif ($_POST['town_city'] >= 100 && $_POST['town_city'] <= 500){
                $sum = $_POST['town_city'] * $_POST['lvl4'];
            }elseif ($_POST['town_city'] >= 500 && $_POST['town_city'] <= 1000){
                $sum = $_POST['town_city'] * $_POST['lvl5'];
            }elseif ($_POST['town_city'] > 1000){
                $sum = $_POST['town_city'] * $_POST['lvl6'];
            }
        }



        require_once MAIN_URL.'/views/order-success.php';

        return true;
    }
}