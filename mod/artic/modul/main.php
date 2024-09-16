<?php

namespace Mod\Artic\Modul;

Class Main{

    public function main($h){
        $h["articl"]["list"] = [];
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `artic` WHERE `show_s` = ? ");
            $sth1->execute(array(1));
            while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
                $h["articl"]["list"][] = $res;
            }
        return $h;
    }
    

}
