<?php

namespace Mod\Card\Modul;

Class Addz{
/*
$card3 = new \Mod\Card\Modul\Addz;
$h = $card ->index($h);
*/

    public function add_code($h){
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `kods_baza_zakaz` ORDER BY `id_zakaz` DESC LIMIT 1");
        $sth1->execute(array());
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        $id_zakaz = $res["id_zakaz"] + 1;

        $card = new \Mod\Card\Modul\Card;
        $h = $card ->list_full($h);
        $h = $card ->take_full_list($h);
        echo $id_zakaz;
        $zakaz = [];
        $id_product =[]; 
        $count =[]; 
        if($h["user"]["id"] >= 1){
            $master = $h["user"]["id"];
        }else{
            $master = 0;
        }

        $h["shop"]["msg_kod_comp"] = "";
        foreach($h["new_arr_card"] as $item){    
            $id_product[] =$item["id_product"]; 
            $count[] =$item["count"]; 
            $x = 0;
            while($x < $item["count"]){  
                $kod = rand(1111,9999)."-".rand(1111,9999)."-"  .rand(1111,9999)."-".rand(1111,9999); 
                $h["shop"]["msg_kod_comp"] .= "Продукт:".$item["name_s"]." код:".$kod."<br>";       
                $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `kods_baza_zakaz` (
                    id_product,
                    kod,
                    id_zakaz,
                    id_user
                    ) VALUES ( ?,?,?,?)');
                $sth->execute(array(
                    $item["name_s"],
                    $kod,
                    $id_zakaz,
                    $master
                ));

                $x++;
            }

        }
        return $h;
    }

    

    

}
