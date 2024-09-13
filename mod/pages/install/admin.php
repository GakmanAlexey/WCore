<?php

namespace Mod\Pages\Install;

Class Admin extends \Mod\Abs\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){
        $array = [
            "url"           => "/admin/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Админ панель",
            "description"   => "Админ панель",
            "keys"          => "Админ панель",
            "name"          => "Админ панель",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/onas/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "onas",
            "title"         => "О нас",
            "description"   => "О нас",
            "keys"          => "О нас",
            "name"          => "О нас",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/contacts/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "contacts",
            "title"         => "Конаткты",
            "description"   => "Конаткты",
            "keys"          => "Конаткты",
            "name"          => "Конаткты",
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