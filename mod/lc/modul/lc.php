<?php

namespace Mod\Lc\Modul;

Class Lc{
/*
$Lc = new \Mod\Card\Modul\Lc;
$h = $card ->index($h);
*/

    public function index($h){
        $h["card"]["show_caont"] = 0;
         if($h["user"]["id"] != 0){
            //юзер авторизован
            $h = $this->take_card_auth($h);
         }else{
            //юзер неавторизован
            $h = $this->take_card_no_auth($h);
         }
        return $h;
    }

    public function show_balance($h){
        $h["user"]["balance"] = 0;

        $sth_smap1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `user_balance` WHERE `id_user` = ? LIMIT 1");
        $sth_smap1 ->execute(array($h["user"]["id"]));
        $res1 = $sth_smap1 ->fetch(\PDO::FETCH_ASSOC) ;
        if(!$res1){
            $h = $this->create_balance($h);
        }else{
            $h["user"]["balance"] = $res1["balance"];
        }

        return $h;
    }

    public function create_balance($h){
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `user_balance` (
            id_user,
            balance
            ) VALUES ( ?,?)');
        $sth->execute(array(
            $h["user"]["id"],
            0
        ));
        $h["user"]["balance"] = 0;
        return $h;
    }

    public function show_user_data($h){
        $h["user"]["data_lc"] = [];

        $sth_smap1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `user_data_lc` WHERE `user_id` = ? LIMIT 1");
        $sth_smap1 ->execute(array($h["user"]["id"]));
        $res1 = $sth_smap1 ->fetch(\PDO::FETCH_ASSOC) ;
        if(!$res1){
            $h = $this->create_user_data($h);
        }else{
            $h["user"]["data_lc"] = $res1;
        }

        return $h;
    }

    public function create_user_data($h){
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `user_data_lc` (
            user_id,
            user_name,
            user_mail,
            user_phone
            ) VALUES ( ?,?,?,?)');
        $sth->execute(array(
            $h["user"]["id"],
            "",
            "",
            ""
        ));
        $h["user"]["data_lc"]["user_name"]="";
        $h["user"]["data_lc"]["user_mail"]="";
        $h["user"]["data_lc"]["user_phone"]="";
        return $h;
    }

    public function save_user_data($h){
        if(!isset($_POST["go_save_lc"])){
            return $h;
        }else{
            $h = $this->go_save_user_data($h);
        }
        return $h;
    }
    
    public function go_save_user_data($h){
        if(isset($_POST["name"]) and $_POST["name"] != ""){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `user_data_lc` SET  user_name = ? WHERE `user_id` = ? ");
            $sth2->execute(array($_POST["name"], $h["user"]["id"]));
        }

        if(isset($_POST["email"]) and $_POST["email"] != ""){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `user_data_lc` SET  user_mail = ? WHERE `user_id` = ? ");
            $sth2->execute(array($_POST["email"], $h["user"]["id"]));
        }

        if(isset($_POST["phone"]) and $_POST["phone"] != ""){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `user_data_lc` SET  user_phone = ? WHERE `user_id` = ? ");
            $sth2->execute(array($_POST["phone"], $h["user"]["id"]));
        }
        if(isset($_POST["password"]) and ($_POST["password"] != "")){
            $h["user"]["error"] = [];
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
                if($h["user"]["error"] != []){
                    return $h;
                }
                //TODO обновить пароль
                $h["url"]["post"]["password"] = password_hash(htmlspecialchars($h["url"]["post"]["password"]), PASSWORD_BCRYPT, ["cost" => $h["user"]["cfg"]->hash_cost]);

                $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `users` SET  pass = ? WHERE `id` = ? ");
                $sth2->execute(array($h["url"]["post"]["password"],$h["user"]["id"]));
                $h["user"]["error"][] = "Данные обновлены";
            }
        }


        return $h;
    }

}
