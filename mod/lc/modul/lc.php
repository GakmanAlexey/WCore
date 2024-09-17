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
    

}
