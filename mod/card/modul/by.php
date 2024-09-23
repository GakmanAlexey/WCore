<?php

namespace Mod\Card\Modul;

Class By{
/*
$card = new \Mod\Card\Modul\Card;
$h = $card ->index($h);
*/

    public function index($h){
        $h["shop"]["status"] = false;
       if($h["user"]["id"] != 0){
        $h = $this->by_auth($h);
       }else{
        $h = $this->by_no_auth($h);
       }

       if($h["shop"]["status"]){
        $card3 = new \Mod\Card\Modul\Addz;
        $h = $card3 ->add_code($h);
       }
        return $h;
    }

    public function by_auth($h){
        if($_POST["radio"] == 1){
            $h = $this-> pay_manye($h);

        }else{
            $h = $this-> pay_bal($h);

        }

        return $h;
    }

    public function by_no_auth($h){
        $h = $this-> pay_manye($h);

        return $h;
    }

    public function pay_bal($h){
        
        $card = new \Mod\Card\Modul\Card;
        $h = $card ->list_full($h);
        $h = $card ->take_full_list($h);

        $Lc = new \Mod\Lc\Modul\Lc;
        $h = $Lc ->show_balance($h);
        if($h["card_res"]["itog"] <= $h["user"]["balance"]){
            $h["shop"]["status"] = true;
            $h["shop"]["msg"] = "сообщение об успещной оплате.";
            $h= $this->spis_balance($h);
        }else{
            $h["shop"]["status"] = false;
            $h["shop"]["msg"] = "не достаточно балов, пополните баланс";
        }


        return $h;
    }

    public function pay_manye($h){
        $h["shop"]["status"] = true;

        $h["shop"]["msg"] = "сообщение об успещной оплате. но пока нет интеграции.";
        return $h;
    }

    public function spis_balance($h){
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `user_balance` SET  balance = (balance - ?) WHERE `id` = ? ");
        $sth2->execute(array($h["card_res"]["itog"],$h["user"]["id"] ));
        return $h;
    }



    

}
