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
    public $is_logined = false;
    public $profile = array();
    public $lang_var = array();

    public $category = array();

    public function __construct()
    {
        $this->lang = include(MAIN_URL.'/language/'.$_SESSION['lang'].'/language.php');


        $this->lang_var = Public_model::getLangVar();
        $uri_for_filters = explode('?', $_SERVER['REQUEST_URI']);

        if ($uri_for_filters > 0 && isset($uri_for_filters[1])){
            $this->link_for_filters = $uri_for_filters[1];
        }

        $this->contact = Public_model::getContactInfo();
        $this->info_data[6] = Public_model::getDataPages();

        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            setcookie('id', $_SESSION['id'], time()+2*60*60);
            $this->profile = Public_model::getUserByIdAndEmail($_SESSION['id']);
            $this->is_logined = true;

        }elseif (isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $_SESSION['id'] = $_COOKIE['id'];
            $this->profile = Public_model::getUserByIdAndEmail($_COOKIE['id']);
            $this->is_logined = true;
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

        require_once MAIN_URL.'/views/main1.php';

        return true;
    }


    public function actionIndex($page = 1, $filter = 'all', $lang = 'en'){
        $page_settings = Public_model::getPageData('main');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        Public_model::activePlusPlus();
        $result['top_rate'] = Public_model::topRateItem();
        $result['new_items'] = Public_model::newItems();
        $result['euro_usa_outlet'] = Public_model::getUsaEuroOutlet();
        $result['tusovka'] = Public_model::getTusovka();
        $result['blog'] = Public_model::getBlog(3);

        require_once MAIN_URL.'/views/main1.php';

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

    public function actionCreatedPages($slug){
        if (isset($_GET['page']) && !empty($_GET['page'])){
            $page_settings = Public_model::getPageData($_GET['page']);
            $this->page_title = $page_settings[0]['title_ru'];
            $this->meta_title = $page_settings[0]['meta_title_ru'];
            $this->meta_description = $page_settings[0]['meta_decription_ru'];
            $this->meta_keywords = $page_settings[0]['meta_keywords_ru'];

            $data = Public_model::getPageConstructor($_GET['page']);
        }
        require_once MAIN_URL.'/views/about.php';


        return true;
    }

    public function actionOrderSuccess(){
        $page_settings = Public_model::getPageData('order');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        if (isset($_POST['f_name'], $_POST['l_name'], $_POST['adress'], $_POST['town_city'], $_POST['zip'], $_POST['email'], $_POST['phone']) && !empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['adress']) && !empty($_POST['appart']) && !empty($_POST['town_city']) && !empty($_POST['zip']) && !empty($_POST['email']) && !empty($_POST['phone'])){
            $appart = 'null';
            $state = 'null';

            if (isset($_POST['state']) && !empty($_POST['state'])){
                $state = $_POST['state'];
            }
            if (isset($_POST['appart']) && !empty($_POST['appart'])) {
                $appart = $_POST['appart'];
            }

            $data = array(
                'l_name' => $_POST['l_name'],
                'f_name' => $_POST['f_name'],
                'adress' => $_POST['adress'],
                'town_city' => $_POST['town_city'],
                'zip' => $_POST['zip'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'state' => $state,
                'appart' => $appart,
                'country' => $_POST['country'],
            );
            $res = Basced_model::addOrderComplete($data);

            $_SESSION['basced'] = array();
            require_once MAIN_URL.'/views/order-complete.php';
            return true;
        }

        return true;
    }

    public function actionCatalog($page = 1){
        $count_items = Public_model::countItems();
        $page_settings = Public_model::getPageData('catalog');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        $result['new_items'] = Public_model::newItems();
        $result['colors'] = Public_model::getColors();
        $result['brands'] = Public_model::getCountry();

        if ($this->is_logined == true){
            $wsh_count = Public_model::countWishlist($this->profile['id']);
        }else{
            $wsh_count = 0;
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
        if (isset($_GET['gender'])){
            $outlet = $_GET['gender'];
        }

        if (isset($_GET['amount']) && !empty($_GET['amount'])){
            $operReplOne = str_replace('$', '', $_GET['amount']);
            $operReplTwo = str_replace('', '', $operReplOne);
            $resRepl = explode(' - ', $operReplTwo);
            $minAndMax['min'] = $resRepl[0];
            $minAndMax['max'] = $resRepl[1];
        }

        $color_ln = '';
        $exs = false;
        for($i = 0; $i < count($result['colors']); $i++){
            if (isset($_GET['color_'.$i]) && !empty($_GET['color_'.$i])){
                if ($exs == false){
                    $color_ln .= " AND attributes_val.value='{$_GET['color_'.$i]}'";
                }else{
                    $color_ln .= " OR attributes_val.value='{$_GET['color_'.$i]}'";
                }
                $exs = true;
            }
        }
        $brand_ln = '';
        $exs_brand = false;
        for($i = 0; $i < count($this->category['brands']); $i++){
            if (isset($_GET['brands_'.$i]) && !empty($_GET['brands_'.$i])){
                if ($exs_brand == false){
                    $brand_ln .= " AND brand='{$_GET['brands_'.$i]}'";
                }else{
                    $brand_ln .= " OR brand='{$_GET['brands_'.$i]}'";
                }
                $exs_brand = true;
            }
        }


        $cat_ln = '';
        $exs_ct = false;

        for($i = 0; $i < count($this->category['man']); $i++){
            if (isset($_GET['category1_'.$i]) && !empty($_GET['category1_'.$i])){
                if ($exs_ct == false){
                    $cat_ln .= " AND assort.id_type={$_GET['category1_'.$i]}";
                }else{
                    $cat_ln .= " OR assort.id_type={$_GET['category1_'.$i]}";
                }
                $exs_ct = true;
            }
        }
        for($i = 0; $i < count($this->category['woman']); $i++){
            if (isset($_GET['category2_'.$i]) && !empty($_GET['category2_'.$i])){
                if ($exs_ct == false){
                    $cat_ln .= " AND assort.id_type={$_GET['category2_'.$i]}";
                }else{
                    $cat_ln .= " OR assort.id_type={$_GET['category2_'.$i]}";
                }
                $exs_ct = true;
            }
        }
        for($i = 0; $i < count($this->category['accessorize_man']); $i++){
            if (isset($_GET['category3_'.$i]) && !empty($_GET['category3_'.$i])){
                if ($exs_ct == false){
                    $cat_ln .= " AND assort.id_type={$_GET['category3_'.$i]}";
                }else{
                    $cat_ln .= " OR assort.id_type={$_GET['category3_'.$i]}";
                }
                $exs_ct = true;
            }
        }
        for($i = 0; $i < count($this->category['accessorize_woman']); $i++){
            if (isset($_GET['category4_'.$i]) && !empty($_GET['category4_'.$i])){
                if ($exs_ct == false){
                    $cat_ln .= " AND assort.id_type={$_GET['category4_'.$i]}";
                }else{
                    $cat_ln .= " OR assort.id_type={$_GET['category4_'.$i]}";
                }
                $exs_ct = true;
            }
        }

        if (isset($_GET['category']) && !empty($_GET['category']) && $exs_ct == false){
            $filter = $_GET['category'];
        }else{
            $filter = 'all';
        }




        $categoryController = new CategoryController();
        $category = $categoryController->actionCategoryView();


        if (isset($_GET['search']) && !empty($_GET['search'])){
            $pagination = Public_model::displayPagination($filter, $_GET['search'], $this->color, $order, $minAndMax, $outlet, $color_ln, $cat_ln, $brand_ln);
            $page = intval($page);
            $skipFormula = ($page-1)*3;
            $result['items'] = Public_model::displayItem($filter, $_GET['search'], $skipFormula, $this->color, $order, $minAndMax, $outlet, $color_ln, $cat_ln, $brand_ln);
        }else{
            $pagination = Public_model::displayPagination($filter, '', $this->color, $order, $minAndMax, $outlet, $color_ln, $cat_ln, $brand_ln);
            $page = intval($page);
            $skipFormula = ($page-1)*3;
            $result['items'] = Public_model::displayItem($filter, '', $skipFormula, $this->color, $order, $minAndMax, $outlet, $color_ln, $cat_ln, $brand_ln);
        }



        require_once MAIN_URL.'/views/catalog1.php';

        return true;
    }

    public function actionInfo($id){

        if (isset($id) && !empty($id)){
            $result = Public_model::displayProductInfo($id);
            $result['euro_usa_outlet'] = Public_model::getUsaEuroOutlet();
            $result['attr'] = Public_model::getAttr($result['result']['id_type']);

            if (!empty($result['result']['split_in']) && $result['result']['split_in'] != ''){
                $attr_color_str = " AND (id_item={$id}";
                $split_in = explode(',', $result['result']['split_in']);
                if (!empty($split_in)){
                    foreach ($split_in as $id_color){
                        $attr_color_str.=" OR id_item={$id_color}";
                    }
                }else{
                    $attr_color_str.=" OR id_item={$result['result']['split_in']}";
                }
                $attr_color_str.=')';

                $colors = Public_model::getColor($attr_color_str);
            }else{
                $attr_color_str = " AND (id_item={$id}";
                $exist = Public_model::checkOtherSplitItems($id);
                if (!empty($exist)){
                    $split_in = explode(',', $exist['split_in']);
                    if (!empty($split_in)){
                        foreach ($split_in as $id_color){
                            $attr_color_str.=" OR id_item={$id_color}";
                        }
                    }else{
                        $attr_color_str.=" OR id_item={$result['result']['split_in']}";
                    }
                }
                $attr_color_str.=')';
                $colors = Public_model::getColor($attr_color_str);
            }

            $result['charact']['brand'] = Public_model::getBrandForId($result['result']['brand']);
            $result['attr_all'] = Public_model::getAttrItem($id);

            $page_settings = Public_model::getPageData('product_info');
            $this->page_title = $result['result']['model'];
            $this->meta_title = $result['result']['model'];
            $this->meta_description = $result['result']['model'];
            $this->meta_keywords = $result['result']['model'];

        }
        require_once MAIN_URL.'/views/product/product-info1.php';

        return true;
    }

    public function actionCurrierForm(){
        require_once MAIN_URL.'/views/currier.php';

        return true;
    }

    public function actionLoginUser(){
        $page_settings = Public_model::getPageData('login');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        require_once MAIN_URL.'/views/auth/login.php';

        return true;
    }
    public function actionBlog(){
        $result['blog'] = Public_model::getBlog(100);

        require_once MAIN_URL.'/views/blog/blog.php';

        return true;
    }
    public function actionBlogDetail($id){
        $page_settings = Public_model::getPageData('blog');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        $result = Public_model::getBlogById($id);

        require_once MAIN_URL.'/views/blog/blog-detail.php';

        return true;
    }
    public function actionProfileDisplay(){
        $page_settings = Public_model::getPageData('profile');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        require_once MAIN_URL.'/views/auth/profile.php';

        return true;
    }
    public function actionProfileEdit(){
        $data = array(
            'f_name' => $_POST['l_name'],
            'l_name' => $_POST['l_name'],
            'phone' => $_POST['phone'],
            'city' => $_POST['city'],
            'adress' => $_POST['adress'],
            'zip' => $_POST['zip'],
            'id_user' => $this->profile['id'],
        );
        $result = Public_model::editProfile($data);
        header('location:/user/setting');

        return true;
    }
    public function actionSetting(){
        $page_settings = Public_model::getPageData('profile');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        require_once MAIN_URL.'/views/user-setting.php';

        return true;
    }


    public function actionLoginProcess(){
        if (!empty($_POST['name']) && !empty($_POST['password'])){
            $remember = 0;
            if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'yes'){
                $remember = 1;
            }

            $data = array(
                'email' => $_POST['name'],
                'password' => $_POST['password'],
                'remember-me' => $remember
            );
            
            $getLoginData = Public_model::loginUserProfile($data);

            echo json_decode($getLoginData);
        }
        
        
        die();
    }



    public function actionRegisterProcess(){
        $res = Public_model::getProfile($_POST['email'], $_POST['password']);
        $n = 0;
        if ($res != 0){
            $n = 1;
            $status = false;
        }else{
            $status = true;
        }
        if ($_POST['capcha'] != $_POST['suma_cp']){
            $n = 1;

            $cpch = false;
        }else{
            $cpch = true;
        }
        if ($_POST['pass'] != $_POST['repass']){
            $n = 1;
            $pss = false;
        }else{
            $pss = true;
        }
        if ($n == 0){
            $data = array(
                'f_name' => $_POST['f-name'],
                'l_name' => $_POST['l-name'],
                'email' => $_POST['email'],
                'password' => $_POST['pass'],
            );
            $result = Public_model::createProfile($data);
            if ($result == 0){
                header('location:/user/orders');
            }else{
                $status = false;
                require_once MAIN_URL.'/views/register.php';
            }
        }else{
            require_once MAIN_URL.'/views/register.php';
        }

        return true;
    }

    public function actionRegisterUser(){
        $page_settings = Public_model::getPageData('registration');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];
        require_once MAIN_URL.'/views/auth/register.php';

        return true;
    }

    public function actionCart(){
        if (isset($_SESSION['basced']) && !empty($_SESSION['basced']) && count($_SESSION['basced']) > 0){
            require_once MAIN_URL.'/views/cart.php';
        }else{
            header('location:/index');
        }
        

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
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];


        require_once MAIN_URL.'/views/privacy.php';

        return true;
    }
    public function actionWishlist(){
        $page_settings = Public_model::getPageData('wishlist');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        if ($this->is_logined == true){
            require_once MAIN_URL.'/models/Basced_model.php';
            $wishlist = Basced_model::getWishlist();
            require_once MAIN_URL.'/views/wishlist.php';
        }else{
            header('location:/user/login');
        }

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

    public function actionSignOut(){
        /*Обнуляем cookie*/
        setcookie('id', '', time()-2*60*60*60*60*2);
        $_SESSION['id'] = $_COOKIE['id'];
        $this->profile = array();
        $this->is_logined = false;
        session_destroy();
        header('location:/index');

        return true;
    }


    public function actionProfileUser(){
        $page_settings = Public_model::getPageData('profile');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        require_once MAIN_URL.'/views/profile.php';

        return true;
    }
    public function actionAddComment(){
        if (isset($_POST['name'], $_POST['id'], $_POST['id_item'], $_POST['fulldescription'])){
            $data = array(
                'name' => $_POST['name'],
                'id_user' => $_POST['id'],
                'id_item' => $_POST['id_item'],
                'fulldescription' => $_POST['fulldescription'],
            );
        }
        header('location:'.$_SERVER['HTTP_REFERER'].'/?comment=true');

        return true;
    }
    public function actionOrders(){
        $page_settings = Public_model::getPageData('orders');
        $this->page_title = $page_settings[0]['title_'.$_SESSION['lang']];
        $this->meta_title = $page_settings[0]['meta_title_'.$_SESSION['lang']];
        $this->meta_description = $page_settings[0]['meta_decription_'.$_SESSION['lang']];
        $this->meta_keywords = $page_settings[0]['meta_keywords_'.$_SESSION['lang']];

        if ($this->is_logined == true){
            require_once MAIN_URL.'/models/Basced_model.php';
            $client = Basced_model::getOrder($_SESSION['id']);

            require_once MAIN_URL.'/views/orders.php';
        }else{
            header('location:/user/login');
        }


        return true;
    }
}