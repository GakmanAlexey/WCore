<?php

namespace Mod\Shop\Modul;

Class Shop{
    //shead
    public $father_dir   = "/";

    public function index($h){
        $h["shop"] = [];
        //получить список категорийю
        $h["shop"]["maincat"] = "0";
        $h["shop"]["lost_cat"] = [];
        $h = $this->take_list_cat($h);
        return $h;
    }

    public function take_list_cat($h){
        $sth_smap = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `shop_catalog` WHERE `father` = ?");
        $sth_smap ->execute(array($h["shop"]["maincat"]));
        while($res = $sth_smap ->fetch(\PDO::FETCH_ASSOC)  ){
            $h["shop"]["lost_cat"][] = $res;
        }
        return $h;
    }



    public function cat($h){
        $h["shop"]["father_item"] = $h["url"]["d_array"][1];

        $sth_smap1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `shop_catalog` WHERE `url` = ?");
        $sth_smap1 ->execute(array($h["shop"]["father_item"]));
        $res1 = $sth_smap1 ->fetch(\PDO::FETCH_ASSOC) ;
        $h["shop"]["father_item"] =  $res1["id"];

        $h["shop"]["item_list"] = [];
        $sth_smap = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `shop_item` WHERE `father_cat` = ?");
        $sth_smap ->execute(array($h["shop"]["father_item"]));
        while($res = $sth_smap ->fetch(\PDO::FETCH_ASSOC)  ){
            $h["shop"]["item_list"][] = $res;
        }

        return $h;
    }




    public function item($h){
        $h["shop"]["this_item"] = $h["url"]["d_array"][2];
        
        $sth_smap = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `shop_item` WHERE `url` = ? LIMIT 1");
        $sth_smap ->execute(array($h["shop"]["this_item"]));
        $h["shop"]["item_info"] = $sth_smap ->fetch(\PDO::FETCH_ASSOC) ;        

        return $h;
    }

}
