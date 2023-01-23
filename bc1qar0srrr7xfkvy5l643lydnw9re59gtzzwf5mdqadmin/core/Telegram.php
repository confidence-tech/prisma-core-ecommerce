<?php

class Telegram
{
    public static function sendMessageInBot($token, $chat_id, $message){
        if (isset($token, $chat_id, $message) && !empty($token) && !empty($chat_id) && !empty($message)){
            define('TELEGRAM_TOKEN', $token);
            // ваш внутренний ID
            define('TELEGRAM_CHATID', $chat_id);



            $ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ
            $res = curl_exec($ch); // Делаем запрос
            curl_close($ch); // Завершаем сеанс cURL

            return $res;
        }else{
            echo 'Telegram Api Error';
        }
    }
}