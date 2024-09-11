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
    public function add_to_card($h){
        if(isset($_GET["product"]) and $_GET["product"] >= 1){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `shop_item` WHERE `id` = ? ");
            $sth1->execute(array($_GET["product"]));
            $res = $sth1->fetch(\PDO::FETCH_ASSOC);
            $id_product = $res["id"];

            if($h["user"]["id"] != 0){
                $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `card_user` (
                    type_user,
                    id_user,
                    id_product,
                    count,
                    time_create
                    ) VALUES ( ?,?,?,?,?)');
                $sth->execute(array(
                    "auth",
                    $h["user"]["id"],
                    $_GET["product"],
                    1,
                    time()
                ));
            }else{
                $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `card_user` (
                    type_user,
                    id_user,
                    id_product,
                    count,
                    time_create
                    ) VALUES ( ?,?,?,?,?)');
                $sth->execute(array(
                    "noauth",
                    $_SESSION["id"],
                    $_GET["product"],
                    1,
                    time()
                ));
            }
        }
        return $h;
    }


    public function take_card_no_auth($h){

        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT count(*) FROM `card_user` WHERE ((`type_user` = ?) and  (`id_user` = ?)) ");
        $sth1->execute(array("noauth", $_SESSION["id"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $h["card"]["show_caont"] = $res["count(*)"];
        //var_dump($h["cookie"]["trap"]["hex"]);
        return $h;
    }

}
