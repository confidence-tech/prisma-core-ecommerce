<?php
require_once ROOT.'/config/security.php';

require_once ROOT.'/models/Main_model.php';
require_once ROOT.'/models/Application_model.php';

class PublicController
{
    public function actionDashDisplay(){
        $message = Main_model::getOrder();


        require_once ROOT.'/views/main.php';
        return true;
    }
    public function actionEquaring(){

        require_once ROOT.'/views/equaring.php';
        return true;
    }
    public function actionEquaringEdit(){
        $data = array(
            'login' => $_POST['login'],
            'pass' => $_POST['pass'],
        );
        Main_model::eqvuaringEdit($data);
        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/equaring');
        return true;
    }
}