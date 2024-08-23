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


        return $h;
    }
    public function show_list_person($h){


        return $h;
    }
}
