<?php

namespace Mod\User\Modul;

Class User{

    public function __construct($h){
        $h["user"] = [];
        $h["user"]["error"] = [];
        $h["user"]["cfg"] = new \Mod\User\Modul\Config;
        return $h;
    }

    public function register($h){

        $h["user"]["type"] = "register";
        //проверка авторизован ли
        $h = $this->ckeak_auth($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Проверить данные на получены ли
        $h = $this->use_button($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Проверить коректность данных
        $h = $this->ckeak_data($h);
        if($h["user"]["error"] != []) $this->error($h);    
        //Проверить свободен ли логин
        $h = $this->ckeak_free_login($h);
        if($h["user"]["error"] != []) $this->error($h); 
        //Обработать данные

        //сохранить данные

        //Подготовить ответ
        return $h;
    }

    public function login($h){

        return $h;
    }

    public function error($h){
        //TODO
        return $h;
    }

    public function ckeak_auth($h){
        if($h["user"]["error"] != []) return $h;
        if(isset($_SESSION["user_id"])){
            $h["user"]["error"][] = $h["user"]["cfg"]->err_its_auth;
        }
        return $h;
    }

    public function use_button($h){
        //TODO
        return $h;
    }

    public function ckeak_data($h){
        if($h["user"]["error"] != []) return $h;
        if(isset($h["post"]["login"]) ){
            if(mb_strlen($h["post"]["login"]) < $h["user"]["cfg"]->login_min){
                $h["user"]["error"][] = $h["user"]["cfg"]->login_min_msg;
            }
            if(mb_strlen($h["post"]["login"]) > $h["user"]["cfg"]->login_max){
                $h["user"]["error"][] = $h["user"]["cfg"]->login_max_msg;
            }
        }

        if(isset($h["post"]["password"]) ){
            if(mb_strlen($h["post"]["password"]) < $h["user"]["cfg"]->pass_min){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_min_msg;
            }
            if(mb_strlen($h["post"]["password"]) > $h["user"]["cfg"]->pass_max){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_max_msg;
            }
            if(!isset($h["post"]["password2"]) or ($h["post"]["password"] != $h["post"]["password2"])){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_not_pass2;
            }
        }

        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $h["user"]["error"][] = $h["user"]["cfg"]->mail_error_msg;
        }
        return $h;
    }

    public function ckeak_free_login($h){
        if($h["user"]["error"] != []) return $h;
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `router` WHERE `url` = ? LIMIT 1");
        $sth1->execute(array($sting_sql["url"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);

    }

}
