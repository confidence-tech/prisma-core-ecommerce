<?php
require_once ROOT.'/config/security.php';
require_once ROOT.'/models/Main_model.php';

class PageController
{
    public function actionDisplayTable(){
        $res = Main_model::getPageSetting();

        require_once ROOT.'/views/page/index.php';
        return true;
    }

    public function actionTranslatesGet(){
        $translates = Main_model::getTranslateGet();
        require_once ROOT.'/views/page/translates.php';

        return true;
    }

    public function actionTextTable(){
        $res = Main_model::getTextVar();
        require_once ROOT.'/views/page/texts.php';

        return true;
    }
    public function actionTextEdit($id){
        $id_var = $id;
        $res = Main_model::getLangVar($id);
        require_once ROOT.'/views/page/edit-textvar.php';

        return true;
    }
    public function actionTextEditSuccess(){
        if (isset($_POST['text'], $_POST['id']) && !empty($_POST['text']) && !empty($_POST['id'])){
            Main_model::updateTextVar($_POST['text'], $_POST['id']);
        }
        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionAddBanner(){
        require_once ROOT.'/views/visitors/banner-add.php';

        return true;
    }
    public function actionAddBannerSuccess(){
        if (isset($_POST['url']) && !empty($_POST['url'])){
            if ($_FILES['photo']['error']==0){
                $name_photo = time().$_FILES['photo']['name'];
                $tmp_photo = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp_photo, "../assets/banners/{$name_photo}");
                $photo = $name_photo;
            }else{
                $photo = 'no_photo.jpg';
            }
            $data = array(
                'url' => $_POST['url'],
                'photo' => $photo,
            );

            Main_model::addBanner($data);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/blog-table');


        return true;
    }

    public function actionTranslateEditDisplay(){
        if (isset($_POST['id'], $_POST['f_ru'])){
            $data = array(
                'id' => $_POST['id'],
                'f_ru' => $_POST['f_ru'],
            );

            $result = Main_model::getEditTranslate($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/translates');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/translates');
            }
        }
        return true;
    }




    public function actionTranslateEdit($id){
        $translate = Main_model::getCurrentTranslate($id);

        require_once ROOT.'/views/page/page-translates.php';
        return true;
    }

    public function actionDetailsOrder($id){
        $tmp = Main_model::getOrdersInfo($id);
        $client = Main_model::getOrdersDetails($tmp['id']);
        require_once ROOT.'/views/order.php';
        return true;
    }
    public function actionStatusUpdate($id_client, $id_status){
        Main_model::updateStatus($id_client, $id_status);
        header('location:'.$_SERVER['HTTP_REFERER']);

        return true;
    }

    public function actionPageEdit($id){
        $res = Main_model::getPageSetting($id);

        require_once ROOT.'/views/page/edit.php';

        return true;
    }

    public function actionPageBanner(){
        $res = Main_model::getBanners();

        require_once ROOT.'/views/page/banners.php';

        return true;
    }
    public function actionAddBlog(){
        require_once ROOT.'/views/add-blog.php';

        return true;
    }

    public function actionContactsEdit(){
        $res = Main_model::getPageContacts();

        require_once ROOT.'/views/page/contact-info.php';

        return true;
    }
    public function actionBlogTable(){
        $translates = Main_model::getBlogs();

        require_once ROOT.'/views/blog-table.php';

        return true;
    }
    public function actionDeleteBlog($id){
        $blog = Main_model::getBlog($id);
        if ($blog['photo'] != 'no_photo.jpg'){
            unlink("../assets/blog/{$blog['photo']}");
        }
        Main_model::deleteBlog($id);
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/blog-table');

        return true;
    }
    public function actionDeleteBanner($id){
        $banner = Main_model::getBanner($id);
        if ($banner['photo'] != 'no_photo.jpg'){
            unlink("../assets/banners/{$banner['photo']}");
        }
        Main_model::deleteBanner($id);
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/banner-table');

        return true;
    }
    public function actionContactsSuccess(){
        if (isset($_POST['email'], $_POST['adress'], $_POST['phone_1'], $_POST['phone_2'])){
            $data = array(
                'email' => $_POST['email'],
                'adress' => $_POST['adress'],
                'phone_1' => $_POST['phone_1'],
                'phone_2' => $_POST['phone_2'],
            );

            $res = Main_model::editPageContacts($data);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/contacts');

        return true;
    }

    public function actionAddBlogComplete(){
        if (isset($_POST['author'], $_POST['fulldescription'])){
            if ($_FILES['photo']['error']==0){
                $name_photo = time().$_FILES['photo']['name'];
                $tmp_photo = $_FILES['photo']['tmp_name'];
                move_uploaded_file($tmp_photo, "../assets/blog/{$name_photo}");
                $photo = $name_photo;
            }else{
                $photo = 'no_photo.jpg';
            }
            $data = array(
                'author' => $_POST['author'],
                'fulldescription' => $_POST['fulldescription'],
                'photo' => $photo,
                'title' => $_POST['title']
            );

            $res = Main_model::addBlog($data);
        }
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/blog-table');

        return true;
    }


    public function actionPageSuccessEdit(){
        if (isset($_POST['title_ru'],$_POST['meta_title_ru'],$_POST['meta_description_ru'],$_POST['meta_keywords_ru'])){
            $data = array(
                'id' => $_POST['id'],
                'title_ru' => $_POST['title_ru'],
                'meta_title_ru' => $_POST['meta_title_ru'],
                'meta_description_ru' => $_POST['meta_description_ru'],
                'meta_keywords_ru' => $_POST['meta_keywords_ru'],
            );

            $result = Main_model::getEditPage($data);
            if ($result == 1){
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/page/constructor');
            }else{
                header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/page/constructor');
            }
        }

        return true;
    }
}