<?php
require_once MAIN_URL.'/models/Public_model.php';
require_once MAIN_URL.'/controllers/CategoryController.php';

class PublicController
{

    public $page_title = '';
    public $meta_keywords = '';
    public $meta_description = '';
    public $meta_title = '';
    public $contact;
    public $info_data;
    public $color;
    public $link_for_filters = '';
    public $lang = array();

    public $category = array();

    public function __construct()
    {
        $this->lang = include(MAIN_URL.'/language/'.$_SESSION['lang'].'/language.php');



        $uri_for_filters = explode('?', $_SERVER['REQUEST_URI']);

        if ($uri_for_filters > 0 && isset($uri_for_filters[1])){
            $this->link_for_filters = $uri_for_filters[1];
        }

        $this->contact = Public_model::getContactInfo();
        $this->info_data = Public_model::getDataPages();


        if ($this->info_data['fulldescription_ru'] == 0){
            if (isset($_SESSION['hash_code']) || isset($_COOKIE['hash_code'])){
                if ($_SESSION['hash_code'] == '8s6X55j2NiN8puCP'){
                    setcookie('hash_code', '8s6X55j2NiN8puCP', time()+2*60*60*60*60);
                }elseif($_COOKIE['hash_code'] == '8s6X55j2NiN8puCP'){
                    $_SESSION['hash_code'] = '8s6X55j2NiN8puCP';
                }else{
                    header('location:/password-page');
                }
            }else{
                header('location:/password-page');
            }
        }


        $categoryController = new CategoryController();
        $this->category = $categoryController->actionCategoryView();

        if (isset($_GET['color']) && !empty($_GET['color'])){
            $this->color=$_GET['color'];
        }else{
            $this->color='all';
        }
    }

    public function actionItemSearch($page = 1, $category, $sort){
        $search = $_POST['search'];
        $categoryController = new CategoryController();
        $category = $categoryController->actionCategoryView();
        $result = Public_model::getItemSearch($search);

        require_once MAIN_URL.'/views/main.php';

        return true;
    }


    public function actionIndex($page = 1, $filter = 'all', $lang = 'en'){
        $page_settings = Public_model::getPageData('main');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        $result['top_rate'] = Public_model::topRateItem();
        $result['new_items'] = Public_model::newItems();
        $result['euro_usa_outlet'] = Public_model::getUsaEuroOutlet();
        $result['tusovka'] = Public_model::getTusovka();

        require_once MAIN_URL.'/views/main.php';

        return true;
    }

    public function actionLangChange($lang = 'en'){
        $_SESSION['lang'] = $lang;

        header('location:'.$_SERVER['HTTP_REFERER']);
        return true;
    }

    public function actionPassword(){
        require_once MAIN_URL.'/views/privacy.php';
        if (isset($_POST['send'], $_POST['state']) && !empty($_POST['state'])){
            $_SESSION['hash'] = $_POST['state'];
        }

        return true;
    }

    public function actionOrderSuccess(){
        if (isset($_POST['sum'], $_POST['cid'])) {
            if ($_POST['cid'] == 1){
                $val = "BTC";
            }elseif ($_POST['cid'] == 2){
                $val = "ETH";
            }elseif ($_POST['cid'] == 3){
                $val = "TRC20";
            }elseif ($_POST['cid'] == 4){
                $val = "TRX";
            }elseif ($_POST['cid'] == 5){
                $val = "BTCC";
            }

            if ($_FILES['my_image']['error'] == 0) {
                $name_photo = time() . $_FILES['my_image']['name'];
                $tmp_photo = $_FILES['my_image']['tmp_name'];
                move_uploaded_file($tmp_photo, "assets/img/oplatu/{$name_photo}");
                $photo = $name_photo;
            } else {
                $photo = 'no_photo.jpg';
            }

            $data = array(
                'sum' => $_POST['sum'],
                'val' => $val,
                'photo' => $photo,
            );


            $result = Public_model::addPayment($data);

        }
        require_once MAIN_URL.'/views/order-complete.php';
        return true;
    }

    public function actionCatalog($page = 1){
        $count_items = Public_model::countItems();
        $page_settings = Public_model::getPageData('catalog');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        if (isset($_GET['category']) && !empty($_GET['category'])){
            $filter = $_GET['category'];
        }else{
            $filter = 'all';
        }

        if (isset($_GET['orderby']) && !empty($_GET['orderby'])){
            $order = $_GET['orderby'];
        }else{
            $order = 'default';
        }

        $min = Public_model::getMinMax();
        $minAndMax = array(
            'min' => $min['min'][0]['min'],
            'max' => $min['max'][0]['max'],
        );

        $outlet = '';
        if (isset($_GET['outlet'])){
            $outlet = $_GET['outlet'];
        }

        if (isset($_GET['amount']) && !empty($_GET['amount'])){
            $operReplOne = str_replace('$', '', $_GET['amount']);
            $operReplTwo = str_replace('', '', $operReplOne);
            $resRepl = explode(' - ', $operReplTwo);
            $minAndMax['min'] = $resRepl[0];
            $minAndMax['max'] = $resRepl[1];
        }

        $categoryController = new CategoryController();
        $category = $categoryController->actionCategoryView();


        if (isset($_GET['search']) && !empty($_GET['search'])){
            $pagination = Public_model::displayPagination($filter, $_GET['search'], $this->color, $order, $minAndMax, $outlet);
            $page = intval($page);
            $skipFormula = ($page-1)*15;
            $result['items'] = Public_model::displayItem($filter, $_GET['search'], $skipFormula, $this->color, $order, $minAndMax, $outlet);
        }else{
            $pagination = Public_model::displayPagination($filter, '', $this->color, $order, $minAndMax, $outlet);
            $page = intval($page);
            $skipFormula = ($page-1)*15;
            $result['items'] = Public_model::displayItem($filter, '', $skipFormula, $this->color, $order, $minAndMax, $outlet);
        }



        require_once MAIN_URL.'/views/catalog.php';

        return true;
    }

    public function actionInfo($id){
        if (isset($id) && !empty($id)){
            $result = Public_model::displayProductInfo($id);
            $result['euro_usa_outlet'] = Public_model::getUsaEuroOutlet();

            $page_settings = Public_model::getPageData('product_info');
            $this->page_title = $result['result']['model'];
            $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
            $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
            $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

            require_once MAIN_URL.'/views/product/product-info.php';
        }

        return true;
    }

    public function actionCurrierForm(){
        require_once MAIN_URL.'/views/currier.php';

        return true;
    }

    public function actionContact(){
        $page_settings = Public_model::getPageData('contact');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        $status = false;
        require_once MAIN_URL.'/views/contact.php';

        return true;
    }

    public function actionContactAdd(){
        $page_settings = Public_model::getPageData('contact');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];



        if (isset($_POST['send'], $_POST['con_name'], $_POST['con_surname'], $_POST['con_email'], $_POST['con_message']) && !empty($_POST['con_name']) && !empty($_POST['con_surname']) && !empty($_POST['con_email']) && !empty($_POST['con_message'])){
            $data = array(
                'name' => $_POST['con_name'],
                'surname' => $_POST['con_surname'],
                'email' => $_POST['con_email'],
                'message' => $_POST['con_message'],
            );
            Public_model::insertQuest($data);

            $status = true;
        }
        require_once MAIN_URL.'/views/contact.php';


        return true;
    }

    public function actionAbout(){
        $page_settings = Public_model::getPageData('about');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        require_once MAIN_URL.'/views/about.php';

        return true;
    }

    public function actionPrivacyPolicy(){
        $page_settings = Public_model::getPageData('privacy');


        require_once MAIN_URL.'/views/privacy.php';

        return true;
    }
    public function actionDelivery(){
        $page_settings = Public_model::getPageData('delivery');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        require_once MAIN_URL.'/views/delivery.php';

        return true;
    }
}