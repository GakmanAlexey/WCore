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
        $sth1->execute(array("noauth", $_COOKIE["trace"]));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $h["card"]["show_caont"] = $res["count(*)"];
        //var_dump($h["cookie"]["trap"]["hex"]);
        return $h;
    }


    public function take_full_list($h){
        // тип карты


        // корзина товаров



        // общая цена
        return $h;
    }

    public function list_full($h){
        $array_card = [];
        if($h["user"]["id"] != 0){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `card_user` WHERE ((`type_user` = ?) and  (`id_user` = ?)) ");
            $sth1->execute(array("auth", $h["user"]["id"]));
            while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
                $array_card[] = $res;
            }
        }else{

            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `card_user` WHERE ((`type_user` = ?) and  (`id_user` = ?)) ");
            $sth1->execute(array("noauth", $_COOKIE["trace"]));
            while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
                $array_card[] = $res;
            }
        }

        $h["card_array_full_list"] = $array_card;
        $h["new_arr_card"] = [];
        foreach($h["card_array_full_list"] as $item){
            $x = 0;
            $stat =  false;
            foreach($h["new_arr_card"] as $item2){
                if($item2["id_product"]  == $item["id_product"]){
                    $h["new_arr_card"][$x]["count"]  = $h["new_arr_card"][$x]["count"] +1;
                    $stat =  true;
                    break;
                }
                $x++;
                
            }
            if(!$stat){
                $h["new_arr_card"][] = $item;
            }
        }
        //var_dump($h["card_array_full_list"]);
        return $h;
    }

    public function operation($h){
        if(isset($_GET["o"]) and isset($_GET["id"])){

        }else{
            return $h;
        }

        if($_GET["o"] == "plus"){
            $h = $this->operation_plus($h);
        }elseif($_GET["o"] == "minus"){
            $h = $this->operation_minus($h);
        }elseif($_GET["o"] == "delet"){
            $h = $this->operation_del($h);
        }else{
            return $h;
        }



        return $h;
    }

    public function operation_plus($h){
           
        return $h;
    }

    public function operation_minus($h){
           
        return $h;
    }

    public function operation_del($h){
           
        return $h;
    }

}
