<?php

namespace Mod\User\Modul\Admin;

Class Group{


    public function add_group($h){
        if(!isset($h["url"]["post"]["add_group"])) {
            $h["group"]["use"] = false;
            return $h;
        }
        $h["group"]["use"] = true;
        $gp = new \Mod\User\Modul\Group;
        $h = $gp->create_group($h, $h["url"]["post"]["group_name"], $h["url"]["post"]["name_ru"], $h["url"]["post"]["group_name2"],  $h["url"]["post"]["name_ru2"]);
        return $h;
    }

    public function edit_group_load($h){
        if(!isset($h["url"]["get"]["id"])) {
            $h["group"]["use"] = "error";
            return $h;
        } 
        $h["group"]["use"] = "go_save";

        $sth = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` WHERE `id` = ?");
        $sth->execute(array($h["url"]["get"]["id"]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        if($result_sql == false){
            $h["group"]["use"] = "error";
            return $h;
        }
        $h["group"]["data_edit"] = $result_sql;

        $x = 0;
        foreach($h["group"]["data_edit"] as $key => $val){
            if( $h["group"]["data_edit"][$key] == null ) {
                $h["group"]["data_edit"][$key ] = "";
            }
            $x++;
        }

        return $h;
    }

    public function edit_group_save($h){
        if(!isset($h["url"]["post"]["red_group"])) {
            return $h;
        }
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `group_list` SET  group_name = ?, name_ru = ?, prefix = ?, ico = ? WHERE `id` = ? ");
        $res = $sth2->execute(array($h["url"]["post"]["group_name"],$h["url"]["post"]["name_ru"],$h["url"]["post"]["group_name2"],$h["url"]["post"]["name_ru2"],$h["url"]["post"]["id"],));
        if(! $res){
            $h["group"]["use"] = "error";
        }
        $h["group"]["use"] = "save";
        return $h;
    }

    public function get_delet_group($h){
        if(isset($h["url"]["post"]["go_del"]) ){
            $gp = new \Mod\User\Modul\Group;
            $h = $gp->delet_group($h,$h["url"]["post"]["id"]);
            $h["group"]["use"] = "dell_comp";
            return $h;
        }
        if(!isset($h["url"]["get"]["id"])) {
            $h["group"]["use"] = "error";
            return $h;
        } 
        $h["group"]["use"] = "what";
        return $h;
    }

    



}
