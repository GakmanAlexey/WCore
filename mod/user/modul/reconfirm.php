<?php

namespace Mod\User\Modul;

Class Reconfirm{

    public function start_confirm($h){
        $h["user"]["cfg"] = new \Mod\User\Modul\Config;
        $h["user"]["error"]  = [];
        $h["user"]["confirm"] = [];
        $h["user_rec_msg"] = "";
        //проверить есть ли такой хеш
        $h = $this->check_valid($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Создать новый пароль
        $h = $this->gen_new_pass($h);
        if($h["user"]["error"] != []) $this->error($h);
        //Выслать данные на емаил
        $h = $this->send($h);
        if($h["user"]["error"] != []) $this->error($h);
        return $h;
    }
    public function error($h){
        //TODO
        return $h;
    }

    public function check_valid($h){
        if($h["user"]["error"] != []) return $h;
        $h["user_hash"] = htmlspecialchars($h["url"]["get"]["i"]);
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `hash_reg` = ? LIMIT 1");
        $sth1->execute(array($h["user_hash"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);

        if(!$res){
            $h["user"]["error"][] = $h["user"]["cfg"]->err_other;
            $h["user_rec_msg"] = $h["user"]["cfg"]->err_other;
            return $h;
        }else{
            $h["user"]["confirm"] =$res;
        }
        return $h;
    }

    public function gen_new_pass($h){
        if($h["user"]["error"] != []) return $h;
        $hex = new \Mod\Tools\Modul\Hex;
        $h["user"]["confirm_pass"] = $hex->create(12,5);
        $h["user"]["confirm_pass_hex"] =password_hash($h["user"]["confirm_pass"], PASSWORD_BCRYPT, ["cost" => $h["user"]["cfg"]->hash_cost]);
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  pass = ? WHERE `id` = ? ");
        $sth2->execute(array($h["user"]["confirm_pass_hex"], $h["user"]["confirm"]["id"]));

        return $h;
    }

    public function send($h){
        if($h["user"]["error"] != []) return $h;
        $sub = "Новый пароль";
        $texz = '
        '.$h["user"]["confirm"]["login"].', вы сменили пароль!<br>
        Новый пароль: '.$h["user"]["confirm_pass"].'
        ';
        
        $mail = new \Mod\Mail\Modul\Mail;
        $mail->send($h,$h["user"]["confirm"]["email"],$h["user"]["confirm"]["login"],$sub,$texz);
        $h["user_rec_msg"] = $h["user"]["cfg"]->sys_rec_pass;

        return $h;
    }

    



}
