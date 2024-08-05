<?php

namespace Mod\User\Modul\Admin;

Class Pex extends \Mod\Abstract\Pex{
    
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
            return $h;
        }
        //вытащи права пользователя
        $h = $this->take_user_pex($h);
        //Вытващи права группы
        $h = $this->take_group_pex($h);
        return $h;
    }

    public function take_user_pex($h){

        return $h;
    }

    public function take_group_pex($h){

        return $h;
    }
}
