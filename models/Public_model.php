<?php
require_once MAIN_URL . '/components/Db.php';

class Public_model
{
    public static $data = array();

    public static $count_item_pagination = 24;

    public static function displayPagination($filter, $search_text, $color, $order, $minMax, $outlet, $colors, $cat_ln, $brand_ln){
        $db = Db::getConnection();
        $zapis = self::$count_item_pagination;
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, colichestvo, dep, rate_prod FROM assort";

        $clr_ext = false;
        if ($colors != ''){
            $clr_ext = true;
            $query.=" INNER JOIN attributes_val ON assort.id=attributes_val.id_item";
        }
        $query.=" WHERE price >= {$minMax['min']} AND price <= {$minMax['max']}";

        if ($clr_ext == true){
            $query.=$colors;
        }
        if ($brand_ln != ''){
            $query.=$brand_ln;
        }
        if ($cat_ln != ''){
            $query.=$cat_ln;
        }
        if ($filter != 'all'){
            $query.=" AND id_type={$filter}";
        }

        if ($color != 'all'){
            $query.=" AND assort.color_id={$color}";
        }
        if (isset($outlet) && $outlet != ''){
            if ($outlet == 'man'){
                $query.=" AND gender=1";
            }elseif($outlet == 'woman'){
                $query.=" AND gender=2";
            }
        }

        if ($order != 'default'){
            switch ($order){
                case 1:
                    $query.=" ORDER BY model DESC";
                    break;
                case 2:
                    $query.=" ORDER BY rate DESC";
                    break;
                case 3:
                    $query.=" ORDER BY product_data DESC";
                    break;
                case 4:
                    $query.=" ORDER BY price ASC";
                    break;
                case 5:
                    $query.=" ORDER BY price DESC";
                    break;
                default:
                    break;
            }
        }

        if (isset($search_text) && !empty($search_text) && $search_text != ''){
            if ($search_text != ''){
                $search = $search_text;
                $search1 = str_replace(',', ' ', $search);
                $words = explode(' ', $search1);
            }

            $arr_words = [];
            if (count($words) > 0){
                foreach ($words as $tmp){
                    if (!empty($tmp)){
                        $arr_words[] = $tmp;
                    }
                }
            }

            $final_words = [];
            if (count($arr_words) > 0){
                foreach ($arr_words as $tmp){
                    array_push($final_words, " model_{$_SESSION['lang']} LIKE CONCAT('%', '{$tmp}', '%')");
                }
            }
            $result_where = implode(' OR ', $final_words);
            if (!empty($final_words)){
                $query.=" AND ($result_where)";
            }
        }

        $resultNumRow = $db->query($query)->rowCount();

        $countPages = ceil($resultNumRow/$zapis);

        return $countPages;
    }

    public static function securityCodeCheck($code){
        $db = Db::getConnection();

        $query = "SELECT * FROM security_tbl WHERE message='{$code}'";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function insertSupport($telegram, $message){
        $db = Db::getConnection();

        $query = "SELECT * FROM community WHERE telegram='{$telegram}' && fulldescription='{$message}'";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        if (empty($res)){
            $queryInsert = $db->prepare("INSERT INTO community(telegram, fulldescription) VALUES (:telegram, :fulldescription)");
            $resInsert = $queryInsert->execute([
                ':telegram' => $telegram,
                ':fulldescription' => $message
            ]);
            return $resInsert;
        }else{
            return 'hash';
        }
    }

    public static function getUserByIdAndEmail($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM profiles WHERE id={$id}";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);


        return $result;
    }
    public static function getAttr($id){
        $db = Db::getConnection();
        $query = "SELECT * FROM attributes WHERE id_category='all' OR id_category='{$id}'";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /*
    * Авторизация пользователя
    */
    public static function loginUserProfile($data)
    {
        $db = Db::getConnection();

        $query = "SELECT id, f_name FROM profiles WHERE email='{$data['email']}' AND password=SHA1('{$data['password']}')";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        if (isset($result['id']) && !empty($result['id'])) {
            if ($data['remember-me'] == 1){
                $_SESSION['id'] = $result['id'];
                setcookie('id', $result['id'], time() + 2 * 60 * 60 * 60 * 60);

            }elseif ($data['remember-me'] == 0){
                $_SESSION['id'] = $result['id'];
            }

            return 1;
        } else {
            return 0;
        }
    }

    public static function createProfile($data)
    {
        $db = Db::getConnection();
        $query = "INSERT INTO profiles(f_name, l_name, email, password) VALUES ('{$data['f_name']}', '{$data['l_name']}', '{$data['email']}', SHA1('{$data['password']}'))";

        $res = Public_model::getProfile($data['name'], $data['password']);
        if ($res == 0){
            $_SESSION['f_name'] = $data['f_name'];
            $_SESSION['email'] = $data['email'];
            $res = $db->query($query);
            $_SESSION['id'] = $db->lastInsertId();
            return 0;
        }else{
            return 1;
        }
    }
    public static function editProfile($data)
    {
        $db = Db::getConnection();
        $query = "UPDATE profiles SET f_name='{$data['f_name']}', l_name='{$data['l_name']}', phone='{$data['phone']}', city='{$data['city']}', adress='{$data['adress']}', zip='{$data['zip']}' WHERE id={$data['id_user']}";
        echo $query;
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public static function getImgById($id){
        $db = Db::getConnection();
        $query = "SELECT name_photo FROM photo WHERE main=1 AND id_tovar={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        return $res['name_photo'];
    }
    public static function getLangVar(){
        $db = Db::getConnection();
        $query = "SELECT * FROM lang_var";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function displayItem($filter, $search_text, $skipFormula = 3, $color, $order, $minMax, $outlet, $colors, $cat_ln, $brand_ln){
        $db = Db::getConnection();
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, colichestvo, dep, rate_prod FROM assort";

        $clr_ext = false;
        if ($colors != ''){
            $clr_ext = true;
            $query.=" INNER JOIN attributes_val ON assort.id=attributes_val.id_item";
        }

        $query.=" WHERE price >= {$minMax['min']} AND price <= {$minMax['max']}";
        if ($clr_ext == true){
            $query.=$colors;
        }
        if ($brand_ln != ''){
            $query.=$brand_ln;
        }
        if ($cat_ln != ''){
            $query.=$cat_ln;
        }
        if ($filter != 'all'){
            $query.=" AND id_type={$filter}";
        }


        if ($color != 'all'){
            $query.=" AND assort.color_id={$color}";
        }



        if (isset($outlet) && $outlet != ''){
            if ($outlet == 'man'){
                $query.=" AND gender=1";
            }elseif($outlet == 'woman'){
                $query.=" AND gender=2";
            }
        }


        if ($order != 'default'){
            switch ($order){
                case 1:
                    $query.=" ORDER BY model DESC";
                    break;
                case 2:
                    $query.=" ORDER BY rate DESC";
                    break;
                case 3:
                    $query.=" ORDER BY product_data DESC";
                    break;
                case 4:
                    $query.=" ORDER BY price ASC";
                    break;
                case 5:
                    $query.=" ORDER BY price DESC";
                    break;
                default:
                    break;
            }
        }

        if (isset($search_text) && !empty($search_text) && $search_text != ''){
            if ($search_text != ''){
                $search = $search_text;
                $search1 = str_replace(',', ' ', $search);
                $words = explode(' ', $search1);
            }

            $arr_words = [];
            if (count($words) > 0){
                foreach ($words as $tmp){
                    if (!empty($tmp)){
                        $arr_words[] = $tmp;
                    }
                }
            }

            $final_words = [];
            if (count($arr_words) > 0){
                foreach ($arr_words as $tmp){
                    array_push($final_words, " model_{$_SESSION['lang']} LIKE CONCAT('%', '{$tmp}', '%')");
                }
            }
            $result_where = implode(' OR ', $final_words);
            if (!empty($final_words)){
                $query.=" AND ($result_where)";
            }
        }

        $query.=" LIMIT {$skipFormula}, ".self::$count_item_pagination;
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($result); $i++){
            $result[$i]['name_photo'] = self::getImgById($result[$i]['id']);
        }
        return $result;
    }

    public static function getContactInfo(){
        $db = Db::getConnection();
        $query = "SELECT * FROM contact_info";
        $result = $db->query($query)->fetch();

        return $result;
    }

    public static function getComments($id_item){
        $db = Db::getConnection();
        $query = "SELECT * FROM comments WHERE id_item={$id_item} ORDER BY date_create DESC";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getSizes($id_item){
        $db = Db::getConnection();
        $query = "SELECT size FROM assort WHERE id={$id_item}";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result['size'];
    }

    public static function getPageConstructor($slug){
        $db = Db::getConnection();
        $query = "SELECT * FROM pages WHERE page='{$slug}'";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function topRateItem()
    {
        $db = Db::getConnection();
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, name_photo, dep, rate_prod FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE photo.main=1 ORDER BY rate DESC LIMIT 4";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUsaEuroOutlet()
    {
        $db = Db::getConnection();
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, name_photo, dep, rate_prod FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE photo.main=1 AND old_price != 0 LIMIT 4";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getTusovka()
    {
        $db = Db::getConnection();
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, name_photo, dep, rate_prod FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE id_type=3 OR id_type=2 AND photo.main=1 AND old_price != 0 LIMIT 8";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function newItems()
    {
        $db = Db::getConnection();
        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, old_price, name_photo, dep, rate_prod FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE photo.main=1 ORDER BY product_data DESC LIMIT 4";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    public static function addPayment($data)
    {
        $db = Db::getConnection();
        $query = $db->prepare("INSERT INTO quests(sum, val, telegram, product_name, product_id, product_count) VALUES (:sum, :val, :telegram, :product_name, :product_id, :product_count)");
        $query->execute(
            [
                ':sum' => $data['sum'],
                ':val' => $data['val'],
                ':telegram' => $data['telegram'],
                ':product_name' => $data['product_name'],
                ':product_id' => $data['product_id'],
                ':product_count' => $data['product_count'],
            ]
        );

        return $db->lastInsertId();
    }
    public static function addComment($data)
    {
        $db = Db::getConnection();
        $query = $db->prepare("INSERT INTO comments(name, fulldescription, id_item, id_user) VALUES (:name, :fulldescription, :id_item, :id_user)");
        $res = $query->execute(
            [
                ':name' => $data['name'],
                ':fulldescription' => $data['fulldescription'],
                ':id_item' => $data['id_item'],
                ':id_user' => $data['id_user']
            ]
        );

        return $res;
    }

    public static function exist4Order($data)
    {
        $db = Db::getConnection();
        $query = "SELECT * FROM quests WHERE sum='{$data['sum']}' AND val='{$data['val']}' AND telegram='{$data['telegram']}' AND product_id='{$data['product_id']}' AND product_count='{$data['product_count']}'";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getDataPages(){
        $db = Db::getConnection();
        $query = "SELECT * FROM info_data";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getOrder($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM quests WHERE id={$id}";

        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);


        return $res;
    }
    public static function getBlog($limit){
        $db = Db::getConnection();

        $query = "SELECT * FROM blog ORDER BY data_create DESC LIMIT 0,{$limit}";

        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);


        return $res;
    }
    public static function getBlogById($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM blog WHERE id={$id}";

        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);


        return $res;
    }
    public static function getBanners(){
        $db = Db::getConnection();

        $query = "SELECT * FROM banner ORDER BY date_add DESC";

        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);


        return $res;
    }

    public static function insertQuest($data){
        $db = Db::getConnection();
        $query = $db->prepare("INSERT INTO quests(name, surname, email, fulldescription) VALUES (:con_name,:surname,:email,:message)");
        $res = $query->execute(
            [
                ':con_name' => $data['name'],
                ':surname' => $data['surname'],
                ':email' => $data['email'],
                ':message' => $data['message'],
            ]
        );

        return $res;
    }

    public static function getPageData($slug){
        $db = Db::getConnection();

        $query = "SELECT * FROM page_setting WHERE page_slug='{$slug}'";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getProfile($login, $pass){
        $db = Db::getConnection();

        $query = "SELECT * FROM profiles WHERE email='{$login}' AND password=SHA1('{$pass}')";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getMinMax(){
        $db = Db::getConnection();

        $queryMin = "SELECT MIN(price) AS min FROM assort";
        $res['min'] = $db->query($queryMin)->fetchAll(PDO::FETCH_ASSOC);
        $queryMax = "SELECT MAX(price) AS max FROM assort";
        $res['max'] = $db->query($queryMax)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function displayProductInfo($id){
        $db = Db::getConnection();
        $queryRateUp = "UPDATE assort SET rate=rate+1 WHERE id={$id}";
        $res = $db->query($queryRateUp);

        $query = "SELECT assort.id AS id, model_ru AS model, price, usa_outlet, euro_outlet, fulldescription_ru AS fulldescription, details_count, id_type, index_tovar, colichestvo, old_price, rate, size, split_in, brand, gender, name_photo,  dep, rate_prod  FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE main=1 AND assort.id=".$id;
        self::$data['result'] = $db->query($query)->fetch();
        if (self::relativeItems(self::$data['result']['id_type'])){
            self::$data['relative'] = self::relativeItems(self::$data['result']['id_type']);
        }else{
            self::$data['relative'] = array();
        }
        self::$data['photos'] = self::photoItems($id);

        return self::$data;
    }

    public static function getColor($str){
        $db = Db::getConnection();

        $query = "SELECT * FROM attributes_val WHERE id_attr=1";
        $query.=' '.$str;
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function checkOtherSplitItems($id){
        $db = Db::getConnection();

        $query = "SELECT split_in FROM assort WHERE split_in LIKE '%{$id}%'";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getEqvuaring(){
        $db = Db::getConnection();

        $query = "SELECT * FROM equaring";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getColors(){
        $db = Db::getConnection();

        $query = "SELECT value FROM attributes_val WHERE id_attr=1 GROUP BY value";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getBrandForId($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM country WHERE id={$id}";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getAttrItem($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM attributes_val INNER JOIN attributes ON attributes.id=attributes_val.id_attr WHERE id_item={$id}";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function photoItems($id){
        $db = Db::getConnection();

        $query = "SELECT * FROM photo WHERE id_tovar={$id} AND  main=0";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function activePlusPlus(){
        $db = Db::getConnection();

        $query = "UPDATE viewed_page SET count_view=count_view+1 WHERE id=1";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function relativeItems($id_cat){
        $db = Db::getConnection();

        $query = "SELECT assort.id AS id, model_{$_SESSION['lang']} AS model, price, fulldescription_{$_SESSION['lang']} AS fulldescription, id_type, index_tovar, colichestvo, old_price, rate, name_photo, dep, rate_prod  FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE main=1 AND id_type=".$id_cat." LIMIT 8";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getCountry(){
        $db = Db::getConnection();

        $query = "SELECT * FROM country";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    public static function searchParameters($search, $query){
        if (isset($search) && $search != ''){
            $search1 = $search;
            $search = str_replace(',' , ' ', $search1);
            $words = explode(' ', $search);
        }
        $arr_words = array();
        if (count($words) > 0){
            foreach ($words as $tmp){
                if (!empty($tmp)){
                    $arr_words[] = $tmp;
                }
            }
        }
        $final_words = array();
        if (count($arr_words) > 0){
            foreach ($arr_words as $tmp){
                array_push($final_words," name LIKE '%$tmp%'");
            }
        }
        $result_where  = implode(" OR ", $final_words);
        if (!empty($result_where)){
            $query.=" AND ($result_where)";
        }

        return $query;
    }

    public static function countItems(){
        $db = Db::getConnection();

        $pages = "SELECT id FROM assort";
        $res = $db->query($pages)->rowCount();

        return $res;
    }
    public static function countWishlist($id){
        $db = Db::getConnection();

        $pages = "SELECT id FROM wishlist WHERE id_user={$id}";
        $res = $db->query($pages)->rowCount();

        return $res;
    }
}