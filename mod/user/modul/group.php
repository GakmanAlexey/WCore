<?php

namespace Mod\User\Modul;

Class Group{

    public function create_group($h, $group_name, $name_ru, $prefix, $ico){
            $h["group"]["error"] = "";
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` WHERE `group_name` = ? LIMIT 1");
            $sth1->execute(array($group_name));
            $res = $sth1->fetch(\PDO::FETCH_ASSOC);
            if($res != []){
                $h["group"]["error"] = "Группа уже существует";
                return $h;
            }
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `group_list` (
            group_name,
            name_ru,
            prefix,
            ico
            ) VALUES ( ?,?,?,?)');
        $sth->execute(array(
            $group_name,
            $name_ru,
            $prefix,
            $ico
        ));
        return $h;
    }

    public function delet_group($h,$group_id){
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("DELETE FROM `group_list` WHERE `id` = ? LIMIT 1");
        $sth1->execute(array($group_id));
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

    public function add_to_group($h,$user_id, $group_name){
        $h["group"]["error"] = "";        
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_party` WHERE `id_user` = ? LIMIT 1");
        $sth1->execute(array($user_id));
        $res = $sth1->fetch(\PDO::FETCH_ASSOC);
        if($res != []){
            $h["group"]["error"] = "Уже состоит в группе";
            return $h;
        }        
        $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `id` = ? LIMIT 1");
        $sth2->execute(array($user_id));
        $res2 = $sth2->fetch(\PDO::FETCH_ASSOC);
        if(!($res2 != [])){
            $h["group"]["error"] = "Пользователя не существует";
            return $h;
        }     
        $sth3 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` WHERE `group_name` = ? LIMIT 1");
        $sth3->execute(array($group_name));
        $res3 = $sth2->fetch(\PDO::FETCH_ASSOC);
        if($res3 != []){
            $h["group"]["error"] = "Группы не существует";
            return $h;
        }
        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `group_party` (
            id_user,
            id_group
            ) VALUES ( ?,?)');
        $sth->execute(array(
            $user_id,
            $group_name
        ));

        return $h;
    }

    public function remove_to_group($h,$user_id){        
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("DELETE FROM `group_party` WHERE `id_user` = ? ");
        $sth1->execute(array($user_id));

        return $h;
    }

    public function show_list($h){
        $pg = new \Mod\Tools\Modul\Pagin;
        $h = $pg -> standart($h,"group_list");

        $h["admin"]["user"]["group_list"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` LIMIT ".$h["pagin"]["start_sql"] .",".$h["pagin"]["page_lim_sql"]." ");
        $sth1->execute(array());
        while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["group_list"][] = $res;
        }
        return $h;
    }


    public function show_list_all($h){

        $h["admin"]["user"]["group_list"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` ");
        $sth1->execute(array());
        while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["group_list"][] = $res;
        }
        return $h;
    }



}
