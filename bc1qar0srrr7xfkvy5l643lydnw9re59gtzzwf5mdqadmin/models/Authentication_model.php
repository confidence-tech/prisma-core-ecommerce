<?php

class Authentication_model
{
    /*
    * Авторизация пользователя
    */
    public static function loginUser($data)
    {
        $db = Db::connection();

        $query = "SELECT id, name FROM users WHERE email='{$data['email']}' AND password=SHA1('{$data['password']}')";
        $result = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        if (isset($result[0]['id'])) {
            if ($data['remember-me'] == 1){
                setcookie('name', $result[0]['name'], time() + 2 * 60 * 60 * 60 * 60 * 60);
                setcookie('email', $data['email'], time() + 2 * 60 * 60 * 60 * 60 * 60);
            }elseif ($data['remember-me'] == 0){
                setcookie('name', $result[0]['name'], time() + 2 * 60);
                setcookie('email', $data['email'], time() + 2 * 60);
            }

            return 1;
        } else {
            return 0;
        }
    }

}