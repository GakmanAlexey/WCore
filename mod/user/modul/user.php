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
        $h["user"]["type"] = "auth";
        //проверка авторизован ли
        $h = $this->ckeak_auth($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Проверить данные на получены ли
        $h = $this->use_button_login($h);
        if($h["user"]["error"] != []) $this->error($h);
        //сравнить логин и праоль
        $h = $this->ckeak_data_auth($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Проверить статус пользователя
        $h = $this->ckeak_status_auth($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Обновить данные пользователя
        $h = $this->uodate_auth_date($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Авторизовать
        $h = $this->go_auth($h);
        if($h["user"]["error"] != []) $this->error($h);
        return $h;
    }

    public function recover($h){
        $h["user"]["type"] = "rec";
        //проверить нажата ли кнопка        
        $h = $this->use_button_rec($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Проверить данные на получены ли
        //Проверить есть ли логин
        $h = $this->cheak_isset_login($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Подготовить
        $h = $this->create_data_for_rec($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Отправить емаил
        $h = $this->send_rec_mail($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Отправить сообщение о начале востановление
        $h = $this->rec_redirect($h);
        if($h["user"]["error"] != []) $this->error($h);
        return $h;
    }
    public function error($h){
        //TODO
        return $h;
    }
    public function rec_redirect($h){
        if($h["user"]["error"] != []) return $h;
        header('Location: /user/reconfirmmsg/', true, 303);
        exit();
        
        return $h;
    }
    public function send_rec_mail($h){
        if($h["user"]["error"] != []) return $h;
        $sub = "Востановление пароля";
        $texz = '
        '.$h["user"]["data_reg"]["login"].', вы пывтаетесь востановить пароль!
        Для подтверждения востановления перейдите по ссылке:
        <a href="http://wcore.loc/user/reconfirm/?i='.$h["user"]["data_reg"]["hex"].'">http://wcore.loc/user/reconfirm/?i='.$h["user"]["data_reg"]["hex"].'</a>
        Если это были не вы, то просто проигнорируйте.
        ';
        
        $mail = new \Mod\Mail\Modul\Mail;
        $mail->send($h,$h["user"]["data_reg"]["mail"],$h["user"]["data_reg"]["login"],$sub,$texz);
        return $h;
    }

    public function create_data_for_rec($h){
        if($h["user"]["error"] != []) return $h;
        $hex = new \Mod\Tools\Modul\Hex;
        $h["user"]["data_reg"]["hex"] = "rec".$hex->create(60,5);
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  hash_reg = ? WHERE `id` = ? ");
        $sth2->execute(array($h["user"]["data_reg"]["hex"], $h["user"]["data_reg"]["id"]));
        return $h;
    }

    public function cheak_isset_login($h){
        if($h["user"]["error"] != []) return $h;
        $h["user"]["data_reg"]["id"] = 0;
        $h["user"]["data_reg"]["login"] = htmlspecialchars($h["url"]["post"]["login"]);
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1");
        $sth1->execute(array($h["user"]["data_reg"]["login"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);

        if(!$res){
            $h["user"]["error"][] = $h["user"]["cfg"]->not_isset_login;
            return $h;
        }
        $h["user"]["data_reg"]["id"] = $res["id"];
        $h["user"]["data_reg"]["mail"] = $res["email"];
        return $h;
    }
    public function uodate_auth_date($h){
        if($h["user"]["error"] != []) return $h;

        $ip = new \Mod\Tools\Modul\Ip;
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  auth_ip = ?, auth_time = ? WHERE `id` = ? ");
        $sth2->execute(array($ip->get_ip(), time(), $h["user"]["auth_id"]));
        return $h;
    }
    
    public function ckeak_status_auth($h){
        if($h["user"]["error"] != []) return $h;
        if($h["user"]["auth_status"] != $h["user"]["cfg"]->status_confirm_email){
            if($h["user"]["auth_status"] != $h["user"]["cfg"]->start_status){
                $h["user"]["error"][] = $h["user"]["cfg"]->err_need_conf;
            }else{
                $h["user"]["error"][] = $h["user"]["cfg"]->err_other;
            }
        }
        return $h;
    }
    public function go_auth($h){
        if($h["user"]["error"] != []) return $h;
        $_SESSION["user_id"] = $h["user"]["auth_id"] ;
        $_SESSION["auth_login"] = $h["user"]["auth_login"] ;
        header('Location: /user/logconfirm/', true, 303);
        exit();
        return $h;
    }

    public function ckeak_data_auth($h){
        if($h["user"]["error"] != []) return $h;
        $h["user"]["data_reg"]["login"] = htmlspecialchars($h["url"]["post"]["login"]);
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1");
        $sth1->execute(array($h["user"]["data_reg"]["login"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);

        if(!$res){
            $h["user"]["error"][] = $h["user"]["cfg"]->err_not_correct_lp;
            return $h;
        }

        if (password_verify(htmlspecialchars($h["url"]["post"]["password"]), $res["pass"])){
            $h["user"]["auth_id"] = $res["id"];
            $h["user"]["auth_login"] = $res["login"];
            $h["user"]["auth_status"] = $res["status_a"];
        }else{
            $h["user"]["error"][] = $h["user"]["cfg"]->err_not_correct_lp;

        }
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

    public function use_button_login($h){
        if(isset($h["url"]["post"]["go_auth"])){
            if($h["url"]["post"]["go_auth"] != "yes"){
                $h["user"]["error"][] = "no";
            }   
        }else{
            $h["user"]["error"][] = "no";
        }
        return $h;
    }

    public function use_button_rec($h){
        if(isset($h["url"]["post"]["go_repass"])){
            if($h["url"]["post"]["go_repass"] != "yes"){
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
            $h["mail_builder"] = [];
            $m_b = new \Mod\Mail\Modul\Build;
            $h["mail_builder"]["head_img"] = "http://wcore.loc/src/img/img.jpg";
            $h["mail_builder"]["head"] = $h["user"]["data_reg"]["login"]. ",<br> спасибо, что присоеденились!";
            $h["mail_builder"]["text"] = 'Для подтверждения регистрации перейдите по ссылке:
            <a href="http://wcore.loc/user/mailconfirm/?i='.$h["user"]["data_reg"]["hex"].'">http://wcore.loc/user/mailconfirm/?i='.$h["user"]["data_reg"]["hex"].'</a>
            Если это были не вы, то просто проигнорируйте.';
            $texz = $text_mail_to_send = $m_b->standart($h);

            
            $mail = new \Mod\Mail\Modul\Mail;
            $mail->send($h,$h["user"]["data_reg"]["mail"],$h["user"]["data_reg"]["login"],$sub,$texz);
        return $h;
    }

    public function show_list($h){

        $pg = new \Mod\Tools\Modul\Pagin;
        $h = $pg -> standart($h,"users");

        $h["admin"]["user"]["group_list"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` LIMIT ".$h["pagin"]["start_sql"] .",".$h["pagin"]["page_lim_sql"]." ");
        $sth1->execute(array());
        while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["user_list"][] = $res;
        }
        return $h;
    }

    public function add_from_admin($h){
        if(!isset($h["url"]["post"]["add_user"])){
            $h["group"]["use"] = "new";
            return $h;
        }
        $h["url"]["post"]["password2"] = $h["url"]["post"]["password"];
        $h = $this->ckeak_data($h);
        if($h["user"]["error"] != []) $this->error($h);    
        //Проверить свободен ли логин
        $h = $this->ckeak_free_login($h);
        if($h["user"]["error"] != []) $this->error($h); 
        //Обработать данные
        $h = $this->clear_data_html($h);
        //сохранить данные
        $h = $this->save_user_data($h);
        $h = $this->ceng_status($h);
        $h = $this->update_group($h);
        return $h;
    }

    public function ceng_status($h){
        if($h["url"]["post"]["status"] == 1){
            $status = $h["user"]["cfg"]->start_status;
        }else if($h["url"]["post"]["status"] == 2){
            $status = $h["user"]["cfg"]->status_confirm_email;
        }else{
            $status = $h["user"]["cfg"]->status_ban;
        }

        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  status_a = ? WHERE `login` = ? ");
        $sth2->execute(array($status, $h["url"]["post"]["login"]));
        return $h;
    }

    public function update_group($h){
        $gb = new \Mod\User\Modul\Group;
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `login` = ? LIMIT 1");
        $sth1->execute(array($h["url"]["post"]["login"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $h = $gb->add_to_group($h,$res["id"], $h["url"]["post"]["roll"]);
        return $h;
    }


}
