<?php

class Main_model
{
    public static function displayItem(){
        $db = Db::connection();
        $query = "SELECT assort.id AS id, model_ru AS model, price, old_price, name_photo, colichestvo, size, split_in FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE photo.main=1 ORDER BY assort.id DESC";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getOrder(){
        $db = Db::connection();

        $query = "SELECT client.id, client.name AS name, client.adress AS adress, client.phone AS phone, city, client.mail AS mail, id_client, pay_type, id_item, status, relation_order.count, assort.model_ru AS model, assort.colichestvo AS count_item,assort.price AS price, photo.name_photo 
                  FROM client INNER JOIN relation_order ON client.id=relation_order.id_client
                  INNER JOIN assort ON id_item=assort.id INNER JOIN photo ON photo.id_tovar=id_item WHERE photo.main=1 ORDER BY relation_order.data_order DESC";


        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);


        return $res;
    }

    public static function getAttrForCategory($id){
        $db = Db::connection();
        $query = "SELECT * FROM attributes WHERE id_category='all' OR id_category='{$id}'";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getBanners(){
        $db = Db::connection();
        $query = "SELECT * FROM banner ORDER BY id DESC";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getBanner($id){
        $db = Db::connection();
        $query = "SELECT * FROM banner WHERE id={$id}";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function deleteBanner($id){
        $db = Db::connection();
        $query = "DELETE FROM banner WHERE id={$id}";

        $result = $db->query($query);

        return $result;
    }
    public static function getEqvuaring(){
        $db = Db::connection();

        $query = "SELECT * FROM equaring";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function eqvuaringEdit($data){
        $db = Db::connection();
        $query = "UPDATE equaring SET login='{$data['login']}', pass='{$data['pass']}' WHERE id=1";
        $result = $db->query($query);

        return $result;
    }
    public static function getAttr($id){
        $db = Db::connection();
        $query = "SELECT * FROM attributes WHERE id_category='all' OR id_category='{$id}'";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function insertAttr($val, $id, $id_item){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO attributes_val(id_attr, value, id_item) VALUES (:id_attr, :value, :id_item)");

        $result = $query->execute([
            ':id_attr' => $id, ':value' => $val, ':id_item' => $id_item
        ]);

        return $result;
    }
    public static function addAttr($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO attributes(id_category, type) VALUES (:id_category, :type)");

        $result = $query->execute([
            ':id_category' => $data['category'], ':type' => $data['name']
        ]);

        return $result;
    }
    public static function addBlog($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO blog(author, photo, fulldescription, title) VALUES (:author, :photo, :fulldescription, :title)");

        $result = $query->execute([
            ':author' => $data['author'], ':photo' => $data['photo'], ':fulldescription' => $data['fulldescription'], ':title' => $data['title']
        ]);

        return $result;
    }
    public static function addBanner($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO banner(url, photo) VALUES (:url, :photo)");

        $result = $query->execute([
            ':url' => $data['url'], ':photo' => $data['photo']
        ]);

        return $result;
    }
    public static function deltAttr($id, $id_item){
        $db = Db::connection();
        $query = "DELETE FROM attributes_val WHERE id_attr={$id} AND id_item={$id_item}";

        $result = $db->query($query);

        return $result;
    }
    public static function deltAllAttr($id_item){
        $db = Db::connection();
        $query = "DELETE FROM attributes_val WHERE id_item={$id_item}";

        $result = $db->query($query);

        return $result;
    }
    public static function getBlogs(){
        $db = Db::connection();
        $query = "SELECT * FROM blog ORDER BY data_create DESC";

        $result = $db->query($query);

        return $result;
    }
    public static function getBlog($id){
        $db = Db::connection();
        $query = "SELECT * FROM blog WHERE id={$id}";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function deleteBlog($id){
        $db = Db::connection();
        $query = "DELETE FROM blog WHERE id={$id}";
        $result = $db->query($query);

        return $result;
    }
    public static function getForIItemAttr($id, $id_item){
        $db = Db::connection();
        $query = "SELECT * FROM attributes_val WHERE id_attr={$id} AND id_item={$id_item}";

        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getCategory(){
        $db = Db::connection();
        $query = "SELECT * FROM typewear";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function deleteAttr($id){
        $db = Db::connection();
        $query = "DELETE FROM attributes WHERE id={$id}";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getAllPageConstructor(){
        $db = Db::connection();
        $query = "SELECT * FROM pages";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getPageConstructor($slug){
        $db = Db::connection();
        $query = "SELECT * FROM pages WHERE page='{$slug}'";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getPageConstructorId($id){
        $db = Db::connection();
        $query = "SELECT * FROM pages WHERE id='{$id}'";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function updatePage($name, $desc, $id){
        $db = Db::connection();
        $query = "UPDATE pages SET page_name='{$name}', fulldescription='{$desc}' WHERE id='{$id}'";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function deleteAttrVal($id){
        $db = Db::connection();
        $query = "DELETE FROM attributes_val WHERE id_attr={$id}";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getAllAttr(){
        $db = Db::connection();
        $query = "SELECT * FROM attributes";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getTranslateGet(){
        $db = Db::connection();
        $query = "SELECT * FROM info_data";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getTextVar(){
        $db = Db::connection();
        $query = "SELECT * FROM lang_var";

        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function getLangVar($id){
        $db = Db::connection();
        $query = "SELECT * FROM lang_var WHERE id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function updateTextVar($text, $id){
        $db = Db::connection();
        $query = "UPDATE lang_var SET text_val='{$text}' WHERE id={$id}";
        $res = $db->query($query);

        return $res;
    }

    public static function deleteColor($id){
        $db = Db::connection();
        $query = "DELETE FROM colors WHERE id={$id}";

        $result = $db->query($query);

        return $result;
    }

    public static function getAllMoney(){
        $db = Db::connection();

        $query = "SELECT SUM(all_get_money_usd), SUM(all_get_money_uah) FROM relation_order";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function lastPayment(){
        $db = Db::connection();

        $query = "SELECT * FROM finance ORDER BY date_time DESC LIMIT 10";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getPageSetting($id = null){
        $db = Db::connection();

        if ($id != null){
            $query = "SELECT * FROM page_setting WHERE id={$id}";
            $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        }else{
            $query = "SELECT * FROM page_setting";
            $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }

        return $res;
    }

    public static function getValidCountry(){
        $db = Db::connection();

        $query = "SELECT * FROM country";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function countApp(){
        $db = Db::connection();

        $query = "SELECT id FROM relation_order";
        $res = $db->query($query)->rowCount();

        return $res;
    }

    public static function profitComp(){
        $db = Db::connection();

        $query = "SELECT SUM(grow_money_usd), SUM(grow_money_uah) FROM relation_order WHERE status_payment=1";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function siteAktiv(){
        $db = Db::connection();

        $query = "SELECT SUM(count_view) FROM user_aktivity";
        $res = $db->query($query)->fetch(PDO::FETCH_NUM);

        return $res;
    }

    public static function getPortfolio(){
        $db = Db::connection();

        $query = "SELECT * FROM portfolio";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function deleteItem($id){
        $db = Db::connection();

        $query = "SELECT * FROM photo WHERE id_tovar={$id}";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        if (isset($res) && !empty($res) && count($res) > 0){
            foreach ($res as $item){
                if ($item['name_photo'] != 'no_photo.jpg'){
                    unlink("../assets/tovar/{$item['name_photo']}");
                }
            }
            $queryRE = "DELETE FROM photo WHERE id_tovar={$id}";
            $db->query($queryRE)->fetch();
        }

        $queryDel = "DELETE FROM assort WHERE id={$id}";
        $resDel = $db->query($queryDel);

        return $resDel;
    }

    public static function getViewCountry($limit = null){
        $db = Db::connection();

        $queryCount = "SELECT SUM(count_view) AS view_site FROM user_aktivity";
        $resCount = $db->query($queryCount)->fetch(PDO::FETCH_ASSOC);
        $query = "SELECT country, ANY_VALUE(flag_img) AS flag_img, SUM(count_view) AS view_site FROM user_aktivity GROUP BY country ORDER BY SUM(count_view) DESC";

        if ($limit != null){
            $query .= " LIMIT 6";
        }

        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $data = array();
        if (count($res) > 0){
            $onePercent = $resCount['view_site']/100;

            for ($i = 0; $i < count($res); $i++){
                $totalPercent = $res[$i]['view_site']/$onePercent;

                $data[$i] = array(
                    'country' => $res[$i]['country'],
                    'flag_img' => $res[$i]['flag_img'],
                    'view_site' => $res[$i]['view_site'],
                    'percent' => round($totalPercent, 2)
                );
            }
        }

        return $data;
    }

    public static function getEditPage($data){
        $db = Db::connection();

        $query = $db->prepare("UPDATE page_setting SET meta_title_ru=:meta_title_ru,meta_decription_ru=:meta_decription_ru,meta_keywords_ru=:meta_keywords_ru,title_ru=:title_ru WHERE id=:id");
        $res = $query->execute([
            'title_ru' => $data['title_ru'],
            'meta_title_ru' => $data['meta_title_ru'],
            'meta_decription_ru' => $data['meta_description_ru'],
            'meta_keywords_ru' => $data['meta_keywords_ru'],
            'id' => $data['id'],
        ]);

        return $res;
    }

    public static function getAllPhoto($id){
        $db = Db::connection();
        $query = "SELECT * FROM photo WHERE id_tovar={$id}";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getAllPhotos($id){
        $db = Db::connection();
        $query = "SELECT * FROM photo WHERE id_tovar={$id} AND main=0";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function addColor($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO colors(name_en, name_ru, name_sp) VALUES (:name_en, :name_ru, :name_sp)");
        $res = $query->execute([
            ':name_en' => $data['name_en'],
            ':name_ru' => $data['name_ru'],
            ':name_sp' => $data['name_sp']
        ]);

        return $res;
    }

    public static function addCategory($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO typewear(type_en, type_ru, type_sp, is_man, is_woman, is_accessorize) VALUES (:name_en, :name_ru, :name_sp, :is_man, :is_woman, :is_accessorize)");
        $res = $query->execute([
            ':name_en' => $data['name_en'],
            ':name_ru' => $data['name_ru'],
            ':name_sp' => $data['name_sp'],
            ':is_man' => $data['is_man'],
            ':is_woman' => $data['is_woman'],
            ':is_accessorize' => $data['is_accessorize'],
        ]);

        return $res;
    }

    public static function addCountry($data){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO country(name_ru) VALUES (:name_ru)");
        $res = $query->execute([
            ':name_ru' => $data['name_ru'],
        ]);

        return $res;
    }
    public static function delCountry($id){
        $db = Db::connection();
        $query = $db->prepare("DELETE FROM country WHERE id=:id");
        $res = $query->execute([
            ':id' => $id,
        ]);

        return $res;
    }

    public static function delPhoto($id, $main){
        $db = Db::connection();
        $query = "SELECT * FROM photo WHERE main={$main} AND id_tovar={$id}";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $queryDel = "DELETE FROM photo WHERE main={$main} AND id_tovar={$id}";
        $resDel = $db->query($queryDel)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    public static function newPhoto($id, $main, $photo_name){
        $db = Db::connection();
        $query = $db->prepare("INSERT INTO photo(id_tovar, main, name_photo) VALUES (:id_tovar, :main, :name_photo)");
        $result = $query->execute([
            ':id_tovar' => $id,
            ':main' => $main,
            ':name_photo' => $photo_name,
        ]);

        return $result;
    }

    public static function categoryDelete($id){
        $db = Db::connection();
        $query = $db->prepare("DELETE FROM typewear WHERE id=:id");
        $res = $query->execute([':id' => $id]);

        return $res;
    }

    public static function getCategoryId($id){
        $db = Db::connection();
        $query = "SELECT id_type FROM assort WHERE id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function getCategoryById($id){
        $db = Db::connection();
        $query = "SELECT * FROM typewear WHERE id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getOrdersInfo($order_id){
        $db = Db::connection();
        $query = "SELECT * FROM client WHERE client.id={$order_id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function getOrdersDetails($id_client){
        $db = Db::connection();
        $query = "SELECT id_client, id_item, relation_order.count, status, assort.model_ru AS model, assort.colichestvo AS count_item,assort.price AS price, photo.name_photo FROM relation_order INNER JOIN assort ON id_item=assort.id INNER JOIN photo ON photo.id_tovar=id_item WHERE photo.main=1 AND id_client={$id_client} ORDER BY relation_order.data_order DESC";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function addWork($data){
        $db = Db::connection();
        $query = $db->prepare(
            "INSERT INTO assort(model_ru, price, fulldescription_ru, id_type, index_tovar, colichestvo, old_price, size, split_in, gender, brand) VALUES (:model_ru, :price, :fulldescription_ru, :id_type, :index_tovar, :colichestvo, :old_price, :size, :split_in, :gender, :brand)"
        );

        $res = $query->execute([
            ':model_ru' => $data['model_ru'],
            ':price' => $data['price'],
            ':fulldescription_ru' => $data['fulldescription_ru'],
            ':id_type' => $data['category'],
            ':index_tovar' => $data['index'],
            ':colichestvo' => $data['count'],
            ':old_price' => $data['old_price'],
            ':size' => $data['size'],
            ':split_in' => $data['split_in'],
            ':gender' => $data['gender'],
            ':brand' => $data['brand'],
        ]);


        $id = $db->lastInsertId();

        $queryMainPhoto = $db->prepare("INSERT INTO photo (id_tovar, main, name_photo) VALUES(:id_tovar, :main, :name_photo)");
        $resMainPhoto = $queryMainPhoto->execute([
            ':id_tovar' => $id,
            ':main' => 1,
            ':name_photo' => $data['photo'],
        ]);



        if (isset($data['photos']) && count($data['photos']) > 0){
            for($i = 0; $i < count($data['photos']); $i++){
                $queryPhotos = $db->prepare("INSERT INTO photo (id_tovar, main, name_photo) VALUES(:id_tovar, :main, :name_photo)");
                $resPhotos = $queryMainPhoto->execute([
                    ':id_tovar' => $id,
                    ':main' => 0,
                    ':name_photo' => $data['photos'][$i]['photo_name'],
                ]);
            }
        }
        return $id;
    }

    public static function updateWork($data){
        $db = Db::connection();
        $query = "UPDATE assort SET model_ru='{$data['model_ru']}', price={$data['price']}, fulldescription_ru='{$data['fulldescription_ru']}', id_type={$data['category']}, index_tovar='{$data['index']}', colichestvo={$data['count']}, old_price={$data['old_price']}, size='{$data['size']}', split_in='{$data['split_in']}', gender={$data['gender']}, brand={$data['brand']} WHERE id={$data['id']}";
        $res = $db->query($query);

        return $res;
    }

    public static function updateStatus($id_client, $status){
        $db = Db::connection();
        $query = "UPDATE relation_order SET status={$status} WHERE id_client={$id_client}";
        $res = $db->query($query);

        return $res;
    }

    public static function editItem($data){
        $db = Db::connection();
        $query = $db->prepare(
            "UPDATE assort SET model_en=:model_en, model_ru=:model_ru, model_sp=:model_sp, price=:price, fulldescription_en=:fulldescription_en, fulldescription_ru=:fulldescription_ru, fulldescription_sp=:fulldescription_sp, id_type=:id_type, index_tovar=:index_tovar, colichestvo=:colichestvo, old_price=:old_price, details_count=:details_count, color_id=:color_id, usa_outlet=:usa_outlet, euro_outlet=:euro_outlet,dep => :dep, rate_prod => :rate_prod, 1lvl => :1lvl, 2lvl => :2lvl, 3lvl => :3lvl, 4lvl => :4lvl, 5lvl => :5lvl, 6lvl => :6lvl WHERE id=:id"
        );


        $res = $query->execute([
            ':model_en' => $data['model_ru'],
            ':model_ru' => $data['model_ru'],
            ':model_sp' => $data['model_ru'],
            ':price' => $data['price'],
            ':fulldescription_en' => $data['fulldescription_ru'],
            ':fulldescription_ru' => $data['fulldescription_ru'],
            ':fulldescription_sp' => $data['fulldescription_ru'],
            ':id_type' => $data['category'],
            ':index_tovar' => $data['index'],
            ':colichestvo' => $data['count'],
            ':old_price' => $data['old_price'],
            ':details_count' => $data['count_details'],
            ':color_id' => 0,
            ':usa_outlet' => $data['usa_out'],
            ':euro_outlet' => $data['euro_out'],
            'dep' => $data['dep'],
            'rate_prod' => $data['rate_prod'],
            '1lvl' => $data['1lvl'],
            '2lvl' => $data['2lvl'],
            '3lvl' => $data['3lvl'],
            '4lvl' => $data['4lvl'],
            '5lvl' => $data['5lvl'],
            '6lvl' => $data['6lvl'],
            ':id' => $data['id']
        ]);


        return $res;
    }

    public static function getMessage(){
        $db = Db::connection();
        $query = "SELECT * FROM quests";
        $res = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function updateSplitIn($id, $split_in){
        $db = Db::connection();
        $query = "UPDATE assort SET split_in='{$split_in}' WHERE id={$id}";
        $res = $db->query($query);

        return $res;
    }

    public static function getCurrentItem($id){
        $db = Db::connection();
        $query = "SELECT * FROM assort INNER JOIN photo ON assort.id=photo.id_tovar WHERE main=1 AND assort.id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function getCurrentTranslate($id){
        $db = Db::connection();
        $query = "SELECT * FROM info_data WHERE id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function getPhoto($id){
        $db = Db::connection();
        $query = "SELECT * FROM photo WHERE id_tovar={$id} AND main=1";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res['name_photo'];
    }
    public static function getPhotoById($id){
        $db = Db::connection();
        $query = "SELECT * FROM photo WHERE id={$id}";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res['name_photo'];
    }
    public static function delPhotoById($id){
        $db = Db::connection();
        $query = "DELETE FROM photo WHERE id={$id}";
        $res = $db->query($query);

        return $res;
    }

    public static function getPageContacts(){
        $db = Db::connection();
        $query = "SELECT * FROM contact_info";
        $res = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public static function editPageContacts($data){
        $db = Db::connection();
        $query = $db->prepare("UPDATE contact_info SET email=:email, adress=:adress, phone_1=:phone_1, phone_2=:phone_2 WHERE id=1");
        $res = $query->execute([
            ':email' => $data['email'],
            ':adress' => $data['adress'],
            ':phone_1' => $data['phone_1'],
            ':phone_2' => $data['phone_2'],
        ]);

        return $res;
    }

    public static function getEditTranslate($data){
        $db = Db::connection();
        $query = $db->prepare("UPDATE info_data SET fulldescription_ru=:fulldescription_ru WHERE id=:id");
        $res = $query->execute([
            ':fulldescription_ru' => $data['f_ru'],
            ':id' => $data['id'],
        ]);

        return $res;
    }

    public static function editCategory($data){
        $db = Db::connection();
        $query = $db->prepare("UPDATE typewear SET type_en=:type_en,type_ru=:type_ru,type_sp=:type_sp WHERE id=:id");
        $res = $query->execute([
            ':type_en' => $data['name_en'],
            ':type_ru' => $data['name_ru'],
            ':type_sp' => $data['name_sp'],
            ':id' => $data['id'],
        ]);

        return $res;
    }


    public static function addArchiveItem($id, $type){
        $db = Db::connection();

        $query = $db->prepare("UPDATE relation_order SET status=:type_arch WHERE id_client=:id");
        $res = $query->execute([':id' => $id,':type_arch' => $type]);

        if ($type == 2){
            $query1 = "SELECT id, id_item, count FROM relation_order WHERE id_client='{$id}'";
            $res1 = $db->query($query1)->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < count($res1); $i++){
                $query2 = $db->prepare("UPDATE assort SET colichestvo=colichestvo-:count_item WHERE id=:id_item");
                $res2 = $query2->execute([':count_item' => $res1[$i]['count'], ':id_item' => $res1[$i]['id_item']]);
            }
        }
        return $res;
    }

    public static function archiveDelete($id){
        $db = Db::connection();

        $query = $db->prepare("DELETE FROM relation_order WHERE id_client=:id");
        $res = $query->execute([':id' => $id]);

        return $res;
    }
}