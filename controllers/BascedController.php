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
    public $profile = array();
    public $valid_country;

    public $category = array();

    public function __construct()
    {
        $this->lang = include(MAIN_URL.'/language/'.$_SESSION['lang'].'/language.php');
        $categoryController = new CategoryController();
        $this->lang_var = Public_model::getLangVar();
        $uri_for_filters = explode('?', $_SERVER['REQUEST_URI']);

        if ($uri_for_filters > 0 && isset($uri_for_filters[1])){
            $this->link_for_filters = $uri_for_filters[1];
        }
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            setcookie('id',$_SESSION['id'], time()+2*60*60*60*60);
            $this->profile = Public_model::getUserByIdAndEmail($_SESSION['id']);
            $this->is_logined = true;

        }elseif (isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $_SESSION['id'] = $_COOKIE['id'];
            $this->profile = Public_model::getUserByIdAndEmail($_COOKIE['id']);
            $this->is_logined = true;
        }

        $this->category = $categoryController->actionCategoryView();
        $this->contact = Public_model::getContactInfo();
        $this->info_data[6] = Public_model::getDataPages();
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
        $exist = false;
        if (!isset($_SESSION['basced'])){
            $_SESSION['basced'] = array();
        }
        if (count($_SESSION['basced']) > 0){
            for ($i = 0; $i < count($_SESSION['basced']); $i++){
                if ($_SESSION['basced'][$i]['id']==$id){
                    if (isset($_GET['size']) && $_SESSION['basced'][$i]['size']==$_GET['size']){
                        $_SESSION['basced'][$i]['count']++;
                        $_SESSION['basced'][$i]['sum'] = $_SESSION['basced'][$i]['count']*$_SESSION['basced'][$i]['price'];
                        $exist = true;
                    }elseif(!isset($_GET['size']) || $_SESSION['basced'][$i]['size']==$_GET['size']){
                        $_SESSION['basced'][$i]['count']++;
                        $_SESSION['basced'][$i]['sum'] = $_SESSION['basced'][$i]['count']*$_SESSION['basced'][$i]['price'];
                        $exist = true;
                    }

                }
            }
        }

        if (!$exist){
            if (isset($_GET['size'])){
                $res = Basced_model::addItemBasced($id, $_GET['size']);
            }else{
                $res = Basced_model::addItemBasced($id);
            }
        }



        header('location:'.$_SERVER['HTTP_REFERER']);
        return true;
    }

    public function actionAddWishlistItem($id){
        $exist = false;
        $res = Basced_model::cheackWishlistForId($id, $_SESSION['id']);

        if (!empty($res)){
            $exist = true;
        }
        if ($exist == false){
            Basced_model::addWishlistItem($id, $_SESSION['id']);
        }
        header('location:/user/wishlist');
        return true;
    }

    public function actionDelWishlistItem($id){
        Basced_model::DeleteWishlistItem($id, $_SESSION['id']);
        header('location:/user/wishlist');
        return true;
    }

    public function actionWishlistItemAddToCart($id){
        Basced_model::DeleteWishlistItem($id, $_SESSION['id']);
        $this->actionAddBascedItem($id);
        header('location:/user/wishlist');
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
        $chars = '1234567890';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < 8; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }

        if (isset($_POST['name'], $_POST['city'], $_POST['zip'], $_POST['email'], $_POST['phone'])){

            if ($_POST['payment_type'] == 2){
                $vars = array();

                $eqvuaring = Public_model::getEqvuaring();

                $vars['userName'] = $eqvuaring['login'];
                $vars['password'] = $eqvuaring['pass'];

                /* ID заказа в магазине */
                $vars['orderNumber'] = $string;

//                /* Корзина для чека (необязательно) */
//                $cart = array(
//                    array(
//                        'positionId' => 1,
//                        'name' => 'Название товара',
//                        'quantity' => array(
//                            'value' => 1,
//                            'measure' => 'шт'
//                        ),
//                        'itemAmount' => 1 * (1000 * 100),
//                        'itemCode' => '123456',
//                        'tax' => array(
//                            'taxType' => 0,
//                            'taxSum' => 0
//                        ),
//                        'itemPrice' => 1000 * 100,
//                    )
//                );
//
//                $vars['orderBundle'] = json_encode(
//                    array(
//                        'cartItems' => array(
//                            'items' => $cart
//                        )
//                    ),
//                    JSON_UNESCAPED_UNICODE
//                );

                /* Сумма заказа в копейках */
                $vars['amount'] = $_POST['sum'] * 100;

                /* URL куда клиент вернется в случае успешной оплаты */
                $vars['returnUrl'] = '/order-confirm/?order_num='.$string;

                /* URL куда клиент вернется в случае ошибки */
                $vars['failUrl'] = '/order-confirm/?order_num='.$string.'&error=payment';

                /* Описание заказа, не более 24 символов, запрещены % + \r \n */
                $vars['description'] = 'Заказ №' . $string . ' на leoray.ru';

                $ch = curl_init('https://3dsec.sberbank.ru/payment/rest/register.do?' . http_build_query($vars));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $res = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($res, JSON_OBJECT_AS_ARRAY);
                if (empty($res['orderId'])){
                    /* Возникла ошибка: */
                    header('location:/order-complete/?error=internet_pay');
                } else {
                    $data = array(
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'city' => $_POST['city'],
                        'adress' => $_POST['adress'],
                        'zip' => $_POST['zip'],
                        'payment_type' => $_POST['payment_type'],
                        'fulldescription' => $_POST['text_txt'],
                        'id_user' => $this->profile['id']
                    );
                    $res = Basced_model::addOrderComplete($data);

                    $_SESSION['basced'] = array();
                    header('location:/order-complete');
                }
            }else{
                $data = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'city' => $_POST['city'],
                    'adress' => $_POST['adress'],
                    'zip' => $_POST['zip'],
                    'payment_type' => $_POST['payment_type'],
                    'fulldescription' => $_POST['text_txt'],
                    'id_user' => $this->profile['id']
                );
                $res = Basced_model::addOrderComplete($data);

                $_SESSION['basced'] = array();
                header('location:/order-complete');
            }

        }else{
            header('location:'.$_SERVER['HTTP_REFERER']);
        }

        return true;
    }
}