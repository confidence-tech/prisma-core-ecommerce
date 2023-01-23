<?php
require_once MAIN_URL.'/models/Public_model.php';

class ProductController
{

    public function actionIndex(){
        $result = Public_model::displayItem();

        require_once MAIN_URL.'/views/main.php';

        return true;
    }

    public function actionAddSupport(){
        if (isset($_POST['telegram'], $_POST['message'])){
            $res = Public_model::insertSupport($_POST['telegram'], $_POST['message']);
            require_once MAIN_URL.'/views/ticket-success.php';
        }else{
            header('location:/');
        }

        return true;
    }

    public function actionPasswordPage(){
        $n = '';
        if (isset($_POST['message']) && !empty($_POST['message'])){
            $res = Public_model::securityCodeCheck($_POST['message']);

            if (!empty($res)){
                $_SESSION['hash_code'] = '8s6X55j2NiN8puCP';
                header('location:/');
            }else{
                $n = 'Такого пароля не существует. Пароль можно получить только от проверенных продавцов';
            }
        }
        require_once MAIN_URL.'/views/privacy.php';

        return true;
    }
}