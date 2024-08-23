<?php

namespace Mod\User\Modul\Admin;

Class Pex extends \Mod\Abstract\Pex{
    /*
    $pex = new \Mod\User\Modul\Admin\Pex;
    $h = $pex->allo($h, "gp");
    */
    public function list_prem($h){ 
        $h["pex"]["pre_allow"][] = [
        "user.admin.user.show" => "Просмотр админ панели пользователей"
        ];
        $h["pex"]["pre_allow"][] = [
        "user.admin.group.show" => "Просмотр админ панели групп"
        ];
        $h["pex"]["pre_allow"][] = [
        "user.admin.pex.show" => "Просмотр админ панели привелегий"
        ];
        return $h;
    }

    //Получить список всех привелегий
    public function take_list($h){
        $h["pex"]["active_list"] = [];

        if(isset($_SESSION["user_id"]) and ($_SESSION["user_id"] >= 1)){
            $h["pex"]["active_list"][] = "Auth";
        }else{
            $h["pex"]["active_list"][] = "No_auth";
            $h["pex"]["allow"][] = "No_auth";
            $h["pex"]["dislow"] = [];
            return $h;
        }
        //вытащи ид пользователя
        $h = $this->take_user_pex($h);
        //Вытващи ид группы
        $h = $this->take_group_pex($h);
        // получить список прав
        $h = $this->take_full_list($h);
        echo 1;
        $h = $this->pex_sort($h);
        return $h;
    }

    public function take_user_pex($h){
        $h["pex"]["search_id_user"] = [];
        $h["pex"]["search_id_user"][] = $_SESSION["user_id"];
        return $h;
    }

    public function take_group_pex($h){
        $gp = new \Mod\User\Modul\Group;
        $h = $gp->take_group_user($h);
        $h["pex"]["gp"] = [];
        $h["pex"]["gp"][] = $h["pex"]["data_gp"]["id"];
        return $h;
    }

    public function take_full_list($h){
        $h["pex"]["grau_list"] = [];
        foreach($h["pex"]["search_id_user"] as $item){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE (`type_s` = ? and `id_name` = ?) ");
            $sth2->execute(array("user",$item));
            while($res2 = $sth2->fetch(\PDO::FETCH_ASSOC)){
                $h["pex"]["grau_list_on"][] = $res2["per_on"];
                $h["pex"]["grau_list_off"][] = $res2["per_off"];
            }
        }        
        foreach($h["pex"]["gp"] as $item2){
            $sth3 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE (`type_s` = ? and `id_name` = ?) ");
            $sth3->execute(array("group",$item2));
            while($res3 = $sth3->fetch(\PDO::FETCH_ASSOC)){
                $h["pex"]["grau_list_on"][] = $res3["per_on"];
                $h["pex"]["grau_list_off"][] = $res3["per_off"];
            }
        }
        return $h;
    }

    public function pex_sort($h){
        $h["pex"]["allow"] = [];
        $h["pex"]["dislow"] = [];
        foreach($h["pex"]["grau_list_on"] as $item){
            $array = explode(",", $item);
            foreach($array as $small_itm){
                $h["pex"]["allow"][] = trim($small_itm);
            }
            $array = [];
        }


        foreach($h["pex"]["grau_list_off"] as $item){
            $array = explode(",", $item);
            foreach($array as $small_itm){
                $h["pex"]["dislow"][] = trim($small_itm);
            }
            $array = [];
        }
        return $h;
    }

    public function allo($h, $pex){
        $h = $this->take_list($h);
        $stat = "dis";
        foreach($h["pex"]["allow"] as $item){
            if($item == $pex){
                $stat = "allow";
            }
        }
        foreach($h["pex"]["dislow"] as $item){
            if($item == $pex){
                $stat = "dis";
            }
        }
        if($stat == "dis"){
            $er = new \Mod\Core\Controller\E401;
            $er->index($h);
            die();
        }
        return $h;
    }

    public function show_list_group($h){
        $pg = new \Mod\Tools\Modul\Pagin;
        $h = $pg -> standart($h,"permission_list");

        $h["admin"]["user"]["show_list_gp"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ?  LIMIT ".$h["pagin"]["start_sql"] .",".$h["pagin"]["page_lim_sql"]." ");
        $sth1->execute(array("group"));
        while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` WHERE `id` = ?  LIMIT 1 ");
            $sth2->execute(array($res["id"] ));
            $res2 = $sth2->fetch(\PDO::FETCH_ASSOC);
            $res["id_name"] = $res2["name_ru"];
            $h["admin"]["user"]["show_list_gp"][] = $res;
        }
        return $h;
    }
    public function show_list_person($h){

        $pg = new \Mod\Tools\Modul\Pagin;
        $h = $pg -> standart($h,"permission_list");

        $h["admin"]["user"]["show_list_gp"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ?  LIMIT ".$h["pagin"]["start_sql"] .",".$h["pagin"]["page_lim_sql"]." ");
        $sth1->execute(array("user"));
        while($res = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` WHERE `id` = ?  LIMIT 1 ");
            $sth2->execute(array($res["id_name"] ));
            $res2 = $sth2->fetch(\PDO::FETCH_ASSOC);
            $res["id_name"] = $res2["login"];
            $h["admin"]["user"]["show_list_gp"][] = $res;
        }

        return $h;
    }

    public function save_new_gp($h){
        $h["admin"]["user"]["use_save_gp"] = false;
        if(!isset($_POST["go_save_pex_gp"])){
            return $h;
        }
        if($_POST["go_save_pex_gp"] != "yes"){
            return $h;
        }
        $h["admin"]["user"]["use_save_gp"] = true;
        $id_gp = $_POST["add_selecter"];
        $pex_allow = $_POST["aloow"];
        $pex_disslow = $_POST["disaloow"];

        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `permission_list` (
            type_s,
            id_name,
            per_on,
            per_off
            ) VALUES ( ?,?,?,?)');
        $sth->execute(array(
            "group",
            $id_gp ,
            $pex_allow ,
            $pex_disslow
        ));

        return $h;
    }

    public function show_list_gp_target($h){
        //Получить список групп
        $h["admin"]["user"]["full_list_gp_pex"] = [];
        $sth = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` ");
        $sth->execute(array());
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["full_list_gp_pex"][] = $result_sql;
        }
        
        //получить список уже добавленых

        $h["admin"]["user"]["lim_list_gp_pex"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ? ");
        $sth1->execute(array("group"));
        while($result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["lim_list_gp_pex"][] = $result_sql1;
        }
        //почистить список

        $x = 0;
        foreach($h["admin"]["user"]["full_list_gp_pex"] as $item){
            foreach( $h["admin"]["user"]["lim_list_gp_pex"] as $item2){
                if($item["id"] == $item2["id_name"]){
                    unset($h["admin"]["user"]["full_list_gp_pex"][$x]);
                }
            }
            $x ++;
        }

        return $h;
    }

    public function save_new_us($h){
        $h["admin"]["user"]["use_save_us"] = false;
        if(!isset($_POST["go_save_pex_us"])){
            return $h;
        }
        if($_POST["go_save_pex_us"] != "yes"){
            return $h;
        }
        $h["admin"]["user"]["use_save_us"] = true;
        $id_gp = $_POST["add_selecter"];
        $pex_allow = $_POST["aloow"];
        $pex_disslow = $_POST["disaloow"];

        $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `permission_list` (
            type_s,
            id_name,
            per_on,
            per_off
            ) VALUES ( ?,?,?,?)');
        $sth->execute(array(
            "user",
            $id_gp ,
            $pex_allow ,
            $pex_disslow
        ));

        return $h;
    }

    public function show_list_us_target($h){
        //Получить список групп
        $h["admin"]["user"]["full_list_gp_pex"] = [];
        $sth = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` ");
        $sth->execute(array());
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["full_list_gp_pex"][] = $result_sql;
        }
        
        //получить список уже добавленых

        $h["admin"]["user"]["lim_list_gp_pex"] = [];
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ? ");
        $sth1->execute(array("user"));
        while($result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC)){
            $h["admin"]["user"]["lim_list_gp_pex"][] = $result_sql1;
            
        }
        //var_dump($h["admin"]["user"]["full_list_gp_pex"]);
        //почистить список

        $x = 0;
        foreach($h["admin"]["user"]["full_list_gp_pex"] as $item){
            foreach( $h["admin"]["user"]["lim_list_gp_pex"] as $item2){
                if($item["id"] == $item2["id_name"]){
                    unset($h["admin"]["user"]["full_list_gp_pex"][$x]);                    
                }
            }
            $x ++;
        }

        return $h;
    }

    public function take_item_for_id_gp($h){
        $h["admin"]["user"]["use_save_edit_gp"] = "error";
        if(!isset($_GET["id"])){
            return $h;
        }
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ? and `id` = ? ");
        $sth1->execute(array("group", $_GET["id"]));
        $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);
        if($result_sql1 == []){
            return $h;
        }
        if(!isset($_POST["go_save_pex_gp_edit"])){
            $h["admin"]["user"]["use_save_edit_gp"] = "show";
            //вытащи и выведи данные
            $sth = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `group_list` where `id` = ? ");
            $sth->execute(array($result_sql1["id_name"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            $result_sql1["main_name"] = $result_sql["name_ru"];
            $h["admin"]["user"]["use_save_edit_gp_data"] = $result_sql1;
        }else{
            $h["admin"]["user"]["use_save_edit_gp"] = "save";
            //Сохрани
            $id_iem = $_POST["id"];
            $yes_iem = $_POST["aloow"];
            $no_iem = $_POST["disaloow"];
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `permission_list` SET  per_on = ?,per_off=? WHERE `id` = ? ");
            $sth1->execute(array($_POST["aloow"],$_POST["disaloow"],$_POST["id"]));
        }


        return $h;
    }



    public function take_item_for_id_us($h){
        $h["admin"]["user"]["use_save_edit_us"] = "error";
        if(!isset($_GET["id"])){
            return $h;
        }
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `permission_list` WHERE `type_s` = ? and `id` = ? ");
        $sth1->execute(array("user", $_GET["id"]));
        $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);
        if($result_sql1 == []){
            return $h;
        }
        if(!isset($_POST["go_save_pex_gp_edit"])){
            $h["admin"]["user"]["use_save_edit_us"] = "show";
            //вытащи и выведи данные
            $sth = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `users` where `id` = ? ");
            $sth->execute(array($result_sql1["id_name"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            $result_sql1["main_name"] = $result_sql["login"];
            $h["admin"]["user"]["use_save_edit_us_data"] = $result_sql1;
        }else{
            $h["admin"]["user"]["use_save_edit_us"] = "save";
            //Сохрани
            $id_iem = $_POST["id"];
            $yes_iem = $_POST["aloow"];
            $no_iem = $_POST["disaloow"];
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `permission_list` SET  per_on = ?,per_off=? WHERE `id` = ? ");
            $sth1->execute(array($_POST["aloow"],$_POST["disaloow"],$_POST["id"]));
        }


        return $h;
    }
}
