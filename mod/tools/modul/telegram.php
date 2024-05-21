<?php

namespace Mod\Tools\Modul;
Class Telegram{
        
    public $token = '********';
    public $chat_id = '********';// сюда нужно вписать ваш внутренний айдишник
   

    public function message($h,$text,$token = null,$chat_id = null)
    {
        if($token == null){
            $token = $this->token;
        }
        if($chat_id == null){
            $chat_id = $this->chat_id;
        }
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => $chat_id,
                    'text' => $text,
                ),
            )
        );

        if(curl_exec($ch)){
            $h["telegram"]["status"] = "Успешко выполнен";
        }else{
            $h["telegram"]["status"] = "Ошибка";
            $h["error"]["telegram"]="Ошибка отправки";
        }
        return $h;
    }


}
