<?php

namespace Mod\Card\Modul;

Class Card{
/*
$card = new \Mod\Card\Modul\Card;
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
    public function take_card_auth($h){
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT count(*) FROM `card_user` WHERE ((`type_user` = ?) and  (`id_user` = ?)) ");
        $sth1->execute(array("auth", $h["user"]["id"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $h["card"]["show_caont"] = $res["count(*)"];
        return $h;
    }


    public function take_card_no_auth($h){

        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT count(*) FROM `card_user` WHERE ((`type_user` = ?) and  (`id_user` = ?)) ");
        $sth1->execute(array("noauth", $h["cookie"]["trap"]["hex"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $h["card"]["show_caont"] = $res["count(*)"];
        return $h;
    }

}
