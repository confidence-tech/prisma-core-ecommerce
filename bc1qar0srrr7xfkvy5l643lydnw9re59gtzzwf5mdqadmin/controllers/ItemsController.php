<?php
require_once ROOT.'/config/security.php';
require_once ROOT.'/models/Main_model.php';

class ItemsController
{
    public function actionAllCategory(){
        $project = Main_model::getCategory();

        require_once ROOT.'/views/items/category_table.php';
        return true;
    }
    public function actionAllItems(){
        $project = Main_model::displayItem();
        $category = Main_model::getCategory();

        require_once ROOT.'/views/items/table.php';
        return true;
    }

    public function actionPortfolioDisplay(){
        $project = Main_model::getPortfolio();

        require_once ROOT . '/views/items/table.php';
        return true;
    }
    public function actionEditAttr($id){
        $id_item = $id;
        $id_cat = Main_model::getCategoryId($id);
        $attr = Main_model::getAttr($id_cat['id_type']);
        require_once ROOT . '/views/items/attr.php';
        return true;
    }
    public function actionAddAttrForCat(){
        $category = Main_model::getCategory();
        require_once ROOT . '/views/items/add-attr.php';
        return true;
    }

    public function actionAddWork(){
        if (isset($_POST['model_ru'] ,$_POST['fulldescription_ru'])){
            if ($_FILES['photo']['error']==0){
                $name_photo = time().$_FILES['photo']['name'];
                $tmp_photo = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp_photo, "../assets/tovar/{$name_photo}");
                $photo = $name_photo;
            }else{
                $photo = 'no_photo.jpg';
            }


            $photos = array();
            if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])){
                for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                    if ($_FILES['files']['error'][$i] == 0) {
                        $tmp_photos_two = $_FILES['files']['tmp_name'][$i];
                        $photos_name = time().$_FILES['files']['name'][$i];
                        move_uploaded_file($tmp_photos_two, "../assets/tovar/{$photos_name}");
                        $photos[$i] = array(
                            'photo_name' => $photos_name,
                            'main' => 0,
                        );
                    }
                }
            }

            $size = '';
            if (!empty($_POST['size'])){
                $k = 0;
                foreach ($_POST['size'] as $size_m){
                    $size.=$size_m;
                    if ($size != '' && $k < count($_POST['size'])-1){
                        $size.=',';
                    }
                    $k++;
                }
            }
            $split_in = '';
            if (!empty($_POST['split_in'])){
                $n = 0;
                foreach ($_POST['split_in'] as $split_in_m){
                    $split_in.=$split_in_m;
                    if ($split_in != 0 && $n < count($_POST['split_in'])-1){
                        $split_in.=',';
                    }
                    $n++;
                }
                $n = 0;
            }

            $spl = explode(',', $split_in);
            foreach ($spl as $itm){
                Main_model::updateSplitIn($itm, $split_in);
            }


            if (isset($_POST['old_price']) && !empty($_POST['old_price'])){
                $old_price = $_POST['old_price'];
            }else{
                $old_price = 0;
            }



            $data = array(
                'model_ru' => $_POST['model_ru'],
                'fulldescription_ru' => $_POST['fulldescription_ru'],
                'price' => $_POST['price'],
                'old_price' => $old_price,
                'count' => $_POST['count'],
                'index' => $_POST['index'],
                'category' => $_POST['category'],
                'gender' => $_POST['gender'],
                'brand' => $_POST['brand'],
                'size' => $size,
                'split_in' => $split_in,
                'photo' => $photo,
                'photos' => $photos,
            );


            $result = Main_model::addWork($data);
            $attr = Main_model::getAttr('all');
            for ($i = 0; $i < count($attr); $i++){
                if (isset($_POST['attr_'.$attr[$i]['id']]) && !empty($_POST['attr_'.$attr[$i]['id']])){
                    Main_model::insertAttr($_POST['attr_'.$attr[$i]['id']], $attr[$i]['id'], $result);
                }
            }
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/items');
        return true;
    }



    public function actionEditAttrItem(){
        $id = $_POST['id'];
        Main_model::deltAllAttr($id);

        $id_cat = Main_model::getCategoryId($id);
        $count = Main_model::getAttr($id_cat['id_type']);

        for ($i = 0; $i < count($count); $i++){
            if (isset($_POST["attr_val_".$i])){
                Main_model::insertAttr($_POST["attr_val_".$i], $_POST["attr_id_".$i], $id);
            }else{
                break;
            }
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/item/attr/'.$id);

        return true;
    }

    public function actionItemsAdd(){
        $category = Main_model::getCategory();

        require_once ROOT . '/views/items/add.php';

        return true;
    }

    public function actionAllColors(){
        $colors = Main_model::getColors();

        require_once ROOT . '/views/items/colors.php';

        return true;
    }
    public function actionPageCreate(){
        $page = Main_model::getAllPageConstructor();

        require_once ROOT . '/views/items/colors.php';

        return true;
    }
    public function actionPageOption($id){
        $page = Main_model::getPageConstructorId($id);
        require_once ROOT . '/views/items/page-edit.php';

        return true;
    }
    public function actionPageConf(){
        if (isset($_POST['id'], $_POST['name'], $_POST['fulldescription'])){
            Main_model::updatePage($_POST['name'], $_POST['fulldescription'], $_POST['id']);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/page-azurin');

        return true;
    }



    public function actionColorDelete($id){
        if (isset($id) && !empty($id)){
            Main_model::deleteColor($id);
        }

        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/colors');
        return true;
    }

    public function actionItemDelete($id){
        if (isset($id) && !empty($id)){
            $res = Main_model::deleteItem($id);
            Main_model::deltAllAttr($id);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/items');


        return true;
    }

    public function actionEditDelete($id){
        $category = Main_model::getCategory();
        $id_item = $id;
        if (isset($id) && !empty($id)){
            $item = Main_model::getCurrentItem($id);
        }
        require_once ROOT . '/views/items/item-edit.php';

        return true;
    }

    public function actionItemEditSuccess(){
        if (isset($_POST['model_ru'] ,$_POST['fulldescription_ru'])){
            $size = '';
            if (!empty($_POST['size'])){
                $k = 0;
                foreach ($_POST['size'] as $size_m){
                    $size.=$size_m;
                    if ($size != '' && $k < count($_POST['size'])-1){
                        $size.=',';
                    }
                    $k++;
                }
            }
            $split_in = '';
            if (!empty($_POST['split_in'])){
                $n = 0;
                foreach ($_POST['split_in'] as $split_in_m){
                    $split_in.=$split_in_m;
                    if ($split_in != 0 && $n < count($_POST['split_in'])-1){
                        $split_in.=',';
                    }
                    $n++;
                }
                $n = 0;
            }

            $spl = explode(',', $split_in);
            foreach ($spl as $itm){
                Main_model::updateSplitIn($itm, $split_in);
            }


            if (isset($_POST['old_price']) && !empty($_POST['old_price'])){
                $old_price = $_POST['old_price'];
            }else{
                $old_price = 0;
            }



            $data = array(
                'model_ru' => $_POST['model_ru'],
                'fulldescription_ru' => $_POST['fulldescription_ru'],
                'price' => $_POST['price'],
                'old_price' => $old_price,
                'count' => $_POST['count'],
                'index' => $_POST['index'],
                'category' => $_POST['category'],
                'gender' => $_POST['gender'],
                'brand' => $_POST['brand'],
                'size' => $size,
                'split_in' => $split_in,
                'id' => $_POST['id'],
            );

            Main_model::updateWork($data);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/items');

        return true;
    }

    public function actionAddCategory(){
        require_once ROOT . '/views/items/category_add.php';

        return true;
    }
    public function actionDelAttr($id){
        Main_model::deleteAttr($id);
        Main_model::deleteAttrVal($id);

        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/all/attr');
        return true;
    }
    public function actionColorAdd(){
        require_once ROOT . '/views/items/add-color.php';

        return true;
    }
    public function actionAllAttr(){
        $attr = Main_model::getAllAttr();
        require_once ROOT . '/views/items/all-attr.php';

        return true;
    }
    public function actionEditPhoto($id){
        $id_item = $id;
        $photo = Main_model::getPhoto($id);

        require_once ROOT . '/views/items/photo-edit.php';

        return true;
    }

    public function actionAddCurrentPhoto(){
        if (isset($_POST['id']) && !empty($_POST['id'])){
            if ($_FILES['photo']['error']==0){
                $name_photo = time().$_FILES['photo']['name'];
                $tmp_photo = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp_photo, "../assets/tovar/{$name_photo}");
                $photo = $name_photo;
                Main_model::newPhoto($_POST['id'], 0, $photo);
            }
        }
        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionEditAllPhoto($id){
        $id_item = $id;
        $photos = Main_model::getAllPhotos($id);

        require_once ROOT . '/views/items/all-photos.php';

        return true;
    }
    public function actionDeleteCurrentPhoto($id){
        $photo = Main_model::getPhotoById($id);
        unlink("../assets/tovar/{$photo}");

        Main_model::delPhotoById($id);


        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionEditPhotoSuccess(){
        if (isset($_POST['id'], $_POST['old_photo']) && !empty($_POST['id']) && !empty($_POST['old_photo'])){
            if ($_FILES['photo']['error']==0){
                $name_photo = time().$_FILES['photo']['name'];
                $tmp_photo = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp_photo, "../assets/tovar/{$name_photo}");
                $photo = $name_photo;

                if ($_POST['old_photo'] != 'no_photo.jpg'){
                    unlink("../assets/tovar/{$_POST['old_photo']}");
                }
                Main_model::delPhoto($_POST['id'], 1);
                Main_model::newPhoto($_POST['id'], 1, $photo);
            }
        }
        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionColorAddSuccess(){
        if (isset($_POST['name_ru'])){
            $data = array(
                'name_en' => $_POST['name_ru'],
                'name_ru' => $_POST['name_ru'],
                'name_sp' => $_POST['name_ru'],
            );

            $result = Main_model::addColor($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/main/colors');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/colors');
            }
        }
        return true;
    }
    public function actionAttrAddSuccess(){
        if (isset($_POST['name'], $_POST['category'])){
            $data = array(
                'name' => $_POST['name'],
                'category' => $_POST['category'],
            );

            $result = Main_model::addAttr($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }
        }
        return true;
    }

    public function actionCategoryDelete($id){
        if (isset($id)){
            $result = Main_model::categoryDelete($id);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }
        }
        return true;
    }

    public function actionCategoryEdit($id){
        if (isset($id)){
            $result = Main_model::getCategoryById($id);
        }

        require_once ROOT . '/views/items/category_edit.php';

        return true;
    }

    public function actionCategoryAddSuccess(){
        if (isset($_POST['name_ru'])){
            if ($_POST['gender'] == 1){
                $is_man = 1;
                $is_woman = 0;
            }else{
                $is_man = 0;
                $is_woman = 1;
            }
            $data = array(
                'name_en' => $_POST['name_ru'],
                'name_ru' => $_POST['name_ru'],
                'name_sp' => $_POST['name_ru'],
                'is_man' => $is_man,
                'is_woman' => $is_woman,
                'is_accessorize' => $_POST['access'],
            );

            $result = Main_model::addCategory($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }
        }
        return true;
    }

    public function actionCategoryEditSuccess(){
        if (isset($_POST['id'], $_POST['name_en'], $_POST['name_ru'], $_POST['name_sp'])){
            $data = array(
                'name_en' => $_POST['name_en'],
                'name_ru' => $_POST['name_ru'],
                'name_sp' => $_POST['name_sp'],
                'id' => $_POST['id'],
            );

            $result = Main_model::editCategory($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/category');
            }
        }
        return true;
    }
}