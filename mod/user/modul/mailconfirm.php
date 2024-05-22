<?php

namespace Mod\User\Modul;

Class Mailconfirm{

    public function start_confirm($h){
        $h["user"]["cfg"] = new \Mod\User\Modul\Config;
        $h["reg_mail_confirm"] = [];
        $h["reg_mail_confirm"]["error"] = false;
        $h["reg_mail_confirm"]["mail_text"] = "Что-то пошло не так =/";
        if($h["reg_mail_confirm"]["error"] ) return $h;
        if($this->cheak_valid($h)){
            $h = $this->update_status($h);
        }

        return $h;
    }

    public function returt_fail($h){
        $h["reg_mail_confirm"]["error"] = true;
        return $h;
    }

    public function cheak_valid($h){
        $connect = $h["sql"]["db_connect"]->db_connect;
        $sth = $connect->prepare("SELECT * FROM `users` WHERE ( `hash_reg` = ? and status_a = ? ) LIMIT 1");
        $sth->execute(array($h["url"]["get"]["i"],$h["user"]["cfg"]->start_status));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        if(!isset($result_sql["id"]) or !($result_sql["id"] >= 1)) {
            return false;
        }   
        return true;
    }

    public function update_status($h){
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  status_a = ? WHERE `hash_reg` = ? ");
        $sth2->execute(array($h["user"]["cfg"]->status_confirm_email, $h["url"]["get"]["i"]));

        $h["reg_mail_confirm"]["mail_text"] = 'Емаил подтвержден! Авторизуйтесь!<br> <a href="/user/login/">Авторизация</a>';
        return $h;
    }



}
