<?php

namespace Mod\User\Modul;

Class Group{

    public function create_group($h, $group_name, $name_ru, $prefix, $ico){
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `group_list` (
            group_name,
            name_ru,
            prefix,
            ico
            ) VALUES ( ?,?,?)');
        $sth->execute(array(
            $group_name,
            $name_ru,
            $prefix,
            $ico
        ));
        return $h;
    }

    public function delet_group($h,$group_name){
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("DELETE FROM `group_list` WHERE `group_name` = ? LIMIT 1");
            $sth1->execute(array($group_name));
        return $h;
    }

    public function edit_group($h,$group_name_old, $group_name = "", $name_ru = "", $prefix = "", $ico = ""){
        if($group_name != ""){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `group_list` SET  group_name = ? WHERE `group_name` = ? ");
            $sth1->execute(array($group_name,$group_name_old));
        }
        if($name_ru != ""){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `group_list` SET  name_ru = ? WHERE `group_name` = ? ");
            $sth1->execute(array($name_ru,$group_name_old));
        }
        if($name_ru != ""){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `group_list` SET  prefix = ? WHERE `group_name` = ? ");
            $sth1->execute(array($prefix,$group_name_old));
        }
        if($name_ru != ""){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `group_list` SET  ico = ? WHERE `group_name` = ? ");
            $sth1->execute(array($ico,$group_name_old));
        }
        return $h;
    }

    public function add_to_group($h){
        
        return $h;
    }

    public function remove_to_group($h){
        
        return $h;
    }



}
