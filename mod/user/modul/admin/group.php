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

    



}
