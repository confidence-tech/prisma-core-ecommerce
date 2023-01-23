<?php

require_once ROOT.'/models/Authentication_model.php';


class AuthController
{

    public function actionFormLoginDisplay(){
        if (!isset($_POST['send'])){
            require_once ROOT."/views/auth/login.php";
        }

        return true;
    }

    public function actionConfirmLogin(){
        date_default_timezone_set('GMT');
        if (isset($_POST['name'], $_POST['password']) && !empty($_POST['name']) && !empty($_POST['password'])){
            $remember = 0;
            if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'yes'){
                $remember = 1;
            }

            $data = array(
                'email' => $_POST['name'],
                'password' => $_POST['password'],
                'data_time' => date("Y-m-d H:i:s"),
                'remember-me' => $remember
            );
            $getLoginData = Authentication_model::loginUser($data);
            print_r($getLoginData);

            $arr = json_encode($getLoginData);

        }

        return true;
    }


    public function actionSignOut(){
        /*Обнуляем cookie*/
        setcookie('name', '', time()-2*60*60*60*60*60*2);
        setcookie('email', '', time()-2*60*60*60*60*60*2);

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['email'] = $_COOKIE['email'];

        session_destroy();

        header('location:/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/login');

        return true;
    }

}