<?php

namespace Mod\User\Modul;

Class User{

    public function start($h){
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
        $h = $this->clear_data_html($h);
        //сохранить данные
        $h = $this->save_user_data($h);
        //Подготовить ответ
        $h = $this->redirect($h);
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
        if(isset($h["url"]["post"]["go_reg"])){
            if($h["url"]["post"]["go_reg"] != "yes"){
                $h["user"]["error"][] = "no";
            }   
        }else{
            $h["user"]["error"][] = "no";
        }
        return $h;
    }

    public function ckeak_data($h){
        if($h["user"]["error"] != []) return $h;
        if(isset($h["url"]["post"]["login"]) ){
            if(mb_strlen($h["url"]["post"]["login"]) < $h["user"]["cfg"]->login_min){
                $h["user"]["error"][] = $h["user"]["cfg"]->login_min_msg;
            }
            if(mb_strlen($h["url"]["post"]["login"]) > $h["user"]["cfg"]->login_max){
                $h["user"]["error"][] = $h["user"]["cfg"]->login_max_msg;
            }
        }

        if(isset($h["url"]["post"]["password"]) ){
            if(mb_strlen($h["url"]["post"]["password"]) < $h["user"]["cfg"]->pass_min){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_min_msg;
            }
            if(mb_strlen($h["url"]["post"]["password"]) > $h["user"]["cfg"]->pass_max){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_max_msg;
            }
            if(!isset($h["url"]["post"]["password2"]) or ($h["url"]["post"]["password"] != $h["url"]["post"]["password2"])){
                $h["user"]["error"][] = $h["user"]["cfg"]->pass_not_pass2;
            }
        }

        if (!filter_var($h["url"]["post"]["mail"], FILTER_VALIDATE_EMAIL)) {
            $h["user"]["error"][] = $h["user"]["cfg"]->mail_error_msg;
        }
        return $h;
    }

    public function ckeak_free_login($h){
        if($h["user"]["error"] != []) return $h;
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1");
        $sth1->execute(array($h["url"]["post"]["login"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        if($res != []){
            $h["user"]["error"][] = $h["user"]["cfg"]->login_not_free_msg;
        }
        return $h;
    }

    public function clear_data_html($h){
        if($h["user"]["error"] != []) return $h;
        $h["user"]["data_reg"]=[];
        $ip = new \Mod\Tools\Modul\Ip;
        $hex = new \Mod\Tools\Modul\Hex;
        $h["user"]["data_reg"]["login"] = htmlspecialchars($h["url"]["post"]["login"]);
        $h["user"]["data_reg"]["password"] = password_hash(htmlspecialchars($h["url"]["post"]["password"]), PASSWORD_BCRYPT, ["cost" => $h["user"]["cfg"]->hash_cost]);
        $h["user"]["data_reg"]["mail"] = htmlspecialchars($h["url"]["post"]["mail"]);
        $h["user"]["data_reg"]["time"] = time();
        $h["user"]["data_reg"]["ip"] = $ip->get_ip();
        $h["user"]["data_reg"]["start_status"] = $h["user"]["cfg"]->start_status;
        $h["user"]["data_reg"]["hex"] = $hex->create(60,5);
        return $h;
    }

    public function save_user_data($h){
        if($h["user"]["error"] != []) return $h;
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `users` (
            login,
            pass,
            email,
            status_a,
            reg_ip,
            reg_time,
            auth_ip,
            auth_time,
            hash_reg
            ) VALUES ( ?,?,?,?,?,?,?,?,?)');
        $sth->execute(array(
            $h["user"]["data_reg"]["login"],
            $h["user"]["data_reg"]["password"] ,
            $h["user"]["data_reg"]["mail"],
            $h["user"]["data_reg"]["start_status"] ,
            $h["user"]["data_reg"]["ip"],
            $h["user"]["data_reg"]["time"],
            "",
            "",
            $h["user"]["data_reg"]["hex"]
        ));
        $h["user"]["go_send_reg"] = "yes";
        return $h;
    }

    public function redirect($h){
        if(isset($h["user"]["go_send_reg"])){
            if($h["user"]["go_send_reg"] == "yes"){
                $h = $this->senmail_conf_reg($h);
                header('Location: /user/regconfirm/', true, 303);
                exit();
            }else{
                return $h;
            }
        }else{
            return $h;
        }
    }

    public function senmail_conf_reg($h){
            $sub = "Регистрация на сайте";
            $texz = '
            '.$h["user"]["data_reg"]["login"].', вы зарегестрировались на сайте!
            Для подтверждения регистрации перейдите по ссылке:
            <a href="http://wcore.loc/user/mailconfirm/?i='.$h["user"]["data_reg"]["hex"].'">http://wcore.loc/user/mailconfirm/?i='.$h["user"]["data_reg"]["hex"].'</a>
            Если это были не вы, то просто проигнорируйте.
            ';
            
            $mail = new \Mod\Mail\Modul\Mail;
            $mail->send($h,$h["user"]["data_reg"]["mail"],$h["user"]["data_reg"]["login"],$sub,$texz);
        return $h;
    }



}
