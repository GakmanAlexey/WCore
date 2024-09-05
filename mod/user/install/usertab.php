<?php

namespace Mod\User\Install;

Class Usertab extends \Mod\Abs\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){

        $array = [
            "url"           => "/admin/system/users/",
            "class"         => "Mod\User\Controller\Admin\Userstab",
            "function"      => "index",
            "title"         => "Пользователи",
            "description"   => "Пользователи",
            "keys"          => "Пользователи",
            "name"          => "Пользователи",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        return $h;
    }


    public function install_Congif($h){

        return $h;
    }
    
}